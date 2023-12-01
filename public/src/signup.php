<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Sign Up</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">

  <link rel="stylesheet" href="../assets/dist/output.css">

</head>

<body class="dark:bg-gray-900 ">
  <?php include '../../includes/header.php'; ?>

  <!--Section signUp-->
  <section class="flex justify-center m-auto items-center max-w-screen-xl py-32 dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 w-[70%] bg-white border rounded-3xl dark: dark:bg-gray-700  ">
      <h2 class=" mb-16 text-5xl tracking-tight  text-center text-gray-900 dark:text-white  font-semibold"> Sign <span class="text-orange-500 text-semibold">Up</span></h2>
      <p class="m-4 text-dark text-2xl font-popping dark:text-white ">Welcome </p>
      <!--  Form signUp -->
      <form action="../../app/controllers/signup.php" methode="POST" class="space-y-8 " id="form">
        <div>
          <input type="text" id="nom" class="shadow-sm bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light " placeholder="First-name">
          <span class="text-red-600 hidden " id="name-error">no valid</span>
        </div>
        <div>
          <input type="text" id="lastNom" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Last-name">
          <span class="text-red-600 hidden" id="lastNomError">no valid</span>
        </div>
        <div>
          <input type="email" id="subject" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Email">
          <span class="text-red-600 hidden" id="email-error">no valid</span>
        </div>
        <div>
          <input type="password" id="password" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="password">
          <span class="text-red-600 hidden" id="password-error">no valid</span>
        </div>
        <div class="sm:col-span-2">
          <input type="password" id="Confirm_password" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Confirm Password">
          <span class="text-red-600 hidden" id="confirm-error">no valid</span>
        </div>
        <div class="flex justify-center">
          <div>
            <button type="submit" class="py-3 text-sm font-medium text-center text-white rounded-3xl bg-orange-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ">Start</button>
          </div>
        </div>
      </form>

      <div class=" flex justify-center">
        <div>
          <h2 class="text-orange-500 font-semibold pt-4 mt-4 ">Forgot Password ?</h2>
        </div>
      </div>
      <div class="flex justify-center dark:text-white mt-4 ">
        <p>Don't have an account? <span class="">SignUp</span></p>
      </div>
    </div>
  </section>
  <?php include '../../includes/footer.php'; ?>

</body>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/signup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</html>