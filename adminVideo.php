<!DOCTYPE html>
<?php
session_start();
$username = $_SESSION['sess_admin'];
    if(!isset($_SESSION["sess_admin"])){
        header("location:admin.php");
    }
	else if(isset($_POST['upload'])){
        //path to store the uploaded image
        $target = "video/".basename($_FILES['video']['name']);
        //connect to database
        $db = mysqli_connect("localhost","root","","umojastudio");
        //get all the submitted data from the form
        $video = $_FILES['video']['name'];
        //check its an image file
        //$types = array('video/3gp','video/mp4','video/mkv','video/flv','video/FLV');
        $ok=1;
        
       // $r =;
        //echo $r;

        //if(preg_match("/audio/",$_FILES['song']['type'])){
        /*if(in_array($_FILES['video']['type'],$types)){
            $ok=1;
        }
        else{
            $ok=0;
        }
        */
        if($ok==0){
            echo"<script type='text/javascript'>alert('please select a video type file ');</script>";
            
        }else{
            
        
            if($video==""){
                echo"<script type='text/javascript'>alert('no video selected');</script>";
            }else{

                $artist = $_POST['artist'];
                //date_default_timezone_set('Africa/Nairobi');
                //$date = date('Y-m-d H:i:s');
               // $user_sess = $_SESSION['sess_user'];
                $year = $_POST['year'];
                $sql = "INSERT INTO videos(name,artist,year) VALUES ('$video','$artist','$year')";
                mysqli_query($db, $sql);//stores the submitted data into the database table: images

               // mysqli_query($db, $sql);
                //move the uploaded images into the folder images
                if(move_uploaded_file($_FILES['video']['tmp_name'], $target) ){
                    echo"<script type='text/javascript'>alert('video Uploaded successfully');</script>";
                }
                else{
                    echo"<script type='text/javascript'>alert('There was a problem uploading video')";
                }
            }
        }
    }else if(isset($_POST['logOut'])){
        session_start();
        $db=mysqli_connect("localhost","root","","umojastudio");
        $username = $_SESSION['sess_admin'];
        $login = $_SESSION['time'];
        //date_default_timezone_set('Africa/Nairobi');
        //$time_out = date('Y-m-d H:i:s');
        //$time_in=$_SESSION['time'];
        //$numSession="UPDATE login SET logout_time='$time_out' WHERE login_time='$login'";
        //$runSql = mysqli_query($db, $numSession);
        
        unset($_SESSION['username']);
        //unset($_SESSION['time']);
        unset($_SESSION['password']); 
        unset($_SESSION['sess_admin']);
        session_destroy();
        
        header("location:index.html");
        exit();
    }
?>



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
                <div class="container"><a href="index.html" class="navbar-brand" style="font-size:30px;">Umoja Studio Admin</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1"></div><form method="post" class="form-inline mr-auto" target="_self"><span class="navbar-text"> <?php echo $username; ?> <button class="btn btn-primary btn-block" type="submit" name="logOut"style="background-color:rgb(239,120,11);">Log out</button></form>
        </div>
        </nav>
    </div>
    </div>
    <div class="row" style="min-height:100%;">
        <div class="col-md-4 d-flex justify-content-center contact-clean" style="background-color:rgb(0,0,0);min-height:100%;">
            <div class="form-group">
                <ul class="list-unstyled">
                    <li style="margin:10px 0px;"><img src="assets/img/find_user.png" class="rounded img-fluid d-flex justify-content-center align-items-center align-content-center align-self-center" style="min-width:80%;" /></li>
                    <li style="font-size:40px;margin:10px 0px;"><i class="fa fa-dashboard" style="font-size:80px;color:rgb(239,120,11);"></i><a active href="adminHome.php">DashBoard</a></li>
                    <li style="margin:10px 0px;"><i class="fa fa-bookmark" style="font-size:80px;color:rgb(239,120,11);"></i><a href="bookings.php" style="font-size:40px;">Bookings</a></li>
                    <li style="margin:10px 0px;"><i class="fa fa-file-audio-o" style="font-size:80px;color:rgb(239,120,11);"></i><a href="adminMusic.php" style="font-size:40px;">Audio</a></li>
                    <li style="margin:10px 0px;"><i class="fa fa-video-camera" style="font-size:80px;color:rgb(239,120,11);"></i><a href="adminVideo.php" style="font-size:40px;">Video</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-8" style="min-height:100%;max-width:33.333333%;">
            <h3 style="color:rgb(0,25,0;font-size:40px;"><a href="services.html" style="color:rgb(30,131,232);">Uploads</a></h3>
                        <ol style="color:rgb(239,120,11);font-size:25px;">
                    <?php
                        $db = mysqli_connect("localhost","root","","umojastudio");
                       // $userInt=$_SESSION["sess_user"];
                        $sql = "SELECT * FROM videos";
                        $result= mysqli_query($db, $sql);
                        
                        while($row=mysqli_fetch_array($result)){



                                echo "<li>".$row['name']."      ". $row['artist']."     ".$row['year']."</li>";
                                echo "<video controls ><source src='video/".$row['name']."' type='video/mp4'type='video/3gp'>error</video>";
                          
                            
                        }
                            
                    ?>
                    </ol>
        </div>
        <div class="col" style="min-height:100%;max-width:33.3333333%;">
            <div class="login-clean">
                        <form method="post" enctype="multipart/form-data">
                            <h1 class="text-center" style="color:rgb(30,131,232);">Upload a video</h1>
                            <div class="illustration"><i class="icon ion-ios-navigate" style="color:rgb(239,120,11);"></i></div>
                            <div class="form-group"><input type="file" name="video" required></div>
                            <div class="form-group"><input class="form-control" type="text" name="artist" placeholder="Artist Name"></div>
                            <div class="form-group"><input class="form-control" type="text" name="year" placeholder="Year Produced"></div>
                            <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="upload" style="background-color:rgb(239,120,11);">Upload</button></div>
                    </div>
        </div>
    </div>
    <div class="header-blue" style="padding-bottom:20px;">
        <div class="container">
            <h1 class="text-center" style="color:rgb(255,255,255);">Admin Video Page</h1>
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