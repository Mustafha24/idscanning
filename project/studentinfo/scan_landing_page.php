<?php 
session_start();
if (isset($_SESSION['user']) and ($_SESSION['user']=='CAMPUS_2' or $_SESSION['user']=='CAMPUS_3')){
    if(time()-$_SESSION["login_time_stamp"] >1800) 
    {
        session_unset();
        session_destroy();
        echo "<script>window.location.href='./login.php'</script>";
    }
}
    else{
      header("Location:./login.php");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scanning Page</title>
    <link rel="icon" href="./assets/rguktlogo.png" type="image/png"/>

    
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body class='bg-secondary-subtle' >
<?php include "navbar.php"; 

?>
    <div class='container text-center mt-sm-1 mt-lg-4'>
            <div class='justify-content-around row pt-sm-1 pt-lg-4'>
                <div class="card col-4 m-2 shadow bg-dark text-light"data-bs-theme='dark' style="width: 18rem;">
                  <div class="card-img-top  shadow bg-light  rounded-bottom-4" style='height:10rem;background-image:url("./assets/scan_gun.png");
                  background-size:50%;background-repeat:no-repeat;background-position:40% -10%'></div>
                  <div class="card-body">
                    <h5 class="card-title">USING SCANNER</h5>
                    <p class="card-text">Scan the ID card using the handheld barcode scanner</p>
                    <a  type='button'class="btn text-light bg-danger mx-auto bg-gradient py-2 w-100 " id='scan_gun' target='_blank'href="./QRPAGE/handheld_scan.php">USE SCANNER</a>
                    </div>
              </div>
                <div class="card col-4 m-2 shadow" style="width: 18rem;">
                  <div class="card-img-top shadow  rounded-bottom-4 bg-secondary-subtle" style='height:10rem;background-image:url("./assets/mobile_scan.png");background-size:60%;background-repeat:no-repeat;background-position:50% -5%'></div>
                  <div class="card-body">
                    <h5 class="card-title ">USING MOBILE</h5>
                    <p class="card-text">Scan the ID card using the mobile camerar</p>
                    <a  type='button'class=" w-100  text-center text-dark py-2 btn bg-warning bg-gradient mx-auto" target='_blank'id='scan_gun' href="./QRPAGE/mobile_scan.php">USE MOBILE</a>
                    </div>
            </div>
      </div>
      
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>  
    <script>
        $(document).ready(()=>{
            $("#loading").fadeOut();
        })
    </script>
    
</body>

</html>

