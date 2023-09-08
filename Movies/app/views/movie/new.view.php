<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Additional CSS styles for image and video previews */
    .preview {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 100%;
      height: 300px;
      margin-bottom: 1rem;
    }

    .preview img,
    .preview video {
      max-width: 100%;
      max-height: 100%;
    }

    
  </style>
  <title>Add NEW MOVIE</title>
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
    <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6">
       <?= $_SERVER['REQUEST_METHOD'] === 'POST' && empty($errors) ? 
        '
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline"> New Movie Added Successfully </span>
          </div>
        '
        :
         ''?>
        <h2 class="text-2xl font-semibold mb-4">Add Video</h2>
      <form method="POST" action="" enctype="multipart/form-data" >
        <div class="mb-4">
          <label for="movie_name" class="block mb-2">Movie Name</label>
          <input type="text" id="movie_name" name="name" class="border border-gray-300 px-4 py-2 rounded-lg w-full" value = "<?=isset($_POST['name']) ? $_POST['name'] : ''  ?>" required >
          <?=isset($errors['name_err']) ? 
        '
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline">'. $errors['name_err'] .'</span>
          </div>
        '
        :
         ''?>
        </div>
        <div class="mb-4">
          <label for="description" class="block mb-2">Simple Description</label>
          <textarea id="description" name="simple_desc" class="border border-gray-300 px-4 py-2 rounded-lg w-full" required><?=isset($_POST['simple_desc']) ? $_POST['simple_desc'] : ''  ?></textarea>
          <?=isset($errors['simple_desc_err']) ? 
        '
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline">'. $errors['simple_desc_err'] .'</span>
          </div>
        '
        :
         ''?>
        </div>
        <div class="mb-4">
          <label for="discrimination" class="block mb-2">Full Description</label>
          <textarea id="discrimination" name="full_desc" class="border border-gray-300 px-4 py-2 rounded-lg w-full" required><?=isset($_POST['full_desc']) ? $_POST['full_desc'] : ''  ?></textarea>
          <?=isset($errors['full_desc_err']) ? 
        '
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline">'. $errors['full_desc_err'] .'</span>
          </div>
        '
        :
         ''?>
        </div>
        <div class="mb-4">
          <label for="video_file" class="block mb-2">Movie Video (MP4)</label>
          <input type="file" id="video_file" name="video" accept=".mp4" class="border border-gray-300 px-4 py-2 rounded-lg w-full" onchange="previewVideo(event)" required>
          <?=isset($errors['video_err']) ? 
        '
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline">'. $errors['video_err'] .'</span>
          </div>
        '
        :
         ''?>
          <div class="preview" id="video_preview"></div>
          <div class="flex items-center mt-2" id="video_upload_status" style="display: none;">
            <div class="progress-bar">
              <div class="progress-bar-fill" id="video_progress"></div>
            </div>
            <span class="ml-2" id="video_upload_message"></span>
          </div>
          <button type="button" class="bg-red-500 hover:bg-red-600 px-4 py-2 text-white rounded-lg mt-2" onclick="clearVideoSelection()">Cancel/Change Video</button>
        </div>
        <div class="mb-4">
          <label for="image_file" class="block mb-2">Cover Photo (PNG, JPG, JPEG)</label>
          <input type="file" id="image_file" name="cover" accept=".png, .jpg, .jpeg" class="border border-gray-300 px-4 py-2 rounded-lg w-full" onchange="previewImage(event)" required>
          <?=isset($errors['cover_err']) ? 
        '
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
          <span class="block sm:inline">'. $errors['cover_err'] .'</span>
          </div>
        '
        :
         ''?>
          <div class="preview" id="image_preview"></div>
          <div class="flex items-center mt-2" id="image_upload_status" style="display: none;">
            <div class="progress-bar">
              <div class="progress-bar-fill" id="image_progress"></div>
            </div>
            <span class="ml-2" id="image_upload_message"></span>
          </div>
          <button type="button" class="bg-red-500 hover:bg-red-600 px-4 py-2 text-white rounded-lg mt-2" onclick="clearImageSelection()">Cancel/Change Photo</button>
        </div>
        <input type="submit" value="ADD NEW MOVIE" name="submit" class="bg-green-500 hover:bg-green-600 px-4 py-2 text-white rounded-lg">
      </form>
    </div>
  </div>

  <!-- Footer -->
  <footer class="bg-gray-200 py-4 mt-8">
    <div class="container mx-auto px-4">
      <!-- Add your footer content here -->
      <p class="text-center text-gray-600">© 2023 cctt project . All rights reserved.</p>
    </div>
  </footer>

  <script>
    // Function to preview the selected video
    function previewVideo(event) {
      const videoPreview = document.getElementById('video_preview');
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function (e) {
        const video = document.createElement('video');
        video.src = e.target.result;
        video.controls = true;
        video.autoplay = true;
        videoPreview.innerHTML = '';
        videoPreview.appendChild(video);
      };

      reader.readAsDataURL(file);
    }

    // Function to preview the selected image
    function previewImage(event) {
      const imagePreview = document.getElementById('image_preview');
      const file = event.target.files[0];
      const reader = new FileReader();

      reader.onload = function (e) {
        const image = document.createElement('img');
        image.src = e.target.result;
        imagePreview.innerHTML = '';
        imagePreview.appendChild(image);
      };

      reader.readAsDataURL(file);
    }

    // Function to clear the selected video
    function clearVideoSelection() {
      const videoInput = document.getElementById('video_file');
      const videoPreview = document.getElementById('video_preview');
      videoInput.value = null;
      videoPreview.innerHTML = '';
    }

    // Function to clear the selected image
    function clearImageSelection() {
      const imageInput = document.getElementById('image_file');
      const imagePreview = document.getElementById('image_preview');
      imageInput.value = null;
      imagePreview.innerHTML = '';
    }


  </script>
</body>

</html>