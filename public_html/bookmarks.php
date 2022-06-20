<?php


include 'config.php';
session_start();
error_reporting(0);

$_greeting = '';


if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <link rel="icon" href="media\Logo\B-removebg-preview.png" />

    <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/layout.css" />

    <link rel="stylesheet" href="css\NavBar CSS\navbar.css" />
    <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css" />
    <link rel="stylesheet" href="css\buttons\signup_btn.css" />

    <link rel="icon" href="media\Logo\B-removebg-preview.png">
    <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css\NavBar CSS\navbar.css">
    <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css">
    <link rel="stylesheet" href="css\buttons\signup_btn.css">
    <link rel="stylesheet" href="css/footer.css">

    <link rel="stylesheet" href="css/banner.css" />

    <link rel="stylesheet" href="css/login-area.css" />
    <link rel="stylesheet" href="css/text-input.css" />

    <link rel="stylesheet" href="css/colors.css" />
    <link rel="stylesheet" href="css/variables.css" />
    <link rel="stylesheet" href="css/states.css" />
    <link rel="stylesheet" href="css/book-description-styles.css" />

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Varela+Round&display=swap" rel="stylesheet" />
</head>

<body class="max-width-body bg-color">
    <nav id="nav-bar">
        <span class="cell logo">
            <a class="logo" href="index.php">BOOKY</a>
        </span>

        <ul class="row">
            <section class="container">
                <li class="cell">
                    <a href="index.php">Home</a>
                </li>
                <li class="cell dropdown" sectionName="section-members">
                    <a href="all-members.php">Members</a>
                </li>
                <li class="cell dropdown" sectionName="section-books">
                    <a href="all_booksu.php">Books</a>
                </li>
                <li class="cell active" sectionName="section-bookmarks">
                    <a href="bookmarks.php">Bookmarks</a>
                </li>
                <li class="cell" sectionName="section-profile">
                    <a href="profile.php">Profile</a>
                </li>

                <li class="cell">
                    <a href="profile.php"><?php if (isset($_SESSION['username']))
                                                $_greeting = 'Hi, ';
                                            echo $_greeting  . $_SESSION['username']; ?></a>
                </li>

            </section>

            <div class="popover">
                <div class="content">
                    <div class="section section-members">
                        <div class="column">
                            <ul>
                                <li class="title">By location</li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">Cairo</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">Alexandria</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">Giza</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">New Cairo</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">Nasr City</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">The 5th Settlement</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">Madinaty</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">Ain Shams</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">Abbasia</a></li>
                            </ul>
                        </div>
                        <div class="column">
                            <ul>
                                <li class="title">By Rating</li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">5 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">4 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">3 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">2 start</a></li>
                                <li><a href="https://thebooky.000webhostapp.com/all-members.php">1 start</a></li>
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


        <?php if (!isset($_SESSION['username'])) {
            echo '
            <span class="cell btn">
                <span class="btn-shadow">
                    <span class="btn-body">
                        <a class="" href="Signup.php">Sign up</a>
                    </span>
                </span>
            </span>';
        } else {
            echo '
            <span class="cell btn">
                <span class="btn-shadow">
                    <span class="btn-body">
                        <a class="" href="logout.php">Log out</a>
                    </span>
                </span>
            </span>';
        }
        ?>
    </nav>




    <?php

    if (isset($_SESSION['username'])) {

        echo '
    <div style="
    width: 100%;
    font-size: 15rem;
    text-align: center;
    padding: 10%;
"> To Be Developed </div>


';
    } else {
        echo "
        <h1> You are not logged in please <a href='login.php'>log in</a></h1>
        ";
    }

    ?>







    <footer class="footer">
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



























    <script src="js\NavBar\nav-hover.js"></script>
    <script src="js\NavBar\navbarMenu.js"></script>




    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>




</body>

</html>