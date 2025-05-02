document.addEventListener('DOMContentLoaded', () => {
    const loginForm = document.getElementById('phishing-form');
    const failureContainer = document.getElementById('failure-container');
    const resetButton = document.getElementById('reset-button');
    const submitButton = document.getElementById('submit-button');
    const Card = document.querySelector('.container');

    loginForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData(loginForm);

        try {
            const response = await fetch('phish.php', {
                method: 'POST',
                body: formData
            });

            const responseData = await response.json();
            
            if (response.ok && responseData.status === 'success') {
                document.getElementById('failed-username').textContent = responseData.data.username;
                document.getElementById('failed-password').textContent = responseData.data.password;
                submitButton.classList.add('hidden');
                loginForm.classList.add('hidden');
                failureContainer.classList.remove('hidden');
                Card.classList.add('failed');
            } else {
                throw new Error(responseData.message);
            }
        } catch (error) {
            alert('Form submission blocked by SWG: ' + error.message);
        }
    });

    resetButton.addEventListener('click', function(e) {
        e.preventDefault();
        loginForm.reset();
        loginForm.classList.remove('hidden');
        failureContainer.classList.add('hidden');
        Card.classList.remove('failed');
        submitButton.classList.remove('hidden');
    });
});