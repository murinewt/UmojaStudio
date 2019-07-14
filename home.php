<!DOCTYPE html>
<?php
session_start();
$username = $_SESSION['sess_user'];

if(!isset($_SESSION["sess_user"])){
        header("location:login.php");
    }
    else if(isset($_POST['book'])){
        function random_string(){
            $key="";
            $keys = array_merge(range(0,9),range('A','Z'));
             
            for($i=0;$i<10;$i++){
                $key .= $keys[array_rand($keys)];
            }
            return $key;
        }
        $db=mysqli_connect("localhost","root","","umojastudio");
        $town = $_POST['town'];
        $studio = $_POST['studio'];
        $gender = $_POST['gender'];
        $production = $_POST['production'];
        $message = $_POST['message'];
        date_default_timezone_set('Africa/Nairobi');
        $time = date('Y-m-d H:i:s');
        //$timeT =$_SESSION[$time];
        $phone = $_POST['phone'];
        $idBook = random_string();
        $insertsql = "INSERT INTO booking (email,office,studio,gender,production,message,timeIn,phone,mpesa,bookID,admin) VALUES ('$username','$town','$studio','$gender','$production','$message','$time','$phone','no','$idBook','')";
        $runIt = mysqli_query($db,$insertsql);
        //echo"<script type='text/javascript'>alert('you've booked!!');</script>";

        /*$IDsql = "SELECT * FROM booking WHERE message='$message' and timeIn = '$time' ";
        $IDresult = mysqli_query($db, $IDsql);
        $getThatID = mysqli_fetch_array($IDresult);
        $count = mysqli_num_rows($IDresult);*/
        
        $insertCode = "INSERT INTO mpesacode (code,bookID,email) VALUES('','$idBook','$username')";
        $IDresult = mysqli_query($db, $insertCode);
                    //if its one user with the login details that match
        //echo"<p>".$count." mimi ni msee ".$idBook."</p>";
        

    }
    else if(isset($_POST['logOut'])){
        session_start();
        $db=mysqli_connect("localhost","root","","umojastudio");
        $username = $_SESSION['sess_user'];
        $login = $_SESSION['time'];
        date_default_timezone_set('Africa/Nairobi');
        $time_out = date('Y-m-d H:i:s');
        $time_in=$_SESSION['time'];
        $numSession="UPDATE login SET logout_time='$time_out' WHERE login_time='$login'";
        $runSql = mysqli_query($db, $numSession);
        
        unset($_SESSION['username']);
        unset($_SESSION['time']);
        unset($_SESSION['password']); 
        unset($_SESSION['sess_user']);
        session_destroy();
        
        header("location:login.php");
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
                <div class="container"><a class="navbar-brand" href="index.html" style="font-size:30px;">Umoja Studio</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div
                        class="collapse navbar-collapse" id="navcol-1">
                        <ul class="nav navbar-nav" style="font-size:25px;">
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="services.html">Our Services</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="about.html">About Us</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="music.php">Music</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="video.php">Video</a></li>
                        </ul><span class="navbar-text"> </span></div>
                        <form method="post" class="form-inline mr-auto" target="_self"><span class="navbar-text"><?php echo $username;?> <button class="btn btn-primary btn-block" type="submit" name="logOut"style="background-color:rgb(239,120,11);">Log out</button></form>
        </div>
        </nav>
    </div>
    </div>
    <div class="container">
    <ul class="nav nav-tabs">
        <li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-1" class="nav-link active" style="font-size:30px;">Booking</a></li>
        <li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-2" class="nav-link" style="font-size:30px;">Payment</a></li>
        <li class="nav-item"><a role="tab" data-toggle="tab" href="#tab-3" class="nav-link" style="font-size:30px;">View Booking and Payment Confirmation</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab-1">
            <p class="text-center" style="font-size:25px;font-family:Lora, serif;">Please enter your details correctly</p>
            <div class="contact-clean">
                <form method="post">
                    <h2 class="text-center" style="color:rgb(239,120,11);">Book with us</h2>
                    <div class="form-group">
                        <h5 style="color:rgb(0,0,255);">Select a studio near you</h5><select name="town" required class="form-control"><optgroup  label="Our Studios In Kenya"><option  value="Nairobi">Nairobi</option><option value="Mombasa">Mombasa</option><option value="Kisumu">Kisumu</option><option value="Meru">Meru</option><option value="Nyeri">Nyeri</option><option value="Nakuru">Nakuru</option><option value="Machakos">Machakos</option></optgroup></select></div>
                    <div
                        class="form-group">
                        <h5 style="color:rgb(0,0,255);">Your preferred studio</h5>
                        <div class="form-check"><input type="radio" value="mobile" name="studio" class="form-check-input" id="formCheck-2" /><label for="formCheck-2" class="form-check-label">Mobile Studio</label></div>
                        <div class="form-check"><input type="radio" checked='true' name="studio" value="fixed" class="form-check-input" id="formCheck-3" /><label for="formCheck-3" class="form-check-label">Fixed Studio</label></div>
            </div>
            <div class="form-group">
                <h5 style="color:rgb(0,0,255);">Your Gender</h5>
                <div class="form-check"><input type="radio" name="gender" checked='true' value="male" class="form-check-input" id="formCheck-2" /><label for="formCheck-2" class="form-check-label">Male</label></div>
                <div class="form-check"><input type="radio" name="gender" value="female" class="form-check-input" id="formCheck-3" /><label for="formCheck-3" class="form-check-label">Female</label></div>
            </div>
            <div class="form-group">
                <h5 style="color:rgb(0,0,255);">Type of production to be done</h5>
                <div class="form-check"><input type="checkbox" name="production" value="audio" class="form-check-input" id="formCheck-1" /><label for="formCheck-1" class="form-check-label">Audio Only</label></div>
                <div class="form-check"><input type="checkbox" name="production" value="video" class="form-check-input" id="formCheck-4" /><label for="formCheck-4" class="form-check-label">Video Only</label></div>
                <div class="form-check"><input type="checkbox" name="production" value="audioVideo" class="form-check-input" id="formCheck-1" /><label for="formCheck-1" class="form-check-label">Audio and Video</label></div>
            </div>
            <div class="form-group"><h5 style="color:rgb(0,0,255);">Your Phone number</h5><input required type="text" rows="15" name="phone" placeholder="Enter Phone number for communication" class="form-control"></input></div>
            <div class="form-group"><h5 style="color:rgb(0,0,255);">More details about what you would like</h5><textarea rows="15" required name="message" placeholder="Explain what you would like more detailed" class="form-control"></textarea></div>
            <div class="form-group"><button class="btn btn-primary" type="submit" name="book" style="background-color:rgb(239,120,11);">BOOK</button></div>
            </form>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="tab-2">
        <p class="text-center" style="font-size:25px;">To finish booking with us please pay Ksh.5,000 through the Mpesa paybill 444556U</p>
        <p class="text-center" style="font-size:25px;">and your two names as the account name.</p>
        <p class="text-center" style="font-size:25px;">Enter the Mpesa transaction code to confirm your payment.</p>
        <div class="contact-clean"><?php
            //if(isset($_POST['mpesaBook'])){
                $db=mysqli_connect("localhost","root","","umojastudio");

               // $codeM = $_POST['mpesaCode'];
                $sqAll = "SELECT * FROM mpesacode WHERE email='$username'";
                $resulAll= mysqli_query($db, $sqAll);
                
                //$numm=1;
                while($row = mysqli_fetch_array($resulAll)){
                    if($row['code']==''){
                        $idd = $row['bookID'];
                        echo "<form method='post'>";
                        echo "<h2 class='text-center'>MPESA transaction code for <a href='userbookings.php?id=".$idd."'>".$idd."</a></h2>";
                        echo "<div class='form-group'><input type='text' name='mpesaCode' required min='10' max='10' class='form-control form-control-sm'></input></div>";
                        echo "<div class='form-group'><button name='bookMpesa".$idd."' class='btn btn-primary' type='submit'>Submit</button></div>"; 
                        echo"</form>";
                        if(isset($_POST['bookMpesa'.$idd])){
                            $codecode = $_POST['mpesaCode'];
                            if(strlen($codecode)>10){
                                echo"<script type='text/javascript'>alert('input correct code. 10 Characters!!');</script>";
                            }else if(strlen($codecode)<10){
                                echo"<script type='text/javascript'>alert('input correct code. 10 Characters!!');</script>";
                            }else{
                                $updatePesa = "UPDATE mpesacode SET code='$codecode' WHERE bookID ='$idd'";
                                $queryPesa = mysqli_query($db,$updatePesa);
                            }

                        }
                    }
                }
                

            ?>

        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="tab-3">
        <div class="contact-clean">
            <div class="container">
                <div class="row">
                    <div class="col col-md-6" style="max-width:33.33333%;">
                        <h3 class="text-center">Booking</h3>
                        <?php

                            $db=mysqli_connect("localhost","root","","umojastudio");
                            $selectAll = "SELECT * FROM booking WHERE email='$username'";
                            $runquery = mysqli_query($db,$selectAll);
                            $num=1;
                            while($getId = mysqli_fetch_array($runquery)){
                                echo "<h3 class='text-center'>".$num.". <a href='userbookings.php?id=".$getId['bookID']."'> ".$getId['bookID']."</a></h3>";
                                $num++;
                            }
                        ?>
                    </div>
                    <div class="col col-md-6" style="max-width:33.33333%;">
                        <h3 class="text-center">Paid?</h3>
                        <?php
                            $db=mysqli_connect("localhost","root","","umojastudio");
                            $selectAll = "SELECT * FROM booking WHERE email='$username'";
                            $runquery = mysqli_query($db,$selectAll);
                            $num=1;
                            while($getId = mysqli_fetch_array($runquery)){
                                echo "<h3 class='text-center'>".$getId['mpesa']."</h3>";
                                $num++;
                            }
                        ?>
                    </div>
                    <div class="col col-md-6" style="max-width:33.33333%;">
                        <h3 class="text-center">Appointment Day and time</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div></div>
    <div class="header-blue" style="padding-bottom:20px;">
        <div class="container">
            <div class="row text-center">
                <div class="col">
                    <h1 class="text-center" style="color:rgb(255,255,255);padding-right:10px;padding-left:10px;"><?php echo $username;?></h1>
                    <div class="d-flex justify-content-center"><a href="facebook.com/umojaStudio" style="font-size:30px;"><i class="icon ion-social-facebook" style="color:rgb(255,255,255);padding-right:10px;margin:0px 10px;"></i></a><a href="twitter.com/umojaStudio" style="font-size:30px;"><i class="icon ion-social-twitter" style="color:rgb(255,255,255);padding:0px 10px;padding-left:10px;"></i></a>
                        <a href="instagram.com/umojaStudio" style="font-size:30px;padding-right:5px;"><i class="icon ion-social-instagram" style="color:rgb(255,255,255);padding-left:10px;padding-right:10px;"></i></a><a href="snapchat.com/umojaStudio" style="font-size:30px;"><i class="icon ion-social-snapchat" style="color:rgb(255,255,255);padding-right:10px;padding-left:10px;"></i></a></div>
                    <p class="text-center justify-content-center align-items-center copyright" style="font-size:30px;color:rgb(255,255,255);">Umoja Studio © 2019</p>
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