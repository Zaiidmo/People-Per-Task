<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia">
    <meta name="author" content="ZAIID MOUMNII">
    <meta name="description" content="this page is an html project was given in a bootcamp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dist/output.css" />
    <title>Settings</title>
</head>

<body class="bg-white dark:bg-gray-900">
    <?php session_start() ?>
    <?php if (isset($_SESSION['UserID'])) : ?>
        <?php
        include '../../includes/dashboard_navigation.php';
        require '../../app/controllers/Dashboard/updateprofile.php';
        ?>
        <main class="mt-16 h-screen">
            <section class="bg-white dark:bg-gray-900">
                <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
                    <h1 class="mb-4 font-mono tracking-widest text-5xl text-center pb-10 font-bold text-gray-900 dark:text-white">
                        Edit Your Profile
                    </h1>
                    <form id="profile_update" action="" method="POST" enctype="multipart/form-data">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
                            <div class="sm:col-span-2">
                                <label for="UserName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Name</label>
                                <input type="text" name="UserName" id="UserName" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Type Your new UserName" />
                            </div>
                            <div class="sm:col-span-2">
                                <label for="Email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" name="Email" id="Email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Type your new Email"  />
                            </div>
                            <div class="sm:col-span-2">
                                <label for="phoneNumber" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                                <input type="text" name="phoneNumber" id="phoneNumber" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Type your new Phone Number"  />
                            </div>
                            <div class="w-full">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Password"  />
                            </div>
                            <div class="w-full">
                                <label for="confirmpassword" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                                <input type="password" name="confirmpassword" id="confirmpassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" placeholder="Confirm Password"  />
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="Profile Picture">Upload a new profile picture</label>
                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="Profile Picture" name="New_profilePic" id="Profile Picture" type="file" />
                            </div>
                        </div>
                        <div class="flex items-center space-x-4">
                            <button type="submit" name="update" class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                Update Profile
                            </button>
                            <button type="submit" name="delete" id="deleteAccountBtn" onclick="return confirmDelete()" class="text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                                <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                </svg>
                                Delete Account
                            </button>
                        </div>
                        <?php update_profile() ?>
                    </form>
                </div>
            </section>
        </main>
    <?php else : ?>
        <div class="grid h-screen px-4 place-content-center">
            <div class="text-center">
                <h1 class="font-black text-gray-200 text-9xl">:)</h1>

                <p class="text-2xl font-bold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    Uh-oh!
                </p>

                <p class="mt-4 text-gray-500">You Don't Have Permission to be here. </p>

                <a href="../src/index.php" class="inline-block px-5 py-3 mt-6 text-sm font-medium text-white bg-orange-600 rounded hover:bg-orange-700 focus:outline-none focus:ring">
                    Go Back Home
                </a>
            </div>
        </div>
    <?php endif ?>
</body>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/navigation.js"></script>
<script>
    function confirmDelete() {
        var confirmation = confirm(`Are you sure you want to delete Your Account ???`);
        return confirmation;
    }
</script>

</html>