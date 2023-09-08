<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
  <title>MOVIES Website <?=$movie->Name?></title>
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
        echo '<li><a href="/admin/logout" class="text-white hover:text-red-700">Logout</a></li>'; ?>
      </div>
    </div>
  </header>

 <!-- Navbar -->
  <nav class="bg-gray-800 py-4">
    <div class="container mx-auto px-4">
      <!-- Add your navbar links here -->
      <ul class="flex space-x-4 mt-4">
        <li><a href="/movie" class="text-white hover:text-gray-300">All Movies</a></li>
        <?php 
        if (isset($_SESSION['login']) && $_SESSION['login']=="t")
        echo ' <li><a href="/movie/new" class="text-white hover:text-gray-300">New Movie</a></li> ';
        echo ' <li><a href="/movie/delete/'.$movie->MovieID.'" class="text-white hover:text-gray-300">Delete This Movie</a></li> ';
        ?>
        <li><a href="#" class="text-white hover:text-gray-300">About</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Contact</a></li>
      </ul>
    </div>
  </nav>

 <!-- Main Content -->
  <div class="container mx-auto mt-8">
    <div class="max-w-3xl mx-auto bg-white rounded-lg shadow-lg p-8">
      <div class="aspect-w-16 aspect-h-9 mb-4">
        <video controls>
          <source src="/videos/<?=$movie->Movie_Path?>" type="video/mp4">
          Your browser does not support the video tag.
        </video>
      </div>
      <h2 class="text-2xl font-semibold mb-2"><?=$movie->Name?></h2>
      <p class="text-gray-600"><?= $movie->Full_desc?></p>
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