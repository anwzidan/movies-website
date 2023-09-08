<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>404 Not Found</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    @keyframes upDownAnimation {
      0% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-10px);
      }
      100% {
        transform: translateY(0);
      }
    }
    .animation {
      animation: upDownAnimation 1s infinite;
    }
  </style>
  <script>
    window.onload = function() {
      var countdownElement = document.getElementById('countdown');
      var count = 7;
      var redirect = function() {
        window.location.href = window.location.origin + "/movie";
      }
      var countdownTimer = setInterval(function() {
        countdownElement.textContent = "You will be redirected in " + count + " seconds";
        count--;
        if (count < 0) {
          clearInterval(countdownTimer);
          redirect();
        }
      }, 1000);
    };
  </script>
</head>
<body class="flex flex-col min-h-screen">
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
      <ul class="flex space-x-4 mt-4">
        <li><a href="#" class="text-white hover:text-gray-300">Home</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">About</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Services</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Contact</a></li>
      </ul>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="flex-grow flex items-center justify-center">
    <div class="bg-white rounded-lg shadow-lg p-8 sm:p-12">
      <div class="container">
        <h1 class="error-code text-4xl md:text-6xl lg:text-8xl text-center text-red-500">404</h1>
        <p class="error-message text-lg md:text-xl lg:text-2xl text-center text-gray-600">Oops! The page you're looking for doesn't exist.</p>
        <img class="animation mt-8 mx-auto" src="/img/404.png" alt="Film Reel Animation" width="150" height="150">
        <p id="countdown" class="countdown text-gray-600 font-bold mt-4 text-center"></p>
      </div>
      <h1 class="text-2xl font-semibold mb-4 text-center">!Sorry about that!</h1>
      <p class="text-center"><a href="/movie" style="color:#36AE7C;">click here</a> if auto redirect doesn't work</p>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-200 py-4 mt-8">
    <div class="container mx-auto px-4">
      <!-- Add your footer content here -->
      <p class="text-center text-gray-600">© 2023 cctt project . All rights reserved.</p>
    </div>
  </footer>
</body>
</html>