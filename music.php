<!DOCTYPE html>
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

    <div class="container">
        <div class="search-container"><input type="text" name="search-bar" placeholder="Search..." class="search-input"><button class="btn btn-light search-btn" type="button"> <i class="fa fa-search"></i></button></div></div>

    <div style="padding-bottom:20px; padding-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 style="color:rgb(0,25,0;font-size:40px;"><a href="services.html" style="color:rgb(30,131,232);">Uploads</a></h3>
                        <ol style="color:rgb(239,120,11);font-size:25px;">
                    <?php
                        $db = mysqli_connect("localhost","root","","umojastudio");
                        //$userInt=$_SESSION["sess_user"];
                        $sql = "SELECT * FROM songs";
                        $result= mysqli_query($db, $sql);
                        
                        while($row=mysqli_fetch_array($result)){



                                echo "<li>".$row['name']."      ". $row['artist']."     ".$row['year']."</li>";
                                echo "<audio controls><source src='mp3/".$row['name']."' type='audio/mp3'>error</audio>";
                                /*<li><a href="services.html#automobile">Automobile</a></li>
                                <li><a href="services.html#highQualityStudio">High Quality Studio</a></li>
                                <li><a href="services.html#qualitySurround">Quality Surroundings</a></li>
                                <li><a href="services.html#highQualityMusic">High Quality Music</a></li>
                                <li><a href="services.html#hdVideo">HD Video</a></li>
                            */

                          
                            
                        }
                            
                    ?>

                    </ul>
                </div>
                <!--div class="col-md-4">
                    <h3 class="text-center" style="color:rgb(255,255,255);font-size:40px;"><a href="about.html" style="color:rgb(255,255,255);">About Us</a></h3>
                    <ul class="d-inline-block align-items-center" style="color:rgb(255,255,255);font-size:25px;padding-left:125px;">
                        <li><a href="admin.php" style="color:rgb(255,255,255);">Admin Login</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="login-clean">
                        <form method="post" enctype="multipart/form-data">
                            <h1 class="text-center" style="color:rgb(30,131,232);">Upload a Song</h1>
                            <div class="illustration"><i class="icon ion-ios-navigate" style="color:rgb(239,120,11);"></i></div>
                            <div class="form-group"><input type="file" name="song" value="song"required></div>
                            <div class="form-group"><input class="form-control" type="text" name="artist" placeholder="Artist Name"></div>
                            <div class="form-group"><input class="form-control" type="text" name="year" placeholder="Year Produced"></div>
                            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="upload" style="background-color:rgb(239,120,11);">Upload</button></div>
                    </div>
                </div-->
            </div>
        </div></div>

    
    
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

</html>