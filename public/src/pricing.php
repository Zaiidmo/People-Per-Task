<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/dist/output.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <title>Pricing</title>
  </head>
  <body class="bg-gray-100 dark:bg-gray-900">
  <?php include '../../includes/header.php'; ?>

    <div class="container px-6 py-8 md:py-32 mx-auto dark:bg-gray-900">
      <h1
        class="w-full text-center text-4xl md:text-5xl font-extrabold dark:text-white"
      >
        Pricing Plan
      </h1>

      <p
        class="max-w-2xl mx-auto mt-4 text-center text-gray-500 xl:mt-6 dark:text-gray-300"
      >
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Alias quas
        magni libero consequuntur voluptatum velit amet id repudiandae ea,
        deleniti laborum in neque eveniet.
      </p>

      <div
        class="grid grid-cols-1 gap-8 mt-6 xl:mt-12 xl:gap-12 md:grid-cols-2 lg:grid-cols-3"
      >
        <div
          class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg dark:border-gray-700"
        >
          <p class="font-medium text-gray-500 uppercase dark:text-gray-300">
            Free
          </p>

          <h2
            class="text-4xl font-semibold text-gray-800 uppercase dark:text-gray-100"
          >
            $0
          </h2>

          <p class="font-medium text-gray-500 dark:text-gray-300">Life time</p>

          <a
            href="../src/error404.php"
            class="inline-block w-full px-4 py-2 mt-10 tracking-wide text-white capitalize transition-colors duration-300 transform bg-orange-600 rounded-md hover:bg-orange-500 focus:outline-none focus:bg-orange-500 focus:ring focus:ring-orange-300 focus:ring-opacity-80"
          >
            Start Now
          </a>
        </div>

        <div class="w-full p-8 space-y-8 text-center bg-orange-600 rounded-lg">
          <p class="font-medium text-gray-200 uppercase">Premium</p>

          <h2
            class="text-5xl font-bold text-white uppercase dark:text-gray-100"
          >
            $40
          </h2>

          <p class="font-medium text-gray-200">Per month</p>

          <a
            href="../src/error404.php"
            class="inline-block w-full px-4 py-2 mt-10 tracking-wide text-orange-500 capitalize transition-colors duration-300 transform bg-white rounded-md hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:ring focus:ring-gray-200 focus:ring-opacity-80"
          >
            Start Now
          </a>
        </div>

        <div
          class="w-full p-8 space-y-8 text-center border border-gray-200 rounded-lg dark:border-gray-700"
        >
          <p class="font-medium text-gray-500 uppercase dark:text-gray-300">
            Enterprise
          </p>

          <h2
            class="text-4xl font-semibold text-gray-800 uppercase dark:text-gray-100"
          >
            $100
          </h2>

          <p class="font-medium text-gray-500 dark:text-gray-300">Life time</p>

          <a
            href="../src/error404.php"
            class="inline-block w-full px-4 py-2 mt-10 tracking-wide text-white capitalize transition-colors duration-300 transform bg-orange-600 rounded-md hover:bg-orange-500 focus:outline-none focus:bg-orange-500 focus:ring focus:ring-orange-300 focus:ring-opacity-80"
          >
            Start Now
          </a>
        </div>
      </div>
    </div>
    <?php include '../../includes/footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
    <script src="../assets/js/theme.js"></script>
  </body>
</html>
