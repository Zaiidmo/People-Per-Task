document.addEventListener('DOMContentLoaded', function () {
    // Get the modal element
    var modal = document.getElementById('modification-modal');

    // Get all buttons with id 'editbutton'
    var editButtons = document.querySelectorAll('#editbutton');

    // Add a click event listener to each 'editbutton'
    editButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        // Display the modal
        modal.classList.remove('hidden');
      });
    });

    // Close the modal when the 'close' span is clicked
    var closeSpan = modal.querySelector('.close');
    if (closeSpan) {
      closeSpan.addEventListener('click', function () {
        modal.classList.add('hidden');
      });
    };
  });