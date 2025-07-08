document.addEventListener('DOMContentLoaded', function() {
const form = document.querySelector('form');
const submitBtn = document.getElementById('submitBtn');
const successMessage = document.getElementById('successMessage');

form.addEventListener('submit', function(e) {
    // Show immediate feedback while form submits
    successMessage.style.display = 'block';

    // Update button text
    submitBtn.textContent = 'Submitting...';
    submitBtn.style.backgroundColor = '#92eaac';
    submitBtn.style.color = '#000';
    submitBtn.disabled = true;

    // Form will now submit to process.php
});
});