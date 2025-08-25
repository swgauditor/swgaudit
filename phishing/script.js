document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('phishing-form');
    const resetContainer = document.getElementById('reset-container');
    const capturedCredentials = document.getElementById('captured-credentials');
    const resetBtn = document.getElementById('resetBtn');

    resetBtn.addEventListener('click', function() {
        form.reset();
        
        form.style.display = "flex";
        resetContainer.style.display = "none";
        
        // Clear captured credentials
        capturedCredentials.textContent = '';
        
        // Clear URL parameters
        window.history.replaceState({}, document.title, window.location.pathname);
    });
});