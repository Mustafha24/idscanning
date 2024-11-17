<?php

session_start();

if(isset($_SESSION['user']) and ($_SESSION['user']=='director_rguktong')){
    if(time()-$_SESSION["login_time_stamp"] >1800) 
    {
        session_unset();
        session_destroy();
        header("Location:./login.php");
    }
    else{
        
     include 'navbar.php';
    include "main_content.php";
    require "main_content_js.php";
    }
}
else if (isset($_SESSION['user']) and ($_SESSION['user']=='security')){
    //including the qr pages
    require "scan_landing_page.php";
}
else {
    include "login.php";
    // include "logout.php";
}?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modified status page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <link href='style.css' rel='stylesheet' type='text/css'>
    <style>
    <?php 
    include "loginstyle.css";
    ?></style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</head>

<body class='bg-secondary-subtle'>

<script> 
$('document').ready(function(){
$('.nav-link :not(:nth-child(6))').on('click', function(e){
        e.preventDefault(); //cancel default action

        var hrefs = $(this).attr('href');
        document.querySelector(`${hrefs}`).scrollIntoView({
      behavior: 'smooth'
    });
        
});
});
$('#logout').on('click', function(e){
        e.preventDefault(); //cancel default action

        //Recuperate href value
        var href = $(this).attr('href');
        var message = $(this).data('confirm');
        //pop up
        swal({
            title: "Sure To LogOut ??",
            text: message, 
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal("Successfully Logged Out!", {
              icon: "success",
            });
            window.location.href ='./logout.php';
          } 
        });
    });
</script>

</body>
</html>