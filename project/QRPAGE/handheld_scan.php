<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>handheld scan</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
      integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <link src='scanner_animation.css' rel='stylesheet'>

  </head>
  <body class='text-center justify-content-center bg-secondary-subtle' onload='document.getElementById("id_input").focus()'> 
<?php include "../navbar.php"?>
  <div class=" container card w-75 shadow mt-5 bg-warning-subtle px-0" style='min-width:18rem' >
      <div class='card-top-image bg-danger-subtle'style='height:7rem;background-image:url("barcode_scan.png");background-repeat:no-repeat;background-position:center;background-blend-mode:darken'>
      </div>
      <div class="card-body">
      <div class="mb-3">
        <label for="id_input"  class="form-label"><h1>SCAN THE ID CARD</h1></label>
        <input type="text" name='id_input' id='id_input' class="form-control bg-outline-primary" aria-describedby="id_input">
        </div>
      </div>
    </div>

  </body>
</html>
