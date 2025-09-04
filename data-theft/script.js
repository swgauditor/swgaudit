const dataTheftForm = document.getElementById('data-theft-form');
const uploadArea = document.getElementById('upload-area');
const fileInput = document.getElementById('fileInput');
const removeFileBtn = document.getElementById('removeFile');
let selectedFile = null;
const fileDetails = document.getElementById('file-details');
const fileName = document.getElementById('selected-filename');
const fileSize = document.getElementById('selected-filesize');
const uploadButton = document.getElementById('uploadButton');
const timerElement = document.getElementById('timer');
const resetContainer = document.getElementById('reset-container');
const resultsText = document.getElementById('results-text');
const resetBtn = document.getElementById('resetBtn');

function generateRandomId() {
    const id = Math.random().toString(36).substring(5, 15);
    console.log('Generated new ID:', id);
    return id;
}
let currentId = generateRandomId();
let countdownInterval;

function changeSimulationState(stepID) {
    switch (stepID) {
        case 1:
            if (countdownInterval) {
                clearInterval(countdownInterval);
            }
            currentId = generateRandomId();            
            dataTheftForm.reset();
            selectedFile = null;
            uploadButton.disabled = true;

            uploadArea.style.display = "flex";
            resetContainer.style.display = "none"
            fileDetails.style.display = "none"
            dataTheftForm.style.display = "flex";
            break;
        case 2:
            uploadArea.style.display = "none"
            fileDetails.style.display = "flex";
            uploadButton.disabled = false;
            break;
        case 3:
            let timeLeft = 600; // 10 minutes in seconds
            if (countdownInterval) {
                clearInterval(countdownInterval);
            }
            countdownInterval = setInterval(() => {
                // console.log('Timer update:', timeLeft);
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerElement.textContent = `File will be deleted from the server in ${minutes}:${seconds.toString().padStart(2, '0')}`;
                
                if (timeLeft === 0) {
                    clearInterval(countdownInterval);
                    window.location.reload();
                }
                timeLeft--;
            }, 1000);

            resetContainer.style.display = "flex";
            dataTheftForm.style.display = "none"
            uploadArea.style.display = "none"
            fileDetails.style.display = "flex";
            uploadButton.disabled = true;
            break;
        default:
            break;
    }
}

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing event listeners');
    changeSimulationState(1);

    // Initialize remove button handler
    if (removeFileBtn) {
        removeFileBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            changeSimulationState(1);
            console.log('File removed, upload area reset');
        });
    }

    const handleFileSelection = files => {
        if (files.length) {
            selectedFile = files[0];
            if (selectedFile.size > 100 * 1024) {
                alert("File size must be less than 100KB.");
                changeSimulationState(1);
                return;
            } else {
                fileSize.textContent = formatBytes(selectedFile.size);
                fileName.textContent = selectedFile.name;
                changeSimulationState(2);
            }
        }
    };

    uploadArea.addEventListener('click', () => fileInput.click());
    uploadArea.addEventListener('dragover', e => {
        e.preventDefault();
        uploadArea.classList.add('dragover');
    });
    uploadArea.addEventListener('dragleave', () => uploadArea.classList.remove('dragover'));
    uploadArea.addEventListener('drop', e => {
        e.preventDefault();
        uploadArea.classList.remove('dragover');
        fileInput.files = e.dataTransfer.files;
        handleFileSelection(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', e => handleFileSelection(e.target.files));
    
    uploadButton.addEventListener('click', () => {
        if (selectedFile) {
            handleFileUpload(selectedFile);
        }
    });

    resetBtn.addEventListener('click', function() {
        // Reset form values and selected file
        changeSimulationState(1);
    });

});

async function fetchResults() {
    console.log('Fetching results for ID:', currentId);
    try {
        const response = await fetch(`fetch_uploaded_data.php?id=${currentId}`);
        const data = await response.json();
        
        if (!data.success) {
            console.warn('Request failed:', data.message);
            return;
        }

        console.log('Generated new ID after successful fetch:', currentId);

        if (data.fileUrl) {
            console.log('File URL received:', data.fileUrl);
        }
            
    } catch (error) {
        console.error('Error in fetchResults:', error);
    }
}

async function handleFileUpload(file) {
    console.log('Starting file upload process:', { fileName: file.name, fileSize: file.size, fileType: file.type });
    if (!file) {
        console.warn('No file selected');
        return;
    }

    if (file.size > 100 * 1024) {
        console.warn('File size exceeds limit:', file.size);
        alert("File size must be less than 100KB.");
        return;
    }
    
    const reader = new FileReader();
    reader.onload = async function(evt) {
        console.log('File read complete, converting to byte array');
        const arrayBuffer = evt.target.result;
        const byteArray = new Uint8Array(arrayBuffer);
        const base32String = base32Encode(byteArray);

        const metadata = {
            name: file.name,
            type: file.type,
            size: file.size
        };
        const metadataStr = base32Encode(new TextEncoder().encode(JSON.stringify(metadata)));
        
        const chunks = [];
        const maxDomainLength = 253;
        const staticSuffix = '.swgaudit.com';
        const maxDataLength = maxDomainLength - currentId.length - staticSuffix.length - 5;
        const subdomainLimit = 60;

        chunks.push({
            data: [metadataStr.replace(/(.{60})/g, "$1.")],
            number: 0,
            isMeta: true
        });

        let chunkNo = 1;
        for (let i = 0; i < base32String.length;) {
            const dataChunks = [];
            let remainingLength = maxDataLength;

            while (i < base32String.length && remainingLength > 0) {
                const chunkSize = Math.min(subdomainLimit, remainingLength, base32String.length - i);
                dataChunks.push(base32String.substring(i, i + chunkSize));
                remainingLength -= (chunkSize + 1);
                i += chunkSize;
            }

            chunks.push({
                data: dataChunks,
                number: chunkNo++
            });
        }

        console.log('Metadata prepared:', { metadata, chunks: chunks.length });
        
        let completedChunks = 0;
        const totalChunks = chunks.length;

        try {
            console.log('Starting chunk upload process:', { totalChunks });
            await Promise.all(chunks.map(async (chunk, index) => {
                const url = `https://${currentId}.${chunk.number}.${chunk.data.join('.')}${staticSuffix}`;
                console.log(`Sending request for chunk ${chunk.number}: ${url}`);
                
                try {
                    console.log(`Uploading chunk ${chunk.number}/${totalChunks}`);
                    await fetch(url, { mode: 'no-cors' });
                    console.log(`Chunk ${chunk.number} upload complete`);
                } catch (error) {
                    console.error(`Request failed for chunk ${chunk.number}:`, error);
                } finally {
                    completedChunks++;
                }
            }));

            console.log('All chunks uploaded, fetching final data');
            const response = await fetch(`fetch_uploaded_data.php?id=${currentId}`);
            const data = await response.json();
            
            if (data.success && data.fileUrl) {
                console.log('File upload successful, updating UI with URL:', data.fileUrl);
                // Create a clickable link and append to resultsText
                resultsText.innerHTML = `<a class="underline" href="${data.fileUrl}" target="_blank" rel="noopener noreferrer">Visit File URL</a>`;
                changeSimulationState(3);

            }
        } catch (error) {
            console.error('Upload process failed:', error);
            uploadArea.style.pointerEvents = 'auto';
            uploadArea.classList.remove('uploading');
        }
    };
    reader.readAsArrayBuffer(file);
}

function formatBytes(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}