<?php
global $conn; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Project</title>
    <link rel="stylesheet" href="../assets/dist/output.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/charts.css/dist/charts.min.css" />
    <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/xa9tc8d74n31irheq08faof2hg0jl6i1umdahiksnewrhbad/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body class="bg-gray-200 dark:bg-gray-900">
    <?php
    include '../../includes/header.php';
    include '../../app/controllers/Dashboard/projects_script.php';
    include '../../app/controllers/fetchcategories.php';
    include '../../app/controllers/fetch-sub.php';
    ?>
    <?php if (isset($_SESSION['UserID'])) : ?>
        <main class="text-gray-400 body-font ">
            <div class="flex flex-col text-center items-center px-5 py-24 mx-auto">
                <h1 class="sm:text-3xl text-6xl font-medium title-font mb-16 text-white">Add a new Project</h1>
                <form action="" method="POST" class="space-y-8 flex flex-col justify-evenly w-1/2 md:w-1/2" id="form">
                    <div>
                        <input type="text" id="Title" name="Title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Project Name">
                        <span class="text-red-600 hidden" id="email-error">No valid</span>
                    </div>

                    <div>
                        <select id="categories" name="category" onchange="updateSubcategories()" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Add to Category</option>
                            <?php
                            // Populate the dropdown with categories
                            foreach ($categories as $category) {
                                echo "<option value=\"$category\">$category</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <select id="souscategories" name="souscategories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected >Add to Sub Category</option>
                            <?php
                            // Populate the dropdown with souscategories
                            foreach ($souscategories as $souscategories) {
                                echo "<option value=\"$souscategories\">$souscategories</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div>
                        <textarea type="text" id="Description" name="Description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Description ">
                    </textarea>
                        <span class="text-red-600 hidden" id="email-error">No valid</span>
                    </div>
                    <div>
                        <input type="text" id="tags" name="tags" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Add tags">
                        <div id="tag-suggestions"></div>
                        <span class="text-red-600 hidden" id="tags-error">No valid</span>
                    </div>
                    <div class="flex w-full justify-between ">
                        <div class="pr-5 w-1/2" >
                            <input type="number" id="Price" name="Price" class="w-full shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="$">
                        </div>
                        <div class="pl-5 w-1/2" >
                            <input type="date" id="deadline" name="deadline" class="w-full shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Deadline yyyy-mm-dd">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <div>
                            <button type="submit" class="font-extrabold py-3 px-5 text-sm text-center text-white rounded-xl bg-primary-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">C R E A T E</button>
                        </div>
                    </div>
                </form>
                <?= create_project() ?>
            </div>
        </main>
    <?php endif ?>
</body>
<script src="../assets/js/theme.js"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        content_css: '../assets/dist/output.css',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
    });
</script>


</html>