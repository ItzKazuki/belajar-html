<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Password</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="./assets/font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
<body class="bg-base-200">
  <div class="flex items-center justify-center min-h-screen">
    <div class="px-8 py-6 mt-4 text-left bg-base-100 rounded-lg shadow-lg">
      <h3 class="text-4xl font-bold text-center">Edit Password</h3>
      <form method="POST" action="func/auth-fn.php">
        <input type="hidden" name="email" value="<?= $_GET['email']?>">
        <!-- <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white">Your Old Password</span>
            <input type="password" name="old_password" class="input input-bordered w-full max-w-xs" required />
          </label>
        </div> -->
        <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white">New Password</span>
            <input type="password" name="new_password" class="input input-bordered w-full max-w-xs" required />
          </label>
        </div>
        <div class="mt-4">
          <label class="block">
            <span class="text-gray-700 dark:text-white">Confirm New Password</span>
            <input type="password" name="confirm_new_password" class="input input-bordered w-full max-w-xs" required />
          </label>
        </div>
        <a href="register.php" class="block mt-2 link">don't have an account?</a>
        <a href="forgot_password.php" class="block mt-2 link">forgot password?</a>
        <div class="mt-6">
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="type" value="edit_password">
            Login
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
</body>
</html>