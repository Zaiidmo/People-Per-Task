    document.getElementById('form').addEventListener('submit', function (event) {
        var isValid = true;

        // Name validation
        var name = document.getElementById('name').value.trim();
        var nameError = document.getElementById('name-error');
        if (name === '') {
            nameError.textContent = 'Name is required';
            isValid = false;
        } else {
            nameError.textContent = '';
        }

        // Subject validation
        var subject = document.getElementById('subject').value.trim();
        var subjectError = document.getElementById('subject-error');
        if (subject === '') {
            subjectError.textContent = 'Subject is required';
            isValid = false;
        } else {
            subjectError.textContent = '';
        }

        // Phone validation
        var phone = document.getElementById('phone').value.trim();
        var phoneError = document.getElementById('phone-error');
        // You can add more complex phone number validation if needed
        if (phone === '' || !/^\d{10}$/.test(phone)) {
            phoneError.textContent = 'Phone number is not valid';
            isValid = false;
        } else {
            phoneError.textContent = '';
        }

        // Email validation
        var email = document.getElementById('email').value.trim();
        var emailError = document.getElementById('email-error');
        // You can add more complex email validation if needed
        if (email === '' || !/^\S+@\S+\.\S+$/.test(email)) {
            emailError.textContent = 'Email is not valid';
            isValid = false;
        } else {
            emailError.textContent = '';
        }

        // Message validation
        var message = document.getElementById('message').value.trim();
        var messageError = document.getElementById('message-error');
        if (message === '') {
            messageError.textContent = 'Message is required';
            isValid = false;
        } else {
            messageError.textContent = '';
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
