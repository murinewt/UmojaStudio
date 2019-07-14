<!DOCTYPE html>

<?php
session_start();
$username = $_SESSION['sess_admin'];
if(!isset($_SESSION["sess_admin"])){
        header("location:admin.php");
    }
    else if(isset($_POST['logOut'])){
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
//echo"<a href='loginPage.php'";
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
                <div class="container"><a href="index.html" class="navbar-brand" style="font-size:30px;">Umoja Studio</a><button data-toggle="collapse" data-target="#navcol-1" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1"></div><form method="post" class="form-inline mr-auto" target="_self"><span class="navbar-text"><?php echo $username; ?> <button class="btn btn-primary btn-block" type="submit" name="logOut"style="background-color:rgb(239,120,11);">Log out</button></form>
        </div>
        </nav>
    </div>
    </div>
    <div class="row">
        <div class="col-md-4 d-flex justify-content-center  contact-clean" style="background-color:rgb(0,0,0);min-height:100%;max-width:25%;">
            <div class="form-group">
                <ul class="list-unstyled">
                    <li style="margin:10px 0px;"><img src="assets/img/find_user.png" class="rounded img-fluid d-flex justify-content-center align-items-center align-content-center align-self-center" style="min-width:80%;" /></li>
                    <li style="font-size:40px;margin:10px 0px;"><i class="fa fa-dashboard" style="font-size:80px;color:rgb(239,120,11);"></i><a href="adminHome.php">DashBoard</a></li>
                    <li style="margin:10px 0px;"><i class="fa fa-bookmark" style="font-size:80px;color:rgb(239,120,11);"></i><a href="bookings.php" style="font-size:40px;">Bookings</a></li>
                    <li style="margin:10px 0px;"><i class="fa fa-file-audio-o" style="font-size:80px;color:rgb(239,120,11);"></i><a href="adminMusic.php" style="font-size:40px;">Audio</a></li>
                    <li style="margin:10px 0px;"><i class="fa fa-video-camera" style="font-size:80px;color:rgb(239,120,11);"></i><a href="adminVideo.php" style="font-size:40px;">Video</a></li>
                </ul>
            </div>
        </div>
        <div class="col" style="max-width:75%">
            <div class="row" style="padding:15px 0px;">
                <div class="col">
                    <h2 class="d-flex justify-content-center" style="color:rgb(0,0,255);">Bookings<br /></h2>
                    <h4 class="text-center d-flex justify-content-center" style="color:rgb(33,41,33);">Welcome <?php echo $username; ?>, Love to see you back<br /></h4>
                </div>
            </div>
            <hr style="font-size:40px;color:rgb(0,0,0);" />
            <!--div class="container">
                <div class="row">
                    <div class="col align-self-center" style="background-color:rgb(237,237,237);margin:0px 10px;"><span><i class="fa fa-user-plus d-inline d-flex justify-content-center" style="font-size:100px;background-color:rgba(255,184,0,0);color:rgb(205,167,32);"></i></span>
                        <p class="text-center" style="font-size:40px;color:rgb(0,0,255);"><strong>
                            <?php
                                $db = mysqli_connect("localhost","root","","umojastudio");
                                $passsql = "SELECT * FROM users ";
                                $passresult = mysqli_query($db, $passsql);
                                $count = mysqli_num_rows($passresult);
                                echo $count;
                            ?></strong></p>
                        <p class="text-center" style="font-size:30px;color:rgb(0,0,255);">Users</p>
                    </div>
                    <div class="col align-self-center" style="background-color:rgb(237,237,237);margin:0px 10px;"><span><i class="fa fa-user-circle-o d-inline d-flex justify-content-center" style="font-size:100px;background-color:rgba(255,184,0,0);color:rgb(129,205,32);"></i></span>
                        <p class="text-center" style="font-size:40px;color:rgb(0,0,255);"><strong>

                        <?php
                            $db = mysqli_connect("localhost","root","","umojastudio");
                            $passsql = "SELECT * FROM login";
                            $passresult = mysqli_query($db, $passsql);
                            $count = mysqli_num_rows($passresult);
                            echo $count;
                        ?>

                        </strong></p>
                        <p class="text-center" style="font-size:30px;color:rgb(0,0,255);">Logins</p>
                    </div>
                    <div class="col align-self-center" style="background-color:rgb(237,237,237);margin:0px 10px;"><span><i class="fa fa-bookmark-o d-inline d-flex justify-content-center" style="font-size:100px;background-color:rgba(255,184,0,0);color:rgb(32,205,195);"></i></span>
                        <p class="text-center" style="font-size:40px;color:rgb(0,0,255);"><strong>

                        <?php
                            $db = mysqli_connect("localhost","root","","umojastudio");
                            $passsql = "SELECT * FROM booking ";
                            $passresult = mysqli_query($db, $passsql);
                            $count = mysqli_num_rows($passresult);
                            echo $count;
                        ?>

                        </strong></p>
                        <p class="text-center" style="font-size:30px;color:rgb(0,0,255);">Bookings</p>
                    </div>
                    <div class="col align-self-center" style="background-color:rgb(237,237,237);margin:0px 10px;"><span><i class="fa fa-users d-inline d-flex justify-content-center" style="font-size:100px;background-color:rgba(255,184,0,0);color:rgb(139,32,205);"></i></span>
                        <p class="text-center" style="font-size:40px;color:rgb(0,0,255);"><strong>10</strong></p>
                        <p class="text-center" style="font-size:30px;color:rgb(0,0,255);">Visitors</p>
                    </div>
                </div>
            </div-->
            <hr />
            <div class="flex-container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Office Location</th>
                            <th>Studio Type</th>
                            <th>Gender</th>
                            <th>Production Type</th>
                            <th>Details</th>
                            <th>Phone Number</th>
                            <th>Time</th>
                            <th>Mpesa Code</th>
                            <th>Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            <?php
                                $db = mysqli_connect("localhost","root","","umojastudio");
                                $passsql = "SELECT * FROM booking ";
                                $passresult = mysqli_query($db, $passsql);
                                $username = $_SESSION['sess_admin'];

                                while($getThat = mysqli_fetch_array($passresult)){
                                    $Id = $getThat['bookID'];
                                    $anotherSQL = "SELECT * FROM mpesacode WHERE bookID='$Id'";
                                    $result = mysqli_query($db,$anotherSQL);
                                    $That = mysqli_fetch_array($result);

                                    echo "<tr>";
                                    $IdId = $getThat['ID'];
                                    $code = $That['code'];
                                    $email = $getThat['email'];
                                    $message = $getThat['message'];
                                    $studio = $getThat['studio'];
                                    $county = $getThat['office'];
                                    $phone = $getThat['phone'];
                                    $gender = $getThat['gender'];
                                    $production = $getThat['production'];
                                    $time = $getThat['timeIn'];
                                    $mpesa = $getThat['mpesa'];
                                    
                                    echo "<td>".$Id."</td>";
                                    echo "<td>".$email."</td>";
                                    echo "<td>".$county."</td>";
                                    echo "<td>".$studio."</td>";
                                    echo "<td>".$gender."</td>";
                                    echo "<td>".$production."</td>";
                                    echo "<td>".$message."</td>";
                                    echo "<td>".$phone."</td>";
                                    echo "<td>".$time."</td>";
                                    echo "<td>".$code."</td>";
                                    echo"<td>".$mpesa;
                                    echo"<form method='post'>";

                                    if($mpesa=='no'){
                                        echo "<button type='submit' name='pay".$Id."'>Confirm Pay</button></form></td>";
                                    }
                                    echo "</tr>";
                                    if(isset($_POST['pay'.$Id])){
                                        $sqlInterest="UPDATE booking SET mpesa='yes', admin='$username' WHERE ID='$IdId'";
                                        $queryInterest = mysqli_query($db,$sqlInterest);
                                        header("location:bookings.php");
                                    }
                                $count = mysqli_num_rows($passresult);
                                }
                                
                            ?>

                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>

    <div class="header-blue" style="padding-bottom:20px;">
        <div class="container">
            <h1 class="text-center" style="color:rgb(255,255,255);">Admin Bookings Page</h1>
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