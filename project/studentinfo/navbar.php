
<?php 
echo "
<nav class='navbar py-auto navbar-expand-md bg-dark sticky-top align-middle' data-bs-theme='dark'>
        <div class='container-fluid align-middle '>
            <a class='navbar-brand d-block' href='#home'>
                <img src='./assets/rguktlogo.png' class='bg-dark'style='height:40px;aspect-ratio:4/5;margin-right:5px;' alt='rguktlogo'>RGUKT <b>I/O </b>STATS </a>";
if(isset($_SESSION['user']) and ($_SESSION['user']=='DIRECTOR')){
        echo ("
          <div class='navbar-toggler hamburger' aria-controls='years' data-bs-toggle='offcanvas' aria-expanded='false' aria-label='Toggle navigation' data-bs-target='#years' type='button' id='hamburger-1'>
                <span class='line'></span>
                <span class='line'></span>
                <span class='line'></span>
            </div>
        </div>
        </button>
        <div class='offcanvas-md offcanvas-start bg-dark border-none' data-bs-backdrop='true' id='years'>
            <ul class='container navbar-nav  mx-2 mb-2 mb-lg-0 gap-lg-4'>
                <li class='nav-item'>
                    <a class='nav-link' id='sinfo' type='button' class='btn ' data-bs-toggle='modal' data-bs-target='#student_info'>STUDENT_INFO</a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link' type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#out_student_list' id='btn'>OUT_LIST</a>
                </li>
        <li class='nav-item'>
                    <a class='btn nav-link text-light ' id='logout'  type='button' class='btn '>LOGOUT</a>
                </li>
          ");
    }


    else if(isset($_SESSION['user']) and ($_SESSION['user']=='CAMPUS_2' OR $_SESSION['user']=='CAMPUS_3'))
        {
        echo ("
                <div>
            <ul class='container navbar-nav  mx-2 mb-2 mb-lg-0 gap-lg-4'>
        <li class='nav-item'>
                    <a class='btn nav-link text-light ' id='logout'  type='button' class='btn '>LOGOUT</a>
                </li>
          ");
    }
    
           echo "
            </ul>
    </div>
        </div>
    </nav>
<div id='loading'  class='p-0 h-100 w-100'style='display:none;position:absolute;height:100vh;width:100vw;overflow:hidden;align-items:center;z-index:999;background-color:rgba(100,100,100,0.5)' >
    <div class='d-flex justify-content-center h-auto w-auto position-absolute top-50 start-50'  >
         <div class='spinner-border text-light ' role='status'>
          <span class='visually-hidden'>Loading...</span>
        </div>
    </div>
</div>
<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js'></script>
<script src='//code.jquery.com/ui/1.12.1/jquery-ui.js'></script>
</div>

<script>
$('#loading').fadeIn();
     $('#logout').on('click', function(e){
        e.preventDefault(); //cancel default action

        //Recuperate href value
        var href = $(this).attr('href');
        var message = $(this).data('confirm');
        //pop up
        swal({
            title: 'Sure To LogOut ??',
            text: message, 
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            swal('Successfully Logged Out!', {
              icon: 'success',
            });
            window.location.href ='./logout.php';
          } 
        });
    });

</script>";
?>