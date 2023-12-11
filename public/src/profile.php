<?php
global $conn;
session_start();
?>
<?php if (isset($_SESSION['UserID'])) : ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia">
        <meta name="author" content="Soulaiman Bouhlal">
        <meta name="description" content="this page is an html project was given in a bootcamp">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../assets/dist/output.css" />
        <title><?= $_SESSION['UserName'] ?></title>
        <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">
    </head>

    <body class="bg-gray-200 dark:bg-gray-900">
        <?php
        include '../../includes/profile_navigation.php';
        include '../../app/controllers/profile.php';
        ?>
        <section class="dark:bg-gray-900">
            <div class="container mx-auto my-32 p-5">
                <div class="md:flex no-wrap md:-mx-2">
                    <!-- Left Side -->
                    <div class="w-screen md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div id="profile_card" class="bg-white dark:bg-gray-800 border  rounded-xl border-gray-300 shadow-md p-5 dark:border-gray-700">
                            <div class="image overflow-hidden">
                                <img class="h-52 w-52 rounded-full mx-auto" src="<?= $_SESSION['profile_picture'] ?>" alt="User Profile Picture" />
                            </div>
                            <h1 class="text-gray-900 text-center dark:text-white font-bold text-xl leading-8 my-1">
                                <?= $_SESSION['UserName'] ?>
                            </h1>
                            <h3 class="text-gray-600 text-center dark:text-gray-400 font-lg text-semibold leading-6">
                                <?= $_SESSION['Email'] ?>
                            </h3>
                            <ul class="bg-gray-100 dark:bg-gray-800 border  rounded-xl border-gray-300 dark:border-gray-700 p-5 text-gray-600 dark:text-gray-200 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y shadow-sm">
                                <li class="flex items-center py-3">
                                    <span>Status</span>
                                    <span class="ml-auto"><span class="bg-blue-500 py-1 px-2 rounded text-white text-sm">Active</span></span>
                                </li>
                                <li class="flex items-center py-3">
                                    <span>Member since</span>
                                    <span class="ml-auto">Nov 07, 2016</span>
                                </li>
                            </ul>
                            <a href="">
                                <button class="w-full block mb-7 mt-5 font-inter text-black dark:text-white  bg-trasparent dark:hover:bg-primary-600 hover:bg-primary-600 font-medium rounded-lg text-sm px-5 py-2.5 text-center border border-primary-600" type="button">
                                    GET IN TOUCH
                                </button>
                            </a>
                        </div>
                        <div id="profile_card" class="bg-white dark:bg-gray-800 border  rounded-xl border-gray-300 shadow-md p-5 dark:border-gray-700 mt-5">
                            <h1 class="text-gray-900 text-center dark:text-white font-bold text-xl leading-8 my-1">
                                SKILLS
                            </h1>
                            <form id="addSkillsForm" method="POST">
                                <div>
                                    <input type="text" id="skills" name="skills" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Add skills">
                                    <div id="skills-suggestions"></div>
                                </div>
                                <button type="button" onclick="addSkills()">Add Skills</button>
                                <div id="response"></div>
                            </form>

                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-64">
                        <!-- Profile tab -->
                        <!-- About Section -->
                        <div id="about_card" class="bg-white dark:bg-gray-800 border  rounded-xl border-gray-300 p-5 dark:border-gray-700 shadow-md flex flex-col ">
                            <div id="about_title" class="flex items-center space-x-2 font-semibold text-gray-900 dark:text-white leading-8">
                                <span clas="text-blue-500">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </span>
                                <h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">ABOUT ME</h3>
                            </div>
                            <div class="text-gray-700 dark:text-gray-400">
                                <div class="grid md:grid-cols-2 text-sm ">
                                    <div class="grid grid-cols-2 ">
                                        <div class="px-4 py-2 font-semibold text-gray-700 dark:text-gray-300">Full Name</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= $_SESSION['UserName'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold  text-gray-700 dark:text-gray-300">Work's Phone Number</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= '+' . $_SESSION['Phone'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold  text-gray-700 dark:text-gray-300">Email.</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= $_SESSION['Email'] ?></div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold  text-gray-700 dark:text-gray-300">Actual Position</div>
                                        <div class="px-4 py-2 text-gray-700 dark:text-gray-400"><?= $_SESSION['UserType'] ?></div>
                                    </div>
                                </div>
                            </div>
                            <button class="inline-block self-center text-primary-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100       hover:shadow-xs p-3 my-4"> Edit Information</button>
                        </div>
                        <!-- End of about section -->
                        <div class="my-4"></div>
                        <!-- Projects -->
                        <div id="freelancer_offers" class="bg-white dark:bg-gray-800 border rounded-xl border-gray-300 p-5 dark:border-gray-700 shadow-md flex flex-col ">
                            <div id="title" class="flex gap-4">
                                <span class="self-start text-Gray-900 dark:text-white">
                                    <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>

                                <?php if ($_SESSION['UserType'] === 'Admin') : ?>
                                    <h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">POSTED PROJECTS</h3>
                            </div>
                            <div class="grid grid-cols-3 gap-5">
                                <?php
                                    $conn = mysqli_connect("localhost", "root", "", "peoplepertask");

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }
                                    $sql = 'SELECT projects.*, Users.UserName
                                             FROM projects
                                             INNER JOIN Users ON projects.UserID = Users.UserID';
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $P_id = $row['ProjectID'];
                                            $P_title = $row['ProjectTitle'];
                                            $P_desc = $row['Description'];
                                            $res = $row['UserName'];

                                ?>

                                        <div class="w-64 mt-6 bg-white p-8 border border-gray-300 dark:border-gray-700  rounded-lg dark:bg-gray-800 shadow-md">
                                            <div class="flex justify-between items-center content-center mb-4 w-fit h-fit rounded-full lg:h-fit lg:w-fit  ">
                                                <svg width="40" height="42" viewBox="0 0 37 39" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-[#00373E] dark:text-white">
                                                    <path d="M23.3543 23.5229L36.3887 0.6875H27.6543L14.5863 23.5145C14.57 23.5346 14.561 23.5598 14.561 23.5858C14.561 23.6118 14.57 23.637 14.5863 23.6572L22.8924 38.2537C22.926 38.3125 22.9596 38.3125 23.0268 38.3125H31.6855L23.3459 23.6404C23.3391 23.6213 23.3363 23.601 23.3377 23.5808C23.3392 23.5605 23.3448 23.5408 23.3543 23.5229ZM15.6361 16.1574L10.6895 7.49023C10.673 7.4611 10.6482 7.43754 10.6183 7.42257C10.5884 7.40761 10.5547 7.40193 10.5215 7.40625H2.45898L7.40566 16.1742C7.41663 16.1948 7.41962 16.2187 7.41406 16.2414L0.611328 27.5625H8.74102C8.76856 27.566 8.7965 27.5605 8.8207 27.5469C8.8449 27.5333 8.86407 27.5123 8.87539 27.4869L15.6361 16.2582C15.6445 16.2251 15.6445 16.1905 15.6361 16.1574Z" fill="currentcolor" />
                                                </svg>
                                                <h3 class=" text-xl font-bold dark:text-white ml-2"><?= $P_title ?></h3>
                                            </div>
                                            <div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" class="text-gray-500 dark:text-gray-400"><?= $P_desc ?></div>
                                            <button type="button" class="text-orange-600 hover:text-black dark:hover:text-white focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-3xl text-sm px-3 py-2 text-left ml-1 md:ml-1 mt-5 dark:focus:ring-orange-600 ">Posted By <?= $res ?>
                                            </button>
                                        </div>
                                <?php
                                        }
                                    } else {
                                        echo '<h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">YOU HAVE NOT POSTED ANY PROJECT YET</h3>';
                                    }

                                ?>
                            </div>

                        <?php elseif ($_SESSION['UserType'] === 'Client') : ?>
                            <h3 class="text-left text-gray-700 tracking-widest dark:text-white font-mono font-bold ">MY POSTED PROJECTS</h3>
                        </div>
                        <div class="grid grid-cols-3 gap-10">

                            <?php
                                    $conn = mysqli_connect("localhost", "root", "", "peoplepertask");

                                    if (!$conn) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }
                                    $sql = 'SELECT* FROM projects WHERE UserID =' . $_SESSION["UserID"];
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $P_id = $row['ProjectID'];
                                            $P_title = $row['ProjectTitle'];
                                            $P_desc = $row['Description'];

                            ?>

                                    <div class="w-64 mt-6 bg-white p-8 border border-gray-300 dark:border-gray-700  rounded-lg dark:bg-gray-800 shadow-md">
                                        <div class="flex justify-between items-center content-center mb-4 w-fit h-fit rounded-full lg:h-fit lg:w-fit  ">
                                            <svg width="40" height="42" viewBox="0 0 37 39" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-[#00373E] dark:text-white">
                                                <path d="M23.3543 23.5229L36.3887 0.6875H27.6543L14.5863 23.5145C14.57 23.5346 14.561 23.5598 14.561 23.5858C14.561 23.6118 14.57 23.637 14.5863 23.6572L22.8924 38.2537C22.926 38.3125 22.9596 38.3125 23.0268 38.3125H31.6855L23.3459 23.6404C23.3391 23.6213 23.3363 23.601 23.3377 23.5808C23.3392 23.5605 23.3448 23.5408 23.3543 23.5229ZM15.6361 16.1574L10.6895 7.49023C10.673 7.4611 10.6482 7.43754 10.6183 7.42257C10.5884 7.40761 10.5547 7.40193 10.5215 7.40625H2.45898L7.40566 16.1742C7.41663 16.1948 7.41962 16.2187 7.41406 16.2414L0.611328 27.5625H8.74102C8.76856 27.566 8.7965 27.5605 8.8207 27.5469C8.8449 27.5333 8.86407 27.5123 8.87539 27.4869L15.6361 16.2582C15.6445 16.2251 15.6445 16.1905 15.6361 16.1574Z" fill="currentcolor" />
                                            </svg>
                                            <a href="./single_page.php?id=<?= $P_id ?>">
                                                <h3 class=" text-xl font-bold dark:text-white ml-2"><?= $P_title ?></h3>
                                            </a>
                                        </div>
                                        <div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" class="text-gray-500 dark:text-gray-400"><?= $P_desc ?></div>
                                        <button type="button" class="text-orange-600 hover:text-black dark:hover:text-white focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-3xl text-xl px-3 py-2 text-center ml-1 md:ml-1 mt-5 dark:focus:ring-orange-600 ">EDIT PROJECT
                                        </button>
                                    </div>
                            <?php
                                        }
                                    } else {
                                        echo '<h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">YOU HAVE NOT POSTED ANY PROJECT YET</h3>';
                                    }
                            ?>
                        </div>

                    <?php else : ?>
                        <h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">MY PROPOSALS</h3>
                    </div>
                    <div class="grid grid-cols-3 gap-10">

                        <?php
                                    $conn = mysqli_connect("localhost", "root", "", "peoplepertask");
                                    $id_finder = 'SELECT FreelanceID FROM freelances WHERE UserID = ' . $_SESSION["UserID"];
                                    $id_finder_result = mysqli_query($conn, $id_finder);
                                    $id_finder_row = mysqli_fetch_assoc($id_finder_result);
                                    $FreelanceID = $id_finder_row['FreelanceID'];
                                    $sql = 'SELECT projects.*, offers.status
                                FROM projects
                                INNER JOIN offers ON projects.ProjectID = offers.ProjectID
                                WHERE offers.FreelanceID = ' . $FreelanceID;

                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $P_id = $row['ProjectID'];
                                            $P_title = $row['ProjectTitle'];
                                            $P_desc = $row['Description'];
                                            $proposalStatus = $row['status'];

                        ?>

                                <div class="w-64 mt-6 bg-white p-8 border border-gray-300 dark:border-gray-700  rounded-lg dark:bg-gray-800 shadow-md">
                                    <div class="flex justify-between items-center content-center mb-4 w-fit h-fit rounded-full lg:h-fit lg:w-fit  ">
                                        <svg width="40" height="42" viewBox="0 0 37 39" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-[#00373E] dark:text-white">
                                            <path d="M23.3543 23.5229L36.3887 0.6875H27.6543L14.5863 23.5145C14.57 23.5346 14.561 23.5598 14.561 23.5858C14.561 23.6118 14.57 23.637 14.5863 23.6572L22.8924 38.2537C22.926 38.3125 22.9596 38.3125 23.0268 38.3125H31.6855L23.3459 23.6404C23.3391 23.6213 23.3363 23.601 23.3377 23.5808C23.3392 23.5605 23.3448 23.5408 23.3543 23.5229ZM15.6361 16.1574L10.6895 7.49023C10.673 7.4611 10.6482 7.43754 10.6183 7.42257C10.5884 7.40761 10.5547 7.40193 10.5215 7.40625H2.45898L7.40566 16.1742C7.41663 16.1948 7.41962 16.2187 7.41406 16.2414L0.611328 27.5625H8.74102C8.76856 27.566 8.7965 27.5605 8.8207 27.5469C8.8449 27.5333 8.86407 27.5123 8.87539 27.4869L15.6361 16.2582C15.6445 16.2251 15.6445 16.1905 15.6361 16.1574Z" fill="currentcolor" />
                                        </svg>
                                        <a href="./single_page.php?id=<?= $P_id ?>">
                                            <h3 class=" text-xl font-bold dark:text-white ml-2"><?= $P_title ?></h3>
                                        </a>
                                    </div>
                                    <div style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;" class="text-gray-500 dark:text-gray-400"><?= $P_desc ?></div>
                                    <?php if ($proposalStatus === 'approved') : ?>
                                        <div style="background-color: green;" class="w-fit mt-5 rounded-full text-white py-1.5 px-3 text-xs font-semibold">
                                            Assigned
                                        </div>
                                    <?php elseif ($proposalStatus === 'denied') : ?>
                                        <div style="background-color: Red;" class="w-fit mt-5 rounded-full text-white py-1.5 px-3 text-xs font-semibold">
                                            Rejected
                                        </div>
                                    <?php else : ?>
                                        <div style="background-color: Gray;" class="w-fit mt-5 rounded-full text-black py-1.5 px-3 text-xs font-semibold">
                                            Pending
                                        </div>
                                    <?php endif ?>
                                </div>
                        <?php
                                        }
                                    } else {
                                        echo '<h3 class="text-left mr-96 text-gray-700 tracking-widest dark:text-white font-mono font-bold ">YOU HAVE NOT PROPOSED FOR ANY PROJECT YET</h3>';
                                    }
                        ?>
                    </div>

                <?php endif ?>
            <?php endif ?>

            <!-- End of Experience and education grid -->
                </div>
                <!-- End of profile tab -->
            </div>
            </div>
            </div>
        </section>
    </body>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/navigation.js"></script>
    <script>
        function addSkills() {
            // Retrieve form data
            var skillsInput = document.getElementById('skills');
            var skills = skillsInput.value;

            // Validate input
            if (skills.trim() === '') {
                // If skills are empty, don't proceed
                return;
            }

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Configure it: specify the type of request and the URL
            xhr.open('POST', '../../app/controllers/profile.php', true);

            // Set the request header
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Define what happens on successful data submission
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Update the response element with the server's response
                    document.getElementById('response').innerHTML = xhr.responseText;
                    // Clear the skills input field
                    skillsInput.value = '';
                }
            };

            // Define what happens in case of an error
            xhr.onerror = function() {
                console.error('Request failed.');
            };

            // Send the request with the skills data
            xhr.send('skills=' + encodeURIComponent(skills));
        }
    </script>

    </html>