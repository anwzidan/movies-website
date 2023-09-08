<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Admin - Login</title>
</head>

<body>
  <!-- Header -->
  <header class="bg-gray-800 py-4">
    <div class="container mx-auto px-4 flex items-center justify-between">
      <div>
        <!-- <img src="path_to_logo" alt="Company Logo" class="h-8"> -->
        <span class="text-white font-semibold text-lg ml-2">Movies Website</span>
      </div>
      
       <div>
        
        <?php if (isset($_SESSION['login']) && $_SESSION['login']=="t")
        echo ' <li><a href="/admin/logout" class="text-white hover:text-gray-300">Logout</a></li> '; ?>
        
      </div>
    </div>
  </header>

  <!-- Navbar -->
  <nav class="bg-gray-800 py-4">
    <div class="container mx-auto px-4">
      <!-- Add your navbar links here -->
      <ul class="flex space-x-4 mt-4">
        <li><a href="/movie" class="text-white hover:text-gray-300">All Movies</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">About</a></li>
        <?php if (isset($_SESSION['login']) && $_SESSION['login']=="t")
        echo ' <li><a href="/movie/new" class="text-white hover:text-gray-300">New Movie</a></li> ';
        
        ?>
       

        <li><a href="#" class="text-white hover:text-gray-300">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mx-auto mt-8">
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
      <h2 class="text-2xl font-semibold mb-4">Login</h2>
      <?php
        // PHP login logic and alert message handling
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         

          // Perform the necessary validation and authentication of the user's credentials
          if ($isLoginSucsses) {
            // Redirect the user to the dashboard or another page upon successful login
            header("Location: /../movie");
            exit();
          } else {
            // Set the login failed flag to true
            $isLoginFailed = true;
          }
        }
      ?>

      <?php if (isset($isLoginFailed) && $isLoginFailed): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <strong class="font-bold">Failed:</strong>
          <span class="block sm:inline"> Invalid username or password.</span>
        </div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="mb-4">
          <label for="username" class="block mb-2">username</label>
          <input type="username" id="username" name="username" class="border border-gray-300 px-4 py-2 rounded-lg w-full" required>
        </div>
        <div class="mb-4">
        <label for="username" class="block mb-2">password</label>
          <input type="password" name="password" id="password" class="border border-gray-300 px-4 py-2 rounded-lg w-full" required>
        </div>
        <button type="submit" name="login" class="bg-blue-500 hover:bg-blue-600 px-4 py-2 text-white rounded-lg">Login</button>
      </form>
    </div>
  </div>

  <!-- Add your footer content here -->
  <footer class="bg-gray-200 py-4 mt-8">
    <div class="container mx-auto px-4">
      <!-- Add your footer content here -->
      <p class="text-center text-gray-600">© 2023 cctt project . All rights reserved.</p>
    </div>
  </footer>
</body>

</html>