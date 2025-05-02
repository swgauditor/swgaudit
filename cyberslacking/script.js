document.addEventListener('DOMContentLoaded', () => {
    setCyberslackingSelect();
});

async function setCyberslackingSelect() {
    const selectElement = document.getElementById('category-select');
    const videoFrame = document.getElementById('youtube-frame');

    try {
        const response = await fetch('videos.json');
        const data = await response.json();
        
        data.categories.forEach((category, index) => {
            const option = document.createElement('option');
            option.value = category.video;
            option.textContent = category.title;
            option.dataset.category = category.name;
            selectElement.appendChild(option);

            if (index === 0) {
                videoFrame.src = `https://www.youtube.com/embed/${category.video}`;
            }
        });

        selectElement.addEventListener('change', (event) => {
            const videoId = event.target.value;
            videoFrame.src = `https://www.youtube.com/embed/${videoId}`;
        });
    } catch (error) {
        console.error('Error loading video categories:', error);
    }
}