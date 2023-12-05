<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="The Home Page for PeoplePerTask Platform">
  <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia">
  <meta name="author" content="Zaiid Moumnii">

  <title>People Per Tasks</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">
  <link rel="stylesheet" href="../assets/dist/output.css">


</head>

<body class="dark:bg-gray-900 ">
  <?php
  include '../../includes/header.php';

  ?>

  <section class="hero-section">
    <div class="grid max-w-screen-xl mt-10 px-4 py-8  mx-auto lg:gap-0 xl:gap-0 lg:py-16 lg:grid-cols-12">
      <div class="mx-auto lg:mx-auto place-self-center lg:col-span-7 w-auto">
        <h1 class="max-w-2xl mb-4 text-5xl tracking-wider leading-wide md:text-5xl xl:tracking-normal xl:text-8xl xl:leading-wide dark:text-white ">Are you looking for Freelancers ? </h1>
        <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">Hire Great Freelancers, Fast. PeopleForTasks helps you hire elite freelancers at a moment's, or just be onenotice. </p>
        <a href="./marketplace.php" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-3xl bg-primary-600 hover:bg-primary-700 focus:ring-4">
          Hire Freelancers
          <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </a>
        <a href="./marketplace.php" class="inline-flex items-start justify-center mt-5 px-2 py-3 text-base text-left text-gray-900 border border-gray-300 rounded-3xl hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
          Look for freelancing jobs
        </a>
      </div>
      <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
        <img src="../assets/images/hero.png" alt="Freelance">
      </div>
    </div>
  </section>
  <section class="recent-works">
    <div class="flex flex-col items-center py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <h2 class="mb-12 text-2xl tracking-tight font-normal text-[#00373E] dark:text-white lg:text-5xl">Recently posted <span class="text-primary-600">works</span></h2>
      <div class="grid gap-6 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 items-center">
        <?php
        $sql = "SELECT * FROM projects ORDER BY ProjectID DESC LIMIT 3";
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {

          // Loop through the results and generate cards
          while ($row = mysqli_fetch_assoc($result)) {
            $P_title = $row['ProjectTitle'];
            $P_Description = $row['Description'];
        ?>
            <div class="w-64 bg-white p-8 rounded-lg dark:bg-gray-800 shadow-md">
              <div class="flex justify-between items-center content-center mb-4 w-fit h-fit rounded-full lg:h-fit lg:w-fit">
                <!-- Add your SVG or icon code here -->
                <h3 class="text-xl font-bold dark:text-white ml-2"> <?= $P_title ?> </h3>
              </div>
              <p class="text-gray-500 dark:text-gray-400"><?= $P_Description ?></p>
              <button type="button" class="text-orange-600 hover:text-black dark:hover:text-white focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-3xl text-xl px-3 py-2 text-center ml-1 md:ml-1 mt-5 dark:focus:ring-orange-600 ">APPLY NOW</button>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </section>

  <section class="categories">
    <div class=" flex flex-col items-center py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <h2 class="mb-12 text-2xl tracking-tight font-normal text-[#00373E] dark:text-white lg:text-5xl">Most Popular <span class="text-primary-600">categories</span></h2>
      <div class="grid gap-6 lg:gap-10 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 items-center">
      <?php
        $sql = "SELECT * FROM categories ORDER BY CategoryID ASC LIMIT 4";
        $result = mysqli_query($conn, $sql);

        // Check if there are any results
        if (mysqli_num_rows($result) > 0) {

          // Loop through the results and generate cards
          while ($row = mysqli_fetch_assoc($result)) {
            $C_Name = $row['CategoryName'];
        ?>
        <div class="shadow-md">
          <a href="./marketplace.php" class="block w-full h-50 relative rounded-2xl overflow-hidden">
            <img class="w-full h-full" src="../assets/images/category1.png" alt="Graphic Design">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
            <div class="absolute inset-0 flex items-center justify-center">
              <span class="text-white text-xl font-bold tracking-wider"><?= $C_Name ?></span>
            </div>
          </a>
        </div>
        <?php
          }
        }
        ?>
      </div>
      <button id="More" type="button" class="bg-primary-600 text-white hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-orange-300 font-medium rounded-3xl text-xl px-5 py-3 text-center ml-1 md:ml-1 mt-10 dark:focus:ring-orange-600">More categories
      </button>
    </div>
  </section>
  <section class=" freelancers">
    <div class=" flex flex-col items-center py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
      <h2 class=" mb-12 text-xl tracking-tight font-normal text-[#00373E] dark:text-white lg:text-5xl">Check out the most popular <span class="text-primary-600">freelancers</span></h2>
      <div class="grid gap-6 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 items-center">
        <div class="text-center text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 py-12 px-12 w-64 rounded-xl shadow-md">
          <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="../assets/images/freelancer2.jpg" alt="Khalid Oukha">
          <h3 class="mb-1 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            <a href="../src/freelancers.php">Khalid Oukha</a>
          </h3>
          <p>Graphic Designer</p>
        </div>
        <div class="text-center text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 py-12 px-12 w-64 rounded-xl shadow-md">
          <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="../assets/images/freelancer3.jpg" alt="Yassine Louissi">
          <h3 class="mb-1 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            <a href="../src/freelancers.php">Yassine Louissi</a>
          </h3>
          <p>UI UX Designer</p>
        </div>
        <div class="text-center text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 py-12 px-12 w-64 rounded-xl shadow-md">
          <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="../assets/images/freelancer1.jpg" alt="Abdeljabbar Ait">
          <h3 class="mb-1 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
            <a href="../src/freelancers.php">Abdeljabar
            </a>
          </h3>
          <p>SEO & Marketing</p>
        </div>
      </div>
    </div>
  </section>
  <section class="Testimonials">
    <div class=" flex flex-col justify-evenly sm:flex-row lg:flex-row items-center py-8 px-8 mx-auto max-w-screen-xl lg:px-6 lg:py-16 ">
      <div class="text-left w-96 ">
        <h2 class=" text-3xl font-bold tracking-widest leading-loose text-[#00373E] dark:text-white sm:text-3xl sm:leading-loose">
          What our customers are saying ?
        </h2>
        <p class="mt-7 sm:leading-10 text-gray-600 ">
          Doesn't matter if you're a freelancer or just a client looking for a task to be done ... “PeoplePerTasks” makes everything happen.
        </p>
        <div class="hidden lg:mt-8 lg:flex lg:gap-4">
          <button aria-label="previous slide" id="previous" class="rounded-full border border-black p-3 text-black transition dark:border-white dark:text-white hover:bg-[#00373E] hover:text-white">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 rtl:rotate-180">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
            </svg>
          </button>
          <button aria-label="Next slide" id="next" class="rounded-full border border-black p-3 text-black transition dark:border-white dark:text-white hover:bg-[#00373E] hover:text-white">
            <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
            </svg>
          </button>
        </div>
      </div>
      <div class="-mx-6 lg:col-span-2 lg:mx-0 self-center justify-start overflow-hidden mt-4 shadow-md" id="client">
        <div id="clients_slider" class="w-[410px] flex gap-4 px-2 duration-200">
          <div class="client">
            <div class="flex h-fit flex-col justify-between bg-white dark:bg-gray-800 p-6  rounded-2xl mt-3 shadow-sm w-96  sm:p-8 lg:p-12">
              <div>
                <div class="flex items-center ">
                  <img src="../assets/images/client1.jpg" alt="Aymane Benhima" class="mb-4 rounded-full w-11 h-11">
                  <div class="flex flex-col mb-4 ml-8">
                    <h3 class="dark:text-white">Aymane Benhima</h3>
                    <p class="text-gray-800 dark:text-gray-400 pt-2 lg:pt-2">Front-End Developer</p>
                  </div>
                </div>
                <p class="mt-4 leading-relaxed text-gray-700 dark:text-gray-400">
                  Loving this freelancing platform! As a front-end developer, the seamless interface and diverse opportunities make it my go-to. Quick payments and user-friendly experience keep me coming back. Kudos to the team for an awesome space for freelancers!
                </p>
              </div>
            </div>
          </div>
          <div class="client">
            <div class="flex h-fit flex-col justify-between bg-white dark:bg-gray-800 p-6  rounded-2xl mt-3 shadow-sm w-96  sm:p-8 lg:p-12">
              <div>
                <div class="flex items-center ">
                  <img src="../assets/images/client2.jpg" alt="Aymane Benhima" class="mb-4 rounded-full w-11 h-11">
                  <div class="flex flex-col mb-4 ml-8">
                    <h3 class="dark:text-white">Mohammed-elarbi El Hattab</h3>
                    <p class="text-gray-800 dark:text-gray-400 pt-2 lg:pt-2">Data scientist</p>
                  </div>
                </div>
                <p class="mt-4 leading-relaxed text-gray-700 dark:text-gray-400">
                  The diversity of data projects is outstanding, allowing me to apply my skills across various domains. Transparent communication and a reliable payment system make working here a pleasure. I'm truly glad to be one of your loyal customers
                </p>
              </div>
            </div>
          </div>
          <div class="client">
            <div class="flex h-fit flex-col justify-between bg-white dark:bg-gray-800 p-6  rounded-2xl mt-3 shadow-sm w-96  sm:p-8 lg:p-12">
              <div>
                <div class="flex items-center ">
                  <img src="../assets/images/client3.jpg" alt="Aymane Benhima" class="mb-4 rounded-full w-11 h-11">
                  <div class="flex flex-col mb-4 ml-8">
                    <h3 class="dark:text-white">Mohamed Tergui</h3>
                    <p class="text-gray-800 dark:text-gray-400 pt-2 lg:pt-2">Graphic Designer</p>
                  </div>
                </div>
                <p class="mt-4 leading-relaxed text-gray-700 dark:text-gray-400">
                  As a graphic designer, finding the right platform is crucial. P-P-T nails the essentials with a sleek, user-friendly interface that makes showcasing my portfolio and connecting with clients a breeze. It truly gets the needs of freelancers in the creative field.
                </p>
              </div>
            </div>
          </div>
          <div class="client">
            <div class="flex h-fit flex-col justify-between bg-white dark:bg-gray-800 p-6  rounded-2xl mt-3 shadow-sm w-96  sm:p-8 lg:p-12">
              <div>
                <div class="flex items-center ">
                  <img src="../assets/images/client4.jpg" alt="Aymane Benhima" class="mb-4 rounded-full w-11 h-11">
                  <div class="flex flex-col mb-4 ml-8">
                    <h3 class="dark:text-white">Bilal Chbanat</h3>
                    <p class="text-gray-800 dark:text-gray-400 pt-2 lg:pt-2">Video editor</p>
                  </div>
                </div>
                <p class="mt-4 leading-relaxed text-gray-700 dark:text-gray-400">
                  Freelancing bliss! As a video editor, this platform is a game-changer. The intuitive interface makes showcasing my portfolio and connecting with clients seamless. Hats off to the team for understanding and supporting freelancers' unique needs
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="mt-8 flex justify-center gap-4 lg:hidden">
        <button aria-label="previous slide" id="mobile-previous" class="rounded-full border border-black p-3 text-black transition dark:border-white dark:text-white hover:bg-[#00373E] hover:text-white">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-5 rtl:rotate-180">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
          </svg>
        </button>
        <button aria-label="Next slide" id="mobile-next" class="rounded-full border border-black p-3 text-black transition dark:border-white dark:text-white hover:bg-[#00373E] hover:text-white">
          <svg class="h-5 w-5 rtl:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 5l7 7-7 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
          </svg>
        </button>
      </div>

    </div>
  </section>

  <?php include '../../includes/footer.php' ?>
  <script src="../assets/js/theme.js"></script>
  <script src="../assets/js/home.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
</body>

</html>