<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <title>Login In</title>
</head>
<style>
     html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    .input-group .bx {
        color: #68AE4A;
    }

    .inner-addon {
        position: relative;
    }

  
    .inner-addon .bx {
        position: absolute;
        padding: 10px;
        font-size: 24px;
        pointer-events: none;
    }
    .left-addon .bx  { left:  0px;}

    .form-control {
        padding-left: 50px;
        background-color: #F0F3F4;
        color: #707070; 
        border-radius: 30px; 
    }
    .btn{
        width: 100%;
        border-radius: 30px;
        background-color: #68AE4A;
        color: white;
    }
</style>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-center mt-2 mt-md-5">
                <div class="col-lg-4 col-md-12 d-flex flex-column align-items-center justify-content-center bg-light p-4 shadow mb-5 bg-white rounded">
                    <div class="logo my-4 pb-3">
                        <img src="./images/WhatsApp_Image_2024-01-02_at_1.06.38_PM-removebg-preview.png" width="250px" alt="">
                    </div>
                    <div class="text mb-3">
                        <h3>USER LOGIN</h3>
                    </div>
                    <form method="POST" id="loginForm">
                        <div class="input-group mb-4">
                            <div class="inner-addon left-addon">
                                <iconify-icon icon="bx:user" class="bx p-3"></iconify-icon>
                              <input type="text" class="form-control pe-5 me-5 py-3" placeholder="Enter Username" name="username" id="username"/>
                            </div>
                        </div>
                        <div class="input-group mb-4">
                            <div class="inner-addon left-addon">
                                <iconify-icon icon="mingcute:lock-line" class="bx p-3"></iconify-icon>
                              <input type="password" class="form-control pe-5 me-5 py-3" placeholder="Enter Password" name="password" id="password"/>
                            </div>
                        </div>
                        <div class="d-none inc" style="color: red;">
                            Please enter correct username and password!
                        </div>
                        <div class="pb-4">
                            <input class="btn px-5 mt-5 py-3" style="text-size-adjust: 100px;" type="submit" name="loginSubmit" value="LOGIN"/>
                        </div>                                           
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $(document).ready(function(){
          $('#loginForm').submit(function (event) {
              
              var formData = new FormData($('#loginForm')[0]);

            $.ajax({
                url: 'checkDetails.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                      console.log(response);

                    if(response == 1){
                        $("#loginForm")[0].reset();                       
                        window.location.href = 'invoice.php';                           
                    }else{
                        $('.inc').removeClass('d-none');
                    }
                    
                      
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
            event.preventDefault();                        
          });
        });
</script>

</body>
</html>