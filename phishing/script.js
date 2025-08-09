document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('phishing-form');
    const resetContainer = document.getElementById('reset-container');
    const capturedCredentials = document.getElementById('captured-credentials');
    const resetBtn = document.getElementById('resetBtn');

    resetBtn.addEventListener('click', function() {
        // Reset form values
        form.reset();
        form.hidden = false; // Show form
        resetContainer.hidden = true; // Hide results panel
        
        // Clear captured credentials
        capturedCredentials.textContent = '';
        
        // Clear URL parameters
        window.history.replaceState({}, document.title, window.location.pathname);
    });
});