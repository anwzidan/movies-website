<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <title>MOVIES Website - HOME</title>
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
        ?>
        <li><a href="#" class="text-white hover:text-gray-300">About</a></li>
        <li><a href="#" class="text-white hover:text-gray-300">Contact</a></li>
      </ul>
    </div>
  </nav>



  <!-- Main Content -->
  <div class="container mx-auto mt-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      <!-- movie Cards -->
     
      <?php 
      if($movies == false){

        echo 'no movies';
      }
      else{
      foreach ($movies as $movie ) :?>
      
        <div class="bg-white rounded-lg shadow-lg p-8">
        <img  src="/covers/<?= $movie->Cover_Path?>" alt="Card 1" class="mb-4 mx-auto">
        <h2  class="text-xl font-semibold mb-2"><a href="<?= '/movie/watch/'.$movie->MovieID?>"><?= $movie->Name?></a></h2>
        <p class="text-gray-600"><?= $movie->Simple_desc?></p>
      </div>
        
      <?php endforeach;
    }
      ?>
    

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