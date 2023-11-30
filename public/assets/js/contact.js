    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('form');

        form.addEventListener('submit', function (event) {
            // Prevent the form from submitting
            event.preventDefault();

            // Validate the form fields
            if (!validateName() || !validatePhone() || !validateEmail() || !validateMessage()) {
                return;
            }

            // If all validations pass, you can submit the form
            form.submit();
        });

        function validateName() {
            const nameInput = document.getElementById('name');
            const nameError = document.getElementById('name-error');

            if (nameInput.value.trim() === '') {
                nameError.classList.remove('hidden');
                return false;
            } else {
                nameError.classList.add('hidden');
                return true;
            }
        }

        function validatePhone() {
            const phoneInput = document.getElementById('phone');
            const phoneError = document.getElementById('phone-error');
            const phoneRegex = /^\d{10}$/;

            if (!phoneRegex.test(phoneInput.value.trim())) {
                phoneError.classList.remove('hidden');
                return false;
            } else {
                phoneError.classList.add('hidden');
                return true;
            }
        }

        function validateEmail() {
            const emailInput = document.getElementById('subject');
            const emailError = document.getElementById('email-error');
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            if (!emailRegex.test(emailInput.value.trim())) {
                emailError.classList.remove('hidden');
                return false;
            } else {
                emailError.classList.add('hidden');
                return true;
            }
        }

        function validateMessage() {
            const messageInput = document.getElementById('Message');
            const messageError = document.getElementById('text-error');

            if (messageInput.value.trim() === '') {
                messageError.classList.remove('hidden');
                return false;
            } else {
                messageError.classList.add('hidden');
                return true;
            }
        }
    });