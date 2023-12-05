document.addEventListener('DOMContentLoaded', function () {
    // Get the modal element
    var modal = document.getElementById('modification-modal');

    // Get all buttons with class 'editCategory'
    var editButtons = document.querySelectorAll('.editCategory');

    // Add a click event listener to each 'editCategory' button
    editButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            // Display the modal
            modal.classList.remove('hidden');

            // Get the Category ID from the clicked button
            var CategoryId = button.dataset.CategoryId;

            // Assuming you have an input field in your form with the ID 'modalCategoryId'
            var modalCategoryIdInput = document.getElementById('CategoryID');
            
            // Set the Category ID in the modal form
            if (modalCategoryIdInput) {
                modalCategoryIdInput.value = CategoryId;
            }

            console.log('Category ID:', CategoryId);
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
