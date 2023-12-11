<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Contact Us</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/logo.webp">


  <link rel="stylesheet" href="../assets/dist/output.css">

</head>

<body class="  bg-gray-100 dark: dark:bg-gray-900  ">
  <?php include '../../includes/header.php'; ?>
  <!--Contact section -->
  <section class="flex justify-center items-center  py-32 dark:bg-gray-900">
    <div class="py-8 lg:py-16 px-4 max-w-screen-sm  w-[70%] bg-white border rounded-3xl dark: dark:bg-gray-700 ">
      <h2 class="mb-16 text-5xl tracking-tight font-SemiBold text-center text-gray-900 dark:text-white font-semibold">Get in <span class="text-orange-500 text-semibold">touch</span> </h2>
      <p class="m-8 text-gray-700 dark:text-white font-normal">Send us a Message</p>
      <?php if (isset($_SESSION['UserID'])) : ?>
        <!-- form-->
        <form action="../../app/controllers/contact.php" method="POST" class="space-y-8 flex flex-col justify-evenly " id="form">
          <div>
            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light " placeholder="Contact name" value="<?= $_SESSION['UserName'] ?>">
            <span class=" text-red-600 hidden" id="name-error">Name not valid</span>
          </div>
          <div>
            <input type="tel" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Contact Phone" value="+ <?= $_SESSION['Phone'] ?>">
            <span class=" text-red-600 hidden" id="phone-error">Phone number not valid</span>
          </div>
          <div>
            <input type="Email" name="email" id="email" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="E-mail" value="<?= $_SESSION['Email'] ?>">
            <span class="text-red-600 hidden" id="email-error">Email not valid</span>
          </div>
          <div class="sm:col-span-2">
            <textarea id="Message" name="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Let talk about your idea"></textarea>
            <span class=" text-red-600 hidden" id="text-error">Message not valid</span>
          </div>
          <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-3xl bg-orange-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 self-center  ">S U B M I T </button>
        </form>
      <?php else : ?>
        <form action="../../app/controllers/contact.php" method="POST" class="space-y-8 flex flex-col justify-evenly " id="form">
          <div>
            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light " placeholder="Contact name">
            <span class=" text-red-600 hidden" id="name-error">Name not valid</span>
          </div>
          <div>
            <input type="tel" name="phone" id="phone" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Contact Phone">
            <span class=" text-red-600 hidden" id="phone-error">Phone number not valid</span>
          </div>
          <div>
            <input type="Email" name="email" id="email" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="E-mail">
            <span class="text-red-600 hidden" id="email-error">Email not valid</span>
          </div>
          <div class="sm:col-span-2">
            <textarea id="Message" name="message" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Let talk about your idea"></textarea>
            <span class=" text-red-600 hidden" id="text-error">Message not valid</span>
          </div>
          <button type="submit" class="py-3 px-5 text-sm font-medium text-center text-white rounded-3xl bg-orange-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 self-center  ">S U B M I T </button>
        </form>
      <?php endif ?>

    </div>
    </div>

  </section>
  <!---------------------------------------------->
  <!-- Footer section -->
  <?php include '../../includes/footer.php'; ?>
  <script src="../assets/js/theme.js"></script>
  <?php
  if ($mail->send()) {
    echo '<script>alert("Your message has been sent successfully")</script>';
  }
  ?>
  <!-- <script src="../assets/js/contact.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>
  <!-- <script src="jquery.js"></script> -->


</body>

</html>