<!DOCTYPE html>
<html lang="en">
  <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
   <link rel="icon" href="./assets/rguktlogo.png" type="image/png"/>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
      <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      </head>

<body class='bg-secondary-subtle'>
   <?php include 'navbar.php' ?>
    </nav>
    <div class="card  bg-dark-subtle shadow-lg  rounded-3 mx-auto my-3 " style='max-width:340px;min-width:max-content;'data-bs-theme='light'>
        <h2 class="card-header text-center bg-secondary text-light shadow-lg">LOGIN</h2>
        <div class='card-body'>
        <div id="role_icon" style="height:60;width:60;border-radius:30px;overflow: hidden;display:flex;align-items:center;justify-content:center">
            <img src="./assets/profile.webp" style="height:80px;aspect-ratio:1/1" alt="" class="src rounded-circle" id="profile">
        </div>
        <form action="./action_page.php" method="post" class="form mx-0 px-1 " data-bs-theme='light'>

            <div class="form-group">
                <label for="dropdown">Select Your Role</label>
                <select  class='btn dropdown form-control w-100 bg-secondary my-2 shadow'  id="role" name="role" required>
                    <option selected value='select'>SELECT</option>
                </select>
            </div>

            <div class="form-group">
                <label for="user">User</label>
                <select name="user" class=' my-2 form-control btn dropdown shadow w-100 bg- bg-secondary' id="user" required>
                    <option value='select'>SELECT</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class= 'my-2 form-control shadow' id="pwd" placeholder="Enter password" name="password" required>
            </div>
            <div id="message"></div>
            <div class="input-group">
                <button type="submit" class="sign btn  bg-light shadow my-2 mt-3  w-75 mx-auto"
         id="sign_in">Submit</button>
            </div>
        </form>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <script>
    $("#loading").fadeOut();
        var mList = {
            DIRECTOR: ['SELECT','RGUKT ONGOLE'],
            SECURITY: ['SELECT','Campus-2(SSN)','Campus-3(R&N)']
        };

        el_parent = document.getElementById("role");
        el_child = document.getElementById("user");
        for (key in mList) {
            el_parent.innerHTML = el_parent.innerHTML + '<option class="text-dark">' + key + '</option>';
        }
        el_parent.addEventListener('change', function populate_child(e) {
            el_child.innerHTML = '';
            itm = e.target.value;
            if (itm in mList) {
                for (i = 0; i < mList[itm].length; i++) {
                    if(mList[itm][i]=='RGUKT ONGOLE'){
                        var val="DIRECTOR"
                    }
                    else if(mList[itm][i]=='Campus-2(SSN)'){
                        var val="CAMPUS_2"
                    }
                    else if(mList[itm][i]=="Campus-3(R&N)"){
                        var val="CAMPUS_3"
                    }
                    el_child.innerHTML = el_child.innerHTML + `<option class="text-dark" value=${val}>` + mList[itm][i] + '</option>';
                }
            }
        });

//dynamically changing the picture for the role of login
        $('#role').on('change', function() {
            if ($('#role').val() == "DIRECTOR") {
                $('#profile').attr('src', './assets/director.png')
                $('#sign_in').css({
                    'display': 'block'
                });

            } else if ($('#role').val() == "SECURITY") {
                $('#profile').attr('src', './assets/policeman.png')
                $('#sign_in').css({
                    'display': 'block'
                });

            } else if ($('#role').val() == "select") {
                $('#sign_in').css({
                    'display': 'none'
                });
                $('#message').html("please select the role").fadeIn(1000).fadeOut(1000);
                $('#profile').attr('src', './assets/profile.webp')
            } else {
                $('#profile').attr('src', '../assets/profile.webp')
            }
        })
        
        $('#sign_in').click(function(e){
            
            e.preventDefault();
            $.ajax({
                url:"action_page.php",
                type:"post",
                data:{user:$('#user').val(),password:$('#pwd').val()},
                dataType:'json',
                beforeSend:function(){
                    $('#loading').fadeIn()
                },
                complete:function(){
                    $('#loading').fadeOut()
                },
                success:function(data){
                    if (data.status === false) {
                Swal.fire({
                    icon: 'error',
                    title: 'Login Failed',
                    text: data.message,  // Display the error message
                    confirmButtonText: 'Ok'
                });
                } 
                    else {
                window.location.href = data.redirect_url;  
            }
                }
            })
        })
        
    </script>
</body>

</html>