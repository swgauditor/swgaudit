// Video categories mapping
const videoCategories = {
  entertainment: "YjlgahImVwI",
  education: "zQGOcOUBi6s",
  "film-animation": "cqGjhVJWtEg",
  "autos-vehicles": "ootFmPxtBIo",
  music: "kJQP7kiw5Fk",
  "pets-animals": "B3u4EFTwprM",
  sports: "K3o2QaaXN0o",
  "travel-events": "WT5JvAq50OE",
  gaming: "QdBZY2fkU-0",
  "people-blogs": "H-1HEyPr4Ew",
  "news-politics": "SQD7AO3_nmU",
  "howto-style": "Mg7aJdnbY48",
  "science-technology": "9hWQpY-656M",
  movies: "uYPbbksJxIg",
  "action-adventure": "TcMBFSGVi1c",
  drama: "D30r0CwtIKc",
  family: "LEjhY15eCx0",
  foreign: "isOGD_7hNIY",
  horror: "k10ETZ41q5o",
  thriller: "WR7cc5t7tv8",
  trailers: "LembwKDo1Dk",
};

// Initialize when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
  const categorySelect = document.getElementById("video-category");
  const videoPlayer = document.getElementById("video-player");

  // Handle category change
  categorySelect.addEventListener("change", function () {
    const selectedCategory = this.value;
    const videoId = videoCategories[selectedCategory];

    if (videoId) {
      // Update iframe src with new video
      videoPlayer.src = `https://www.youtube.com/embed/${videoId}`;

      // Log the activity for security testing purposes
      logVideoRequest(selectedCategory, videoId);
    }
  });

  // Function to log video requests (for security testing)
  function logVideoRequest(category, videoId) {
    const logData = {
      timestamp: new Date().toISOString(),
      category: category,
      videoId: videoId,
      userAgent: navigator.userAgent,
      referrer: document.referrer,
    };

    // In a real implementation, this would send to a logging endpoint
    console.log("Video Request:", logData);

    // Optional: Send to PHP backend for logging
    if (typeof fetch !== "undefined") {
      fetch("log_video_request.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(logData),
      }).catch((error) => {
        console.log("Logging failed:", error);
      });
    }
  }

  // Load initial video (Entertainment)
  const initialCategory = categorySelect.value;
  const initialVideoId = videoCategories[initialCategory];
  if (initialVideoId) {
    videoPlayer.src = `https://www.youtube.com/embed/${initialVideoId}`;
  }
});

// Optional: Add keyboard navigation for accessibility
document.addEventListener("keydown", function (event) {
  const categorySelect = document.getElementById("video-category");

  if (event.target === categorySelect) {
    // Allow arrow keys to navigate through options
    if (event.key === "Enter" || event.key === " ") {
      event.preventDefault();
      categorySelect.click();
    }
  }
});
