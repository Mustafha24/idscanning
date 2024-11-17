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
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Barcode scanner</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
       
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/html5-qrcode/2.3.4/html5-qrcode.min.js"
      integrity="sha512-k/KAe4Yff9EUdYI5/IAHlwUswqeipP+Cp5qnrsUjTPCgl51La2/JhyyjNciztD7mWNKLSXci48m7cctATKfLlQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
      <script src="https://kit.fontawesome.com/2d67abf6d8.js" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
       <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <style>

 
     #scan {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction:column;
        overflow:hidden;
        position:relative;
        padding:2px;
        
      }
      #reader {
        width: 500px;
      }
      #reader__scan_region{
          display:flex;
          align-items:center;
          justify-content:center;
      }
      #reader__scan_region video{
          position:relative;
      } 

      #html5-qrcode-button-camera-stop{
          display:block;
          border:none;
       background-color: red;
       padding:5px 10px;
       color:white;
       font-weight:900;
       border-radius:3px;
       margin:5px 0px 0px 0px;
      }
      #html5-qrcode-button-camera-start{
           display:block;
          border:none;
       background-color:green;
       padding:5px 10px;
       color:white;
       font-weight:900;
       border-radius:3px;
       margin:5px 0px 0px 0px;
      }
   
      </style>
  </head>
  <body> 
  <?php include "../navbar.php"?>
 
    <div id="scan" class="row m-2 ">
        <div id="reader" class='row  shadow-lg  border-none rounded-2 bg-outline-none'></div>
</div>

<?php include 'student_details_modal.html'; ?>
      <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

      <script>
          $(document).ready(()=>{
              $("#loading").fadeOut();
              success_action=(result)=>{
                  
              
                //  require('student_record_display_js.php');
                 const pattern =/^([sS]{1}([19]{2}))|([oO]{1}([1]{1}[789]{1}|([20]{2}))|([0]{1}[0-9]{3}|1[0-1][0-9]{2}))$/gm
                if(pattern.test(result)){
                 $.ajax({
                        url: 'confirmation.php',
                        type: "POST",
                        data: {
                            id: result
                        },
                        datatype:'JSON',
                        beforeSend:function(){
                            $("#loading").fadeIn();
                        },
                        complete:function(){
                            $('#loading').fadeOut();
                        },
                        success: function(data) {
                            data=JSON.parse(data);
                            if(data.status){
                                $("#ID_NUMBER").html(data['0'].ID_NUMBER)
                                $("#SNAME").html(data['0'].SNAME)
                                $("#YEAR").html(data['0'].YEAR)
                                $("#BRANCH").html(data['0'].BRANCH)
                                $("#SECTION").html(data['0'].SECTION)
                                $("#GENDER").html(data['0'].GENDER)
                                $("#last_in").html(data['0'].IN_TIME)
                                $("#last_out").html(data['0'].OUT_TIME)
                                if($('#last_in').text()!='yet-to-return'){
                                    $('#admit_in').prop('disabled',true);
                                    $('#approve_out').prop('disabled',false);
                                    $('#tb1').append(`<tr id='reason_row'><td>REASON</td><td class='bg-warning-subtle'><input type='text' class='w-100 form-control' id='reason'/></td></tr>`)
                                                    }
                                else{
                                     $('#admit_in').prop('disabled',false);
                                    $('#approve_out').prop('disabled',true);
                                }
                                $('#invoke_modal').click();
                                $('#html5-qrcode-button-camera-stop').click()
                                }
                            else{
                             swal({
                                icon:'error',
                                title:'ERROR',
                                text:'NO DATAT FOUND',
                                timer:2000});
                            }
                    }
                })
                
                 }
                 else{
                     swal({
                                icon:'error',
                                title:'ERROR',
                                text:'SCAN ID CARD ONLY !',
                                timer:2000});
                 }
                 
                 $('#std_modal_close').click(function(){
                    $("#reason_row").remove();
                    $("#reason").val('');
                    $('#html5-qrcode-button-camera-start').click()
                 })
// -----------------------------------------------------------------------------------------------------------------

              $('#admit_in').click(function(){
                $.ajax({
                    url:'in.php',
                    type:'post',
                    data:{id:result},
                    dataType:'json',
                    beforeSend:function(){
                        $("#loading").fadeIn();
                    },
                    complete:function(){
                        $("#loading").fadeOut();
                    },
                    success:function(data){
                            swal({
                                icon:data.icon,
                                title:data.title,
                                text:data.text,
                                timer:1800,
                            })
                        $("#ID_NUMBER").html('')
                        $("#SNAME").html('')
                        $("#YEAR").html('')
                        $("#BRANCH").html('')
                        $("#SECTION").html('')
                        $("#GENDER").html('')
                        $("#last_in").html('')
                        $("#last_out").html('')
                        $('#std_modal_close').click();
                    }
                })
              })
               $('#approve_out').click(function(){
                $.ajax({
                    url:'out.php',
                    type:'post',
                    data:{id:result,reason:$('#reason').val()},
                    dataType:'json',
                    beforeSend:function(){
                        $("#loading").fadeIn();
                    },
                    complete:function(){
                        $("#loading").fadeOut();
                    },
                    success:function(data){
                        swal({
                                icon:data.icon,
                                title:data.title,
                                text:data.text,
                                timer:1800,
                            })
                              $("#ID_NUMBER").html('')
                        $("#SNAME").html('')
                        $("#YEAR").html('')
                        $("#BRANCH").html('')
                        $("#SECTION").html('')
                        $("#GENDER").html('')
                        $("#last_in").html('')
                        $("#last_out").html('')
                        $("#reason_row").remove();
                        $("#reason").val('');
                        $('#std_modal_close').click();
                        
                    }
                })
              })

// -----------------------------------------------------------------------------------------------
              }
// -------------------------------------------------------------------------------------------------------------------
        function onScanSuccess(result, decodedResult) {
            success_action(result);
           
        }
        

        function onScanFailure(error) {

            // console.warn(`Code scan error = ${error}`);
        }
        let scanner = new Html5QrcodeScanner(
            "reader",
            { fps: 1, qrbox: {width: 300, height: 200} }, false);
            
            
            
        $('#html5-qrcode-button-camera-start').addClass('btn-success rounded-4 shadow-lg')
        $('#html5-qrcode-button-camera-stop').addClass('btn-danger rounded-4 shadow-lg')
        console.log( $('#html5-qrcode-button-camera-start').attr('class'))
        scanner.render(onScanSuccess, onScanFailure);
        $('#reader_scan_region video').removeAttr('style');
        var icon=$('#reader div')
        icon[0].style.display='none';
        var file_div= $('#reader__dashboard_section div');
        file_div[5].style.display='none';
        $('#loading').fadeOut();
        
        
})
      </script>
      <script>
          
          
      </script>
  </body>
</html>
