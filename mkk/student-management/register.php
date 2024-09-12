<?php
session_start();

if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
  header('Location: index.php');
}

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Login</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.css">
</head>

<body class="bg-base-200">
  <div class="flex items-center justify-center min-h-screen">
    <div class="px-8 py-6 mt-4 text-left bg-base-100 rounded-lg shadow-lg">
      <h3 class="text-4xl font-bold text-center">Register</h3>
      <form method="POST" action="func/auth-fn.php">
      <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white">Full Name</span>
            <input type="text" name="f_name" placeholder="Masukkan nama lengkap" class="input input-bordered w-full max-w-xs" required/>
          </label>
        </div>
        <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white">Username</span>
            <input type="text" name="username" placeholder="Masukkan username" class="input input-bordered w-full max-w-xs" required/>
          </label>
        </div>
        <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white block">Email</span>
            <input type="email" name="email" placeholder="Masukkan email" class="input input-bordered w-full max-w-xs" required/>
          </label>
        </div>
        <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white">Password</span>
            <input type="password" name="password" placeholder="Masukkan password" class="input input-bordered w-full max-w-xs" required/>
          </label>
        </div>
        <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white">Confirm Password</span>
            <input type="password" name="c_password" placeholder="Masukkan ulang password" class="input input-bordered w-full max-w-xs" required/>
          </label>
        </div>
        <a href="login.php" class="block mt-2 link">already have an account?</a>
        <div class="mt-6">
          <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="type" value="register">
            Register
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- error modal -->
  <dialog id="error-modal" class="modal border-red-500">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Error</h3>
      <p class="py-4">THIS MESSAGE ERROR</p>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>

  <!-- success modal -->
  <dialog id="success-modal" class="modal">
    <div class="modal-box">
      <h3 class="text-lg font-bold">Success</h3>
      <p class="py-4">THIS MESSAGE Success</p>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>
</body>

<script src="assets/script.js"></script>
<script>
  <?php if (isset($_SESSION['error'])) : ?>
    errorModal("<?= $_SESSION['error'] ?>")
    <?php unset($_SESSION['error']) ?> // set error to null 
  <?php endif; ?>
  <?php if (isset($_SESSION['success'])) : ?>
    successModal("<?= $_SESSION['success'] ?>")
    <?php unset($_SESSION['success']) ?> // set error to null 
  <?php endif; ?>
</script>

</html>