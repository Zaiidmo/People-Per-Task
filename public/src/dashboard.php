<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia">
    <meta name="author" content="Soulaiman Bouhlal, Zaiid Moumnii">
    <link rel="icon" type="image/x-icon" href="../images/logo.webp">
    <meta name="description" content="this page is an html project was given in a bootcamp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dist/output.css" />
    <title>Dashboard - peoplepertask</title>
</head>

<body class="dark:bg-gray-900">

    <?php
    include '../../includes/dashboard_navigation.php';
    require '../../app/controllers/dashboard_script.php';
    ?>
    <main class=" mt-14 p-12 ml-0 smXl:ml-64  dark:border-gray-700">

        <div class="cards flex flex-wrap justify-center tablet:justify-between gap-6 mb-12 ">
            <div class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]   tablet:max-w-[20rem] p-5 rounded-xl">
                <div class="icon_container mb-9">
                    <span class="h-9 w-9 bg-[#CAFFF2] rounded-full flex justify-center
                    items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z" stroke="#00373E" stroke-width="2" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="data_container flex justify-between">
                    <div class="left">
                        <p class="font-bold dark:text-gray-200 text-lg font-inter"><?= count_users() ?></p>
                        <p class="font-medium text-[#7F7D83] font-inter">Registered users</p>
                    </div>

                    <div class="right pr-2 pl-2 bg-green-100 w-fit rounded-lg flex items-center border border-green-300">
                        <span class="text-green-800 font-inter text-xl">+5.6%</span>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]  tablet:max-w-[20rem] p-5 rounded-xl">
                <div class="icon_container mb-9">
                    <span class="h-9 w-9 bg-[#FFD58F] rounded-full flex justify-center
                    items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z" stroke="#B27104" stroke-width="2" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>


                <div class="data_container flex justify-between">
                    <div class="left">
                        <p class="font-bold dark:text-gray-200  text-lg font-inter"> <?= count_freelancers() ?> </p>
                        <p class="font-medium text-[#7F7D83] font-inter">Active Freelancers</p>
                    </div>

                    <div class="right pr-2 pl-2 bg-red-100 w-fit rounded-lg flex items-center border border-red-300">
                        <span class="text-red-800 font-inter text-xl">-1.16%</span>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]  tablet:max-w-[20rem] p-5 rounded-xl">
                <div class="icon_container mb-9">
                    <span class="h-9 w-9 bg-[#EBF1FD] rounded-full flex justify-center items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z" stroke="#2080F6" stroke-width="2" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>


                <div class="data_container flex justify-between">
                    <div class="left">
                        <p class="font-bold dark:text-gray-200  text-lg font-inter"><?= count_categories() ?></p>
                        <p class="font-medium text-[#7F7D83] font-inter">Categories</p>
                    </div>

                    <div class="right pr-2 pl-2 bg-green-100 w-fit rounded-lg flex items-center border border-green-300">
                        <span class="text-green-800 font-inter text-xl">+10.05%</span>
                    </div>
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 card border border-[#D9D9DE] dark:border-gray-700 w-full max-w-[30rem]  tablet:max-w-[20rem] p-5 rounded-xl">
                <div class="icon_container mb-9">
                    <span class="h-9 w-9 bg-[#EBF1FD] rounded-full flex justify-center items-center">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M17.5 5.83333L10 1.66667L2.5 5.83333V14.1667L10 18.3333L17.5 14.1667V5.83333ZM10 12.7778C11.5943 12.7778 12.8868 11.5341 12.8868 10C12.8868 8.46588 11.5943 7.22222 10 7.22222C8.40569 7.22222 7.11325 8.46588 7.11325 10C7.11325 11.5341 8.40569 12.7778 10 12.7778Z" stroke="#802c98" stroke-width="2" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
                <div class="data_container  flex justify-between">
                    <div class="left">
                        <p class="font-bold dark:text-gray-200  text-lg font-inter"><?= count_projects() ?></p>
                        <p class="font-medium text-[#7F7D83] font-inter">Posted Projects</p>
                    </div>

                    <div class="right pr-2 pl-2 bg-green-100 w-fit rounded-lg flex items-center border border-green-300">
                        <span class="text-green-800 font-inter text-xl">+9.3%</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white  dark:bg-gray-800 border border-[#D9D9DE] dark:border-gray-700 rounded-xl p-8 mb-12 ">
            <span class="text-[#00373E] dark:text-gray-200  font-inter font-semibold text-lg block mb-5">Popular
                Categories of Jobs </span>
            <div class="h-[32rem] w-auto">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="flex flex-col gap-8">
            <div class="flex-1  w-full  bg-white border dark:bg-gray-800 border-[#D9D9DE] dark:border-gray-700 rounded-xl  p-4 md:p-6">
                <span class="text-[#00373E] dark:text-gray-200  font-inter font-semibold text-lg block mb-5">Income By
                    Countries</span>

                <div class="h-[32rem] w-full">
                    <canvas id="bar-chart"></canvas>
                </div>
            </div>

            <div class="w-fit  bg-white border dark:bg-gray-800 border-[#D9D9DE] dark:border-gray-700 rounded-xl  p-4 md:p-6">
                <span class="text-[#00373E] dark:text-gray-200  font-inter font-semibold text-lg block mb-5">Popular
                    locations of
                    Freelancers</span>
                <div class="py-6" id="pie-chart"></div>
            </div>


        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>