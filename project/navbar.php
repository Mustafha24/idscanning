    <nav class='navbar py-auto navbar-expand-md bg-dark sticky-top align-middle' data-bs-theme='dark'>
        <div class='container-fluid align-middle '>
            <a class='navbar-brand d-block' href='#home'>
                <img src="./assets/rguktlogo.png" class='bg-dark'style='height:40px;aspect-ratio:4/5;margin-right:5px;mix-blend-mode: lighten;' alt='rguktlogo'>RGUKT <b>I/O </b>STATS </a>
                <!--<li class='nav-item'>-->
                <!--    <a class='nav-link  '' id='e1' aria-current='page' href='#E1S2_details'>E1S2</a>-->
                <!--</li>-->

                <!--<li class='nav-item'>-->
                <!--    <a class='nav-link' id='e2' href='#E2S2_details'>E2S2</a>-->
                <!--</li>-->
                <!--<li class='nav-item'>-->
                <!--    <a class='nav-link' id='e3' href='#E3S2_details'>E3S3</a>-->
                <!--</li>-->
<?php

    if(isset($_SESSION['user']) and $_SESSION['user']=='director_rguktong'){
        echo (
           " <div class='navbar-toggler hamburger' aria-controls='years' data-bs-toggle='offcanvas' aria-expanded='false' aria-label='Toggle navigation' data-bs-target='#years' type='button' id='hamburger-1'>
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
            </ul>
        </div>
        </div>
    }
   ");
}
else{
}

?>
    </nav>

