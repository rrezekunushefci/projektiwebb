<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Mediterranenan</title>
    <link rel="stylesheet" href="Home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="home.js" defer></script>
    <link rel="icon" href="logo.png" type="image/png" />
</head>
<body>
    <div class="homepage">
        <video autoplay loop muted plays-inline class="back-video"> 
            <source src="videoprojekti.mp4" type="video/mp4">
        </video>
        <?php require('inc/header.php'); ?>
        <div class="permbajtja">
            <h1>EUROPE HIDDEN GEMS</h1>
            <a href="Tour.php">Explore</a>

        </div>
    </div>
    <br>
    <br>

    <div class="section2">
        <div class="slider-img">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            class="bi bi-caret-left"
            viewBox="0 0 16 16"
          >
            <path
              d="M10 12.796V3.204L4.519 8zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"
            />
          </svg>
          <div class="txt1">
            <h3>discover</h3>
          </div>
          <br>
  
          <div class="slider">
            <img src="Positano 1.jpeg" alt="img1" class="image" id="section2" />
            <img src="Positano 2.jpeg" alt="img2" class="image" />
            <img src="Mykonos 1.jpeg" alt="img3" class="image" />
            <img src="Rovinj 3.jpeg" alt="img4" class="image" />
            <img src="Tivat 2.jpeg" alt="img5" class="image" />
            <img src="Dhermi 2.jpeg" alt="img6" class="image" />
            <img src="Alacati 2.jpeg" alt="img7" class="image" />
            <img src="Rovinj 1.jpg" alt="img8" class="image" />
            <img src="Tivat 1.jpeg" alt="img9" class="image" />
          </div>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="currentColor"
            class="bi bi-caret-right"
            viewBox="0 0 16 16"
          >
            <path
              d="M6 12.796V3.204L11.481 8zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753z"
            />
          </svg>
        </div>
      </div>
      <br>
      <div class="txt2">
        <h3>mediterranenan</h3>
      </div>
      <br>
    

      <?php require('inc/footer.php'); ?>

</body>
</html>