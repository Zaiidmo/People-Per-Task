<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Log In</title>
  <link rel="stylesheet" href="../assets/dist/contact.css">
  <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">

</head>

<body class=" bg-gray-100 dark: dark:bg-gray-900 ">
  <?php include '../../includes/header.php'; ?>


  <section class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md  dark:bg-gray-900 ">
    <div class="py-8 lg:py-16 px-4  w-[70%] bg-white border rounded-3xl dark: dark:bg-gray-700 m-80  ">
      <h2 class=" mb-16 text-6xl tracking-tight font-SemiBold text-center text-gray-900 dark:text-white font-semibold"> Log <span class="text-orange-500 font-semibold">In</span> </h2>
      <p class="m-4 text-dark text-2xl dark:text-white ">Welcome back</p>
      <!--FORM-->
      <form action="../../app/controllers/user-session.php" method="POST" class="space-y-8 flex flex-col justify-evenly" id="form">
        <div>
          <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light " placeholder="Email">
          <span class="text-red-600 hidden" id="email-error">No valid</span>
        </div>
        <div>
          <input type="password" id="password" name="password" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Password">
          <span class="text-red-600 hidden" id="password-error">No valid</span>
        </div>
        <div class="flex justify-center ">
          <div> <button type="submit" name="login" class="py-3 px-5 text-sm font-medium text-center text-white rounded-3xl bg-orange-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800   ">login</button>
          </div>

        </div>
      </form>
      <div class=" flex justify-center ">
        <div>
          <h2 class="text-orange-500 font-extrabold mt-4 ">Forgot Password ?</h2>
        </div>
      </div>
      <div class="dark:text-white flex justify-center mt-4 ">
        <p>Don't have an account? <a href="./signup.php" class="text-blue-600">SignUp</a>
        <p>
      </div>
    </div>
  </section>
  <!-- section footer-->
  <?php include '../../includes/footer.php'; ?>

</body>
<script src="../assets/js/theme.js"></script>
<!-- <script src="../assets/js/signin.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</html>