<?php
session_start();
if (isset($_SESSION['user']) and ($_SESSION['user']=='CAMPUS_2' or $_SESSION['user']=='CAMPUS_3')) {
    if (time() - $_SESSION["login_time_stamp"] > 1800) {
        session_unset();
        session_destroy();
        header("Location:../login.php");
    }
} else {
    header("Location:../login.php");
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Barcode Scanner</title>
    <link rel="icon" href="./assets/rguktlogo.png" type="image/png"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/jquery-ui.min.js" integrity="sha512-57oZ/vW8ANMjR/KQ6Be9v/+/h6bq9/l3f0Oc7vn6qMqyhvPd1cvKBRWWpzu0QoneImqr2SkmO4MSqU+RpHom3Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

</head>

<body class='text-center justify-content-center bg-secondary-subtle' onload='document.getElementById("id_input").focus()'>
    <?php include "../navbar.php" ?>
    <!-- <div class=" container card w-75 shadow mt-5 bg-warning-subtle px-0" style='min-width:18rem'>
        <div class='card-top-image bg-danger-subtle' style='height:7rem;background-image:url("barcode_scan.png");background-repeat:no-repeat;background-position:center;background-blend-mode:darken'>
        </div>
        <div class="card-body">
            <div class="mb-3">
                <label for="id_input" class="form-label">
                    <h1>SCAN THE ID CARD</h1>
                </label>
                <input type="text" name='id_input' id='id_input' class="form-control bg-outline-primary" aria-describedby="id_input">
            </div>
        </div>
    </div> -->

    <div class="container d-flex justify-content-center">
    <div class="card w-75 shadow-lg mt-5 bg-warning-subtle" style="min-width:18rem; border-radius: 15px;">
        <!-- Card Body -->
        <div class="card-body text-center p-4">
            <h1 class="text-dark fw-bold mb-4" style="font-size: 1.8rem;">SCAN THE ID CARD</h1>
            <div class="mb-3">
                <input type="text" name="id_input" id="id_input" 
                       class="form-control border-primary border-2" 
                       placeholder="Enter ID" aria-describedby="id_input"
                       style="padding: 0.8rem; font-size: 1.1rem;">
            </div>
            <button type="button" class="btn btn-primary mt-3 px-4 py-2 fw-semibold" style="font-size: 1rem;">
                Submit
            </button>
        </div>
    </div>
</div>

    <?php require('student_details_modal.html'); ?>


    <script>
        $(document).ready(() => {
            $('#loading').fadeOut();
            $('#id_input').on("keydown keyup", function() {
                var result = $('#id_input').val();
                if (result.length === 7) {
                    $('#id_input').prop('disabled', true);
                    const pattern = /^([sS]{1}([19]{2}))|([oO]{1}([1]{1}[789]{1}|([20]{2}))|([0]{1}[0-9]{3}|1[0-1][0-9]{2}))$/gm
                    if (pattern.test(result)) {
                        $.ajax({
                            url: 'confirmation.php',
                            type: "POST",
                            data: {
                                id: result,reason:$('#reason').text()
                            },
                            beforeSend: function() {
                                $("#loading").fadeIn();
                            },
                            complete: function() {
                                $("#loading").fadeOut();
                            },
                            datatype: 'JSON',
                            success: function(data) {
                                data = JSON.parse(data);

                                if (data.status) {
                                    $("#ID_NUMBER").html(data['0'].ID_NUMBER)
                                    $("#SNAME").html(data['0'].SNAME)
                                    $("#YEAR").html(data['0'].YEAR)
                                    $("#BRANCH").html(data['0'].BRANCH)
                                    $("#SECTION").html(data['0'].SECTION)
                                    $("#GENDER").html(data['0'].GENDER)
                                    $("#last_in").html(data['0'].IN_TIME)
                                    $("#last_out").html(data['0'].OUT_TIME)
                                    $('#invoke_modal').click();
                                    if($('#last_in').text()!='yet-to-return'){
                                        $("#admit_in").prop('disabled',true);
                                        $("#approve_out").prop('disabled',false);
                                        $('#tb1').append(`<tr id='reason_row'><td>REASON</td><td class='bg-warning-subtle'><input type='text' class='w-100 rounded-0 form-control ' id='reason'/></td></tr>`)
                                    }else{
                                         $("#admit_in").prop('disabled',false);
                                        $("#approve_out").prop('disabled',true);
                                    }
                                } else {
                                    swal({
                                        icon: 'error',
                                        title: 'ERROR',
                                        text: 'NO DATA FOUND!',
                                        timer: 1800
                                    });
                                    $('#id_input').val('');
                                    $('#id_input').prop('disabled', false);
                                    $('#id_input').focus();

                                }
                            }
                        })

                    } else {
                        swal({
                            icon: 'error',
                            title: 'ERROR',
                            text: 'SCAN ID CARD ONLY !',
                            timer: 1800
                        });
                        $('#id_input').val('');
                        $('#id_input').prop('disabled', false);
                        $('#id_input').focus();

                    }

                }
            });

            $('#admit_in').click(function() {
                $.ajax({
                    url: 'in.php',
                    type: 'post',
                    data: {
                        id: $('#id_input').val()
                    },
                    beforeSend: function() {
                        $('#loading').fadeIn();
                    },
                    complete: function() {
                        $('#loading').fadeOut()
                    },
                    dataType: 'json',
                    success: function(data) {
                        
                        swal({
                            icon: data.icon,
                            title: data.title,
                            text: data.text,
                            timer: 1800,
                        });
                        $("#ID_NUMBER").html('')
                        $("#SNAME").html('')
                        $("#YEAR").html('')
                        $("#BRANCH").html('')
                        $("#SECTION").html('')
                        $("#GENDER").html('')
                        $("#last_in").html('')
                        $("#last_out").html('')
                        $('#id_input').val('')
                        $('#reason').val('');
                        $('#reason_row').remove();
                        $('#std_modal_close').click();
                        $('#id_input').prop('disabled', false)
                        $('#id_input').focus();

                    }
                })
            })



            $('#approve_out').click(function(){
                $.ajax({
                    url:'out.php',
                    type:'post',
                    data:{id:$("#id_input").val(),reason:$('#reason').val()},
                    dataType:'json',
                    success:function(data){
                        console.log(data);
                        // data=JSON.stringify(data);
                        // data=JSON.parse(data);
                        // console.log(data);
                        swal({
                                icon:data.icon,
                                title:data.title,
                                text:data.text,
                                timer:1800,
                            });
                             $("#ID_NUMBER").html('')
                                $("#SNAME").html('')
                                $("#YEAR").html('')
                                $("#BRANCH").html('')
                                $("#SECTION").html('')
                                $("#GENDER").html('')
                                $("#last_in").html('')
                                $("#last_out").html('')
                                $('#id_input').val('')
                                $('#reason').val('');
                                $("#reason_row").remove();
                                $('#id_input').prop('disabled', false)
                                $('#std_modal_close').click();
                                $('#id_input').focus();           
                        }
                })
              })
            $('#std_modal_close').click(() => {
                $('#id_input').val('')
                $("#reason_row").remove();
                $('#id_input').prop('disabled', false)
                $('#id_input').focus();
            })

        });
    </script>
</body>

</html>