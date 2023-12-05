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
      <form action="../../app/controllers/user-session.php" method="POST" id="form" class="flex flex-col items-center max-w-lg mx-auto" enctype="multipart/form-data">
        <div class="w-full grid md:grid-cols-2 md:gap-4 lg:gap-8">
          <div class="relative z-0 w-full mb-5 group">
            <label for="first_name" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
            <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm rounded-3xl text-gray-900 bg-transparent border-2 border-b-4 border-gray-900 dark:text-white dark:bg-gray-600 dark:border-gray-300 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer mt-2" placeholder=" " required />
            <span class="hidden" id="fname-error"></span>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <label for="last_name" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last name</label>
            <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm rounded-3xl text-gray-900 bg-transparent border-2 border-b-4 border-gray-900 dark:text-white dark:bg-gray-600 dark:border-gray-300 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer mt-2" placeholder=" " required />
            <span class="hidden" id="lname-error"></span>
          </div>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <label for="email" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 ">Email address</label>
          <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm rounded-3xl text-gray-900 bg-transparent border-2 border-b-4 border-gray-900 dark:text-white dark:bg-gray-600 dark:border-gray-300 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer mt-2" placeholder=" " required />
          <span class="hidden" id="email-error"></span>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <label for="password" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
          <input type="password" name="password" id="password" class="block py-2.5 px-0 w-full text-sm rounded-3xl text-gray-900 bg-transparent border-2 border-b-4 border-gray-900 dark:text-white dark:bg-gray-600 dark:border-gray-300 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer mt-2" placeholder=" " required />
          <span class="hidden" id="password-error"></span>

        </div>
        <div class="relative z-0 w-full mb-5 group">
          <label for="repeat_password" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Confirm password</label>
          <input type="password" name="repeat_password" id="repeat_password" class="block py-2.5 px-0 w-full text-sm rounded-3xl text-gray-900 bg-transparent border-2 border-b-4 border-gray-900 dark:text-white dark:bg-gray-600 dark:border-gray-300 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer mt-2" placeholder=" " required />
          <span class="hidden" id="con-error"></span>
        </div>

        <div class="relative z-0 w-full mb-5 group">
          <label for="phone" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number</label>
          <input type="tel" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm rounded-3xl text-gray-900 bg-transparent border-2 border-b-4 border-gray-900 dark:text-white dark:bg-gray-600 dark:border-gray-300 dark:focus:border-white focus:outline-none focus:ring-0 focus:border-white peer mt-2 " placeholder=" " required />
          <span class="hidden" id="phone-error"></span>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <label for="profile_picture" class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Upload your profile picture</label>
          <input type="file" name="profile_picture" id="profile_picture" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" placeholder=" " />
        </div>

        <div class="flex justify-evenly w-full items-left">
          <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-600 px-4">
            <input id="Client" type="radio" value="Client" name="UserType" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="Client" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I'm a Client</label>
          </div>
          <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-600 px-4">
            <input checked id="Freelancer" type="radio" value="Freelancer" name="UserType" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="Freelancer" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I'm a freelancer</label>
          </div>
        </div>


        <button type="submit" id="submit" name="signup" class="self-center w-1/2 text-white bg-primary-600 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-bold rounded-2xl text-sm  sm:w-auto px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 tracking-widest max-w-md mt-3">S T A R T</button>
      </form>


    </div>
  </section>
  <?php include '../../includes/footer.php'; ?>

</body>
<script src="../assets/js/theme.js"></script>
<script src="../assets/js/signup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</html>