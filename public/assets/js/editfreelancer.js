// // Get the modal element
// var modal = document.getElementById('modification-modal');

// // Get the button that opens the modal
// var editButton = document.getElementById('editfreelancer');
// var closemodale = document.getElementById('close');

// // Function to toggle the modal
// function toggleModal() {
//     modal.classList.toggle('hidden');
// }

// // Event listener for the button click

// editButton.addEventListener('click', function () {
//     console.log('Edit freelancer button clicked');
//     toggleModal();
// });

// // Event listener for the close button click
// closemodale.addEventListener('click', function () {
//     console.log('Close span clicked');
//     toggleModal();
// });


    // document.addEventListener('DOMContentLoaded', function () {
    //     var modal = document.getElementById('modification-modal');
    //     var editButtons = document.querySelectorAll('.editfreelancer');
    //     var closeButton = document.getElementById('close');
    //     function toggleModal() {
    //     modal.classList.toggle('hidden');
    //     }

    //     // Attach event listeners to each edit button
    //     editButtons.forEach(function (button) {
    //         button.addEventListener('click', function () {
    //             toggleModal();
    //         });
    //     });

    //     // Event listener for the close button
    //     closeButton.addEventListener('click', function () {
    //         toggleModal();
    //     });

    //     // Close the modal if the user clicks outside it
    //     window.addEventListener("click", function (event) {
    //         if (event.target == modal) {
    //             toggleModal();
    //         }
    //     });
    // });
        
        var modal_validation = document.getElementsByClassName("modal_validation")[0];
        var modal_update = document.getElementsByClassName("modal_update")[0];
        var modal = document.getElementById("myModal");
        var span = document.getElementsByClassName("close")[0];
        span.onclick = function() {
            modal.style.display = "none";
            modal_validation.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == modal_validation) {
                modal_validation.style.display = "none";
            }
            if (event.target == modal_update) {
                modal_update.style.display = "none";
            }
        }
        function remove_category(id,type){
            modal_validation.style.display = "block";
            if(type=='category'){
                document.getElementById('id_catg').value=id;
                document.getElementById('action').value='remove_category';
            } 
            else{
                document.getElementById('id_catg').value=id;
                document.getElementById('action').value='remove_sous_category';
            }
        }
        function update_category(id,name,type,id_catg=null,name_catg=null){
            modal_update.style.display = "block";
            document.getElementById('id_catg').value=id;
            if(type=='update_category'){
                document.getElementById('action').value='update_category';
                document.getElementById('select_update').style.display='none';
                document.getElementById('name_catg').value=name;
            } 
            else{
                document.getElementById('action').value='update_sous_category';
                document.getElementById('select_update').style.display='block';
                document.getElementById('name_catg').value=name;
                document.getElementById('id_catg_selected').value=id_catg;
                document.getElementById('id_catg_selected').textContent=name_catg;
            }
        }

        <?php if(isset($_GET['msg'])){ ?>
            history.pushState({}, document.title, 'category.php');
        <?php } ?>
        
        document.getElementById('cancel_btn').addEventListener('click',()=>{
            modal_validation.style.display = "none";
        });

