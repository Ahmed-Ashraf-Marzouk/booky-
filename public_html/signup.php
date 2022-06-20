<?php

include 'config.php';

session_start();
error_reporting(0);

$_smth_wrong = '';
$_email_exist = '';
$_password_error = '';
if (isset($_POST['ssubmit'])) {
    $susername = $_POST['susername'];
    $semail = $_POST['semail'];
    $sname = $_POST['sname'];
    $spassword = md5($_POST['spassword']);
    $scpassword = md5($_POST['scpassword']);
    $date = date('Y-m-d H:i:s');
    $userdesc = 'is an American author of horror, supernatural fiction, suspense, crime, science-fiction, and fantasy novels. Described as the "King of Horror", a play on his surname and a reference to his high standing in pop culture.';

    if ($spassword == $scpassword) {
        $sql = "SELECT * FROM USER WHERE email='$semail' OR username = $susername";
        $result = mysqli_query($conn, $sql);
        if (!(mysqli_num_rows($result) > 0)) {
            $sql = "INSERT INTO USER (username,name, email, password, join_date, description)
            VALUES ('$susername','$sname', '$semail', '$spassword','$date', '$userdesc') ";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                // echo "<script>alert('User registration success')</script>";
                $susername = '';
                $semail = '';
                $_POST['spassword'] = '';
                $_POST['scpassword'] = '';
                header("Location: login.php");
            } else {
                $_smth_wrong = 'Something went wrong';
            }
        } else {
            $_email_exist = 'Username or Email already exists';
        }
    } else {
        $_password_error = 'Please try again, password do not match';
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Booky Home</title>
    <link rel="icon" href="media\Logo\B-removebg-preview.png">

    <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/layout.css">

    <link rel="stylesheet" href="css\NavBar CSS\navbar.css">
    <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css">
    <link rel="stylesheet" href="css\buttons\signup_btn.css">

    <link rel="stylesheet" href="css/banner.css">

    <link rel="stylesheet" href="css/login-area.css">
    <link rel="stylesheet" href="css/text-input.css">

    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/states.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/loading.css">
    <link rel="stylesheet" href="css/buttons/3d_button.css">



    <!-- <script src="https://unpkg.com/feather-icons"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Varela+Round&display=swap" rel="stylesheet" />

</head>

<body class="max-width-body bg-color">
    <div id="loading">
        <div id="spinner"></div>
    </div>
    
    <nav id="nav-bar">
        <span class="cell logo">
            <a class="logo" href="index.php">BOOKY</a>
        </span>

        <ul class="row">
            <section class="container">
                <li class="cell active">
                    <a href="index.php">Home</a>
                </li>
                <li class="cell dropdown" sectionName="section-members">
                    <a href="all-members.php">Members</a>
                </li>
                <li class="cell dropdown" sectionName="section-books">
                    <a href="">Books</a>
                </li>
                <!--<li class="cell" sectionName="section-bookmarks">-->
                <!--    <a href="">Bookmarks</a>-->
                <!--</li>-->
                <!--<li class="cell" sectionName="section-profile">-->
                <!--    <a href="">Profile</a>-->
                <!--</li>-->
            </section>

            <div class="popover">
                <div class="content">
                    <div class="section section-members">
                        <div class="column">
                            <ul>
                                <li class="title">By location</li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">Cairo</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">Alexandria</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">Giza</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">New Cairo</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">Nasr City</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">The 5th Settlement</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">Madinaty</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">Ain Shams</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">Abbasia</a></li>
                            </ul>
                        </div>
                        <div class="column">
                            <ul>
                                <li class="title">By Rating</li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">5 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">4 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">3 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">2 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_members.php">1 start</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="section section-books">
                         <div class="column">
                  <ul>
                    <li class="title">By Genre</li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=fiction#search">Fiction</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=non-fiction#search">Non-fiction</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=action#search">Action</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=science#search">Science</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=drama#search">Drama</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=kids#search">Kids</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=novel#search">Novel</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=sci-fi#search">Sci-fi</a></li>
                    <li><a href="https://thebooky.000webhostapp.com/all_booksu.php?filter=history#search">History</a></li>
                  </ul>
                </div>
                        <div class="column">
                            <ul>
                                <li class="title">By Price</li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">100£E+</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">50£E to 99£E</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">20£E to 49£E</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">1£E to 19£E</a></li>
                            </ul>
                        </div>
                        <div class="column">
                            <ul>
                                <li class="title">By Author</li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Ken Follett</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Donna Tartt</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Zadie Smith</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Disney</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="section section-bookmarks">
                        <div class="column">
                            <ul>
                                <li class="title">By Author</li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Ken Follett</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Donna Tartt</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Zadie Smith</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all_booksu.php">Disney</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="section section-profile">
                        <div class="column">
                            <ul>
                                <li class="title">By Genre</li>
                                <li>Action</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                            </ul>
                        </div>
                        <div class="column">
                            <ul>
                                <li class="title">By Genre</li>
                                <li>Action</li>
                                <li>Adventre</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                            </ul>
                        </div>
                        <div class="column">
                            <ul>
                                <li class="title">By Genre</li>
                                <li>Action</li>
                                <li>Adventre</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                            </ul>
                        </div>
                        <div class="column">
                            <ul>
                                <li class="title">By Genre</li>
                                <li>Action</li>
                                <li>Adventre</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                                <li>Fiction</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="background"></div>

                <div class="arrow"></div>
            </div>
        </ul>

        <span class="cell btn">
            <span class="btn-shadow">
                <span class="btn-body">
                    <a class="" href="">Sign Up</a>
                </span>
            </span>
        </span>

    </nav>





    <main>
        <section id="login-area">
            <div class="left">
                <div class="small-title">
                    Sign-up
                </div>


                <form action="" method="POST" id="signup-form">
                     <label for="sname">Name</label>
                    <div class="text-input">
                        <i class="fa-solid fa-address-card"></i>
                        <input type="text" name="sname" id="sname" value="<?php echo $sname; ?>" placeholder="Your Name">
                    </div>
                    
                    <label style="margin-top: 0px; for="susername">Username</label>
                    <div class="text-input">
                        <i class="fa-solid fa-address-card"></i>
                        <input type="text" name="susername" id="susername" value="<?php echo $susername; ?>" placeholder="Username">
                    </div>

                    <label style="margin-top: 0px;" for="semail">Email</label>
                    <div class="text-input">
                        <i class="fa-solid fa-address-card"></i>
                        <input type="text" name="semail" id="semail" value="<?php echo $semail; ?>" placeholder="Email">
                    </div>

                    <label for="password">Password</label>
                    <div class="text-input">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="spassword" id="password" value="<?php echo $_POST['spassword']; ?>" placeholder="Password">
                        <i id="show-password" class="fa-solid fa-eye show"></i>
                        <i id="hide-password" class="fa-solid fa-eye-low-vision hide"></i>
                    </div>

                    <label for="scpassword">Confirm password</label>
                    <div class="text-input">
                        <i class="fa-solid fa-key"></i>
                        <input type="password" name="scpassword" id="scpassword" value="<?php echo $_POST['scpassword']; ?>" placeholder="Password">
                        <i id="cshow-password" class="fa-solid fa-eye show"></i>
                        <i id="chide-password" class="fa-solid fa-eye-low-vision hide"></i>
                    </div>

                    <div data-signup-prompt>
                        Already <a href="login.php">have an account?</a>
                    </div>

                    <span class="cell btn">
                        <span class="btn-shadow">
                            <span class="btn-body">
                                <button class="button-3d active" href="" name="ssubmit">Sign Up</button>
                            </span>
                        </span>
                    </span>

                </form>


                <style>
                    .wrong-input {
                        font-size: 1.6rem;
                        color: red;
                        margin-top: 10%;
                    }
                </style>

                <div><span class="wrong-input"><?php echo $_smth_wrong . $_email_exist . $_password_error; ?></span></div>


                <!-- 
                <a href="index.html" id="lost-password">Did it happen again?</a>
                <div class="button-with-arrow orange-inset">
                    <span>Submit</span>
                    <i class="fa-solid fa-angle-right"></i>
                </div> -->
            </div>
            <div class="right">
                <img src="media\svg\Reading glasses-bro.svg" alt="">
            </div>
        </section>

        <footer>
            <div class="container grid grid--footer">



                <div class="logo-col">
                    <a class="logo" href="">BOOKY</a>
                    <ul class="social-links">
                        <li>
                            <a class="footer-link" href="#">
                                <ion-icon class="social-icon" name="logo-instagram"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="#">
                                <ion-icon class="social-icon" name="logo-facebook"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="#">
                                <ion-icon class="social-icon" name="logo-twitter"></ion-icon>
                            </a>
                        </li>
                    </ul>

                    <p class="copyright">
                        Copyright &copy; <span class="year">2027</span> by Booky
                        All rights reserved.
                    </p>
                </div>

                <div class="address-col">
                    <p class="footer-heading">Contact us</p>
                    <address class="contacts">
                        <p class="address">
                            Faculty Of Engineering @ Ain Shams
                        </p>
                        <p>
                            <a class="footer-link" href="tel:999-999-999">999-999-999</a><br />
                            <a class="footer-link" href="mailto:hello@Booky.com">hello@Booky.com</a>
                        </p>
                    </address>
                </div>

                <nav class="nav-col">
                    <p class="footer-heading">Account</p>
                    <ul class="footer-nav">
                        <li><a class="footer-link" href="signup.php">Create account</a></li>
                        <li><a class="footer-link" href="login.php">Sign in</a></li>
                        <li><a class="footer-link" href="#">iOS app</a></li>
                        <li><a class="footer-link" href="#">Android app</a></li>
                    </ul>
                </nav>

                <nav class="nav-col">
                    <p class="footer-heading">Company</p>
                    <ul class="footer-nav">
                        <li><a class="footer-link" href="#">About Booky</a></li>
                        <li><a class="footer-link" href="#">For Business</a></li>
                        <li><a class="footer-link" href="#">Careers</a></li>
                    </ul>
                </nav>

                <nav class="nav-col">
                    <p class="footer-heading">Resources</p>
                    <ul class="footer-nav">
                        <li><a class="footer-link" href="#">Help center</a></li>
                        <li><a class="footer-link" href="#">Privacy & terms</a></li>
                    </ul>
                </nav>
            </div>
        </footer>
        </footer>
    </main>


    <script src="js\show-password.js"></script>
    <script src="js\NavBar\nav-hover.js"></script>
    <script src="js\NavBar\navbarMenu.js"></script>
      <script src="js/loading.js"></script>
</body>

</html>