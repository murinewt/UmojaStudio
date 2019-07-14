<!DOCTYPE html>

<?php
    if(isset($_POST['createAccount'])){
        function random_string(){
                $key="";
                $keys = array_merge(range(0,9),range('a','z'));
                
                for($i=0;$i<10;$i++){
                    $key .= $keys[array_rand($keys)];
                }
                return $key;
        }
            
            //echo random_string();
        $aukey = random_string();
        
        $db = mysqli_connect("localhost","root","","umojaStudio");
        //$usernameAcc = $_POST['usernameAccount'];
        $passwordAcc = $_POST['password-repeat'];
        $passwordA = $_POST['password'];
        $surnameAcc = $_POST['firstName'];
        $othernameAcc = $_POST['otherName'];
        $emailAcc = $_POST['email'];
        $phoneAcc = $_POST['phone'];
        //$sexAcc = $_POST['sex'];
        //$dobAcc = $_POST['date'];
        $county = $_POST['county'];
        $salt="R6pJC3gT5?#";
        $encPass= md5($salt.$passwordAcc);
        
        $accountSql = "INSERT INTO users(firstName,otherName,county,phone,email,password,authKey) VALUES ('$surnameAcc','$othernameAcc','$county','$phoneAcc','$emailAcc','$encPass','$aukey')";
        $checkUsername = "SELECT * FROM users WHERE email='$emailAcc'";
        $numOfUsers=mysqli_query($db, $checkUsername);
        $numOfRow=mysqli_num_rows($numOfUsers);
        if($passwordAcc==$passwordA){
            if($numOfRow==0){
                $resultAcc = mysqli_query($db, $accountSql);
                if($resultAcc){
                    //sending mail
                    /*$to=$emailAcc;
                    $subject="Authentication Key to open autopieza.com";
                    $message="enter this key to verify your email: ".$aukey." ";
                    $header="FROM: nonreply@autopieza.com "."Reply-To: customercare@autopieza.com "."Content-type:text/html; charset=UTF-8 \r\n";
                    $emailSuccess=mail($to,$subject,$message,$header);
                    if($emailSuccess){*/
                        echo"<script type='text/javascript'>alert('Account created! login with your username and password');</script>";
                        //header("location:login.php");
                   /* }
                    else{   
                        echo"<script type='text/javascript'>alert('email not sent');</script>";
                    }*/
                    
                    
                }
                else{
                    echo"<script type='text/javascript'>alert('Details not added');</script>";
                }
            }
            else{
                echo"<script type='text/javascript'>alert('Please Choose another Username; that one is in use');</script>";
            }
        }
        else{
            echo"<script type='text/javascript'>alert('password not same as the other');</script>";
        }
    }
    
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Umoja Studio</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vollkorn:400,600i">
    <link rel="stylesheet" href="assets/css/Article-Clean.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider.css">
    <link rel="stylesheet" href="assets/css/Carousel_Image_Slider1.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Footer-Clean.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Highlight-Blue.css">
    <link rel="stylesheet" href="assets/css/Hero-Music.css">
    <link rel="stylesheet" href="assets/css/html5-video.css">
    <link rel="stylesheet" href="assets/css/Dynamically-Queue-Videos.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/Search-Field-With-Icon.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div>
        <div class="flex-nowrap header-blue" style="height:140px;">
            <nav class="navbar navbar-dark navbar-expand-md d-block navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.html" style="font-size:30px;">Umoja Studio</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav" style="font-size:25px;">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="services.html">Our Services</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="about.html">About Us</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="music.php">Music</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="video.php">Video</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self"></form><span class="navbar-text"> <a href="login.php" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="signup.php">Sign Up</a></div>
        </div>
        </nav>
    </div>
    </div>
    <div class="register-photo">
        <div class="form-container" style="width:950px;">
            <div class="image-holder" style="background-image:url(&quot;assets/img/about.jpg&quot;);"></div>
            <form name="loginPage" method="post" style="width:420px;">
                <h2 class="text-center" style="color:rgb(239,120,11);"><strong>Create</strong> an account.</h2>
                <div class="form-row form-group">
                    <div class="col"><input class="form-control" type="text" name="firstName" required="" placeholder="First Name"></div>
                    <div class="col"><input class="form-control" type="text" name="otherName" required="" placeholder="Other Names"></div>
                </div>
                <div class="form-row form-group">
                    <div class="col"><input class="form-control" type="text" name="county" required="" placeholder="County"></div>
                    <div class="col"><input class="form-control" type="tel" name="phone" required="" placeholder="Phone Number"></div>
                </div>
                <div class="form-group"><input class="form-control" type="email" name="email" required="" placeholder="Email"></div>
                <div class="form-group"><input class="form-control" type="password" name="password" required="" placeholder="Password"></div>
                <div class="form-group"><input class="form-control" type="password" name="password-repeat" required="" placeholder="Password (repeat)"></div>
                <div class="form-group">
                    <div class="form-check"><label class="form-check-label"><input class="form-check-input" type="checkbox" name="tick" required="">I agree to the license terms.</label></div>
                </div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit" onsubmit="return validateF()" name="createAccount" style="background-color:rgb(239,120,11);">Sign Up</button></div><a href="#" class="already">You already have an account? Login here.</a></form>
        </div>
    </div>
    <div class="header-blue" style="padding-bottom:20px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 style="color:rgb(255,255,255);font-size:40px;"><a href="services.html" style="color:rgb(255,255,255);">Services</a></h3>
                    <ul style="color:rgb(255,255,255);font-size:25px;">
                        <li><a href="services.html#soundCloudChannel" style="color:rgb(255,255,255);">Sound Cloud Channel</a></li>
                        <li><a href="services.html#automobile" style="color:rgb(255,255,255);">Automobile</a></li>
                        <li><a href="services.html#highQualityStudio" style="color:rgb(255,255,255);">High Quality Studio</a></li>
                        <li><a href="services.html#qualitySurround" style="color:rgb(255,255,255);">Quality Surroundings</a></li>
                        <li><a href="services.html#highQualityMusic" style="color:rgb(255,255,255);">High Quality Music</a></li>
                        <li><a href="services.html#hdVideo" style="color:rgb(255,255,255);">HD Video</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center" style="color:rgb(255,255,255);font-size:40px;"><a href="about.html" style="color:rgb(255,255,255);">About Us</a></h3>
                    <ul class="d-inline-block align-items-center" style="color:rgb(255,255,255);font-size:25px;padding-left:125px;">
                        <li><a href="admin.php" style="color:rgb(255,255,255);">Admin Login</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-center"><a href="facebook.com/umojaStudio" style="font-size:30px;"><i class="icon ion-social-facebook" style="color:rgb(255,255,255);padding-right:10px;margin:0px 10px;"></i></a><a href="twitter.com/umojaStudio" style="font-size:30px;"><i class="icon ion-social-twitter" style="color:rgb(255,255,255);padding:0px 10px;padding-left:10px;"></i></a>
                        <a
                            href="instagram.com/umojaStudio" style="font-size:30px;padding-right:5px;"><i class="icon ion-social-instagram" style="color:rgb(255,255,255);padding-left:10px;padding-right:10px;"></i></a><a href="snapchat.com/umojaStudio" style="font-size:30px;"><i class="icon ion-social-snapchat" style="color:rgb(255,255,255);padding-right:10px;padding-left:10px;"></i></a></div>
                    <p
                        class="text-center justify-content-center align-items-center copyright" style="font-size:30px;color:rgb(255,255,255);">Umoja Studio © 2019</p>
                        <div class="d-inline-block intro">
                            <h2 class="text-center d-flex justify-content-start align-items-start align-content-start align-self-start">Subscribe for our Newsletter</h2>
                            <p class="text-center" style="font-size:20px;">To be updated on our locations and what we are doing enter your email for automatic updates</p>
                        </div>
                        <form class="form-inline d-flex justify-content-center" method="post">
                            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Your Email"></div>
                            <div class="form-group"><button class="btn btn-primary" type="submit">Subscribe </button></div>
                        </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/Dynamically-Queue-Videos1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.jquery.min.js"></script>
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="assets/js/Simple-Slider1.js"></script>
</body>
 <script type='text/javascript'>
            function validateF(){
                var x = document.forms["loginPage"]["firstName"].value;
                if (x == null || x == "") {
                    alert("first Name must be filled out");
                    return false;
                }
                var x1 = document.forms["loginPage"]["otherName"].value;
                if (x1 == null || x1 == "") {
                    alert("Other name must be filled out");
                    return false;
                }
                var x2 = document.forms["loginPage"]["email"].value;
                if (x2 == null || x2 == "") {
                    alert("email must be filled out");
                    return false;
                }
                var x3 = document.forms["loginPage"]["phone"].value;
                if (x3 == null || x3 == "") {
                    alert("phone must be filled out");
                    return false;
                }
                /*var x4 = document.forms["loginPage"]["date"].value;
                if (x4 == null || x4 == "") {
                    alert("Date of birth must be filled out");
                    return false;
                }*/
                var x5 = document.forms["loginPage"]["county"].value;
                if (x5 == null || x5 == "") {
                    alert("County must be filled out");
                    return false;
                }
               /* var x6 = document.forms["loginPage"]["usernameAccount"].value;
                if (x6 == null || x6 == "") {
                    alert("Username must be filled out");
                    return false;
                }*/
                var x7 = document.forms["loginPage"]["password"].value;
                if (x7 == null || x7 == "") {
                    alert("Password must be filled out");
                    return false;
                }
                var x8 = document.forms["loginPage"]["password-repeat"].value;
                if (x8 == null || x8 == "") {
                    alert("Password-repeat must be filled out");
                    return false;
                }
            }
        </script>
</html>