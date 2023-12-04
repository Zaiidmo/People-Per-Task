document.addEventListener('DOMContentLoaded', function () {
    // Get the modal element
    var modal = document.getElementById('modification-modal');

    // Get all buttons with class 'editfreelancer'
    var editButtons = document.querySelectorAll('.editfreelancer');

    // Add a click event listener to each 'editfreelancer' button
    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Display the modal
            modal.classList.remove('hidden');

            // Get the freelancer ID from the clicked button
            var freelancerId = button.dataset.freelancerId;

            // Assuming you have an input field in your form with the ID 'modalFreelancerId'
            var modalFreelancerIdInput = document.getElementById('FreelanceID');
            
            // Set the freelancer ID in the modal form
            if (modalFreelancerIdInput) {
                modalFreelancerIdInput.value = freelancerId;
            }

            console.log('Freelancer ID:', freelancerId);
        });
    });

    // Close the modal when the 'close' span is clicked
    var closeSpan = modal.querySelector('.close');
    if (closeSpan) {
        closeSpan.addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    }
});
