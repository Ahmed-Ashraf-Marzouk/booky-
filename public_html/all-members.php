<?php


include 'config.php';
session_start();
error_reporting(0);
function getstarsHTML($inp){
                if ($inp ==1){
                    $stars = "<i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star' ></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>";
                    
                }elseif ($inp == 2){
                   $stars = "<i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star' ></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>";
                    
                }elseif ($inp == 3){
                    $stars = "<i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked' ></i>
                <i class='fa-solid fa-star'></i>
                <i class='fa-solid fa-star'></i>";
                }elseif ($inp == 4) {
                     $stars = "<i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked' ></i>
                <i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star'></i>";
                }elseif ($inp == 5) {
                     $stars = "<i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked' ></i>
                <i class='fa-solid fa-star checked'></i>
                <i class='fa-solid fa-star checked'></i>";
                }
        return $stars;
}
$_greeting = '';
$sql = "SELECT U.username , U.name, U.profile_pic, COUNT(C.id) AS numBooks
FROM USER  U
LEFT JOIN COPY C
ON U.username = C.owner
WHERE U.banned_by IS NULL
GROUP BY U.username
ORDER BY numBooks DESC";
$result = mysqli_query($conn, $sql); 
$num_users  = mysqli_num_rows( $result );
$num_pages = ceil($num_users/12);
if (isset($_GET['page_num'])) {
 $cur_page =$_GET['page_num']-1;
}else {
    $cur_page = 0;
}



?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="media\Logo\B-removebg-preview.png">
    <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/layout.css">

    <link rel="stylesheet" href="css\NavBar CSS\navbar.css">
    <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css">
    <link rel="stylesheet" href="css\buttons\signup_btn.css">
    <link rel="stylesheet" href="css/all-members.css">
    <link rel="stylesheet" href="css/footer.css">

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
    <link rel="stylesheet" href="css/loading.css">

    <!-- icons scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Varela+Round&display=swap" rel="stylesheet">
    <title>All members</title>
</head>

<body style="overflow: hidden;">
    <div id="loading">
        <div id="spinner"></div>
    </div>

    <nav id="nav-bar">
        <span class="cell logo">
            <a class="logo" href="">BOOKY</a>
        </span>

        <ul class="row">
            <section class="container">
                <li class="cell">
                    <a href="index.php">Home</a>
                </li>
                <li class="cell dropdown active" sectionName="section-members">
                    <a href="all-members.php">Members</a>
                </li>
                <li class="cell dropdown" sectionName="section-books">
                    <a href="all_booksu.php">Books</a>
                </li>
                <li class="cell" sectionName="section-bookmarks">
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
                        <a class="" href="signup.php">Sign up</a>
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

    <div class="search-box"></div>
    <div class="top-members">

        <p class="top-text">Top Members This Week</p>
        <img data-top src="media/images/1.jpg" alt="member">
        <button data-button-left class="btn btn--left" data-dir="-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="btn-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <button data-button-right class="btn btn--right" data-dir="-1">
            <svg xmlns="http://www.w3.org/2000/svg" class="btn-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
        <div class="dots">
            <button data-dot class="dot">&nbsp;</button>
            <button data-dot class="dot">&nbsp;</button>
            <button data-dot class="dot">&nbsp;</button>
            <button data-dot class="dot">&nbsp;</button>
            <button data-dot class="dot">&nbsp;</button>
        </div>



    </div>

    <div class="members">
        <?php

        $i = 0;
        while($row = mysqli_fetch_array($result)){
            if ($i<($cur_page*12))
                continue;
            elseif($i>=($cur_page+1)*12){
                break;
            }else{
                $name  = $row['name'];
                $username = $row['username'];
                $num_books = $row['numBooks'];
                $stars = getstarsHTML(5);
                $pic = $row['profile_pic'];
                $profile = '"profile.php?user='.$username.'"';
        
                echo "
                
                    <div class='profile-card'>
                    <img src='$pic' data-modal class='profile-image' alt='member-profile'>
                    <p class='member-name'> $name</p>
                    <p class='location'>$username</p>
                    <p class='books-read'>$num_books books offered</p>
                    <div class='rating'>
                        $stars
                    </div>
                    <button class='view-profile'  onclick='location.href=$profile'>

                        View profile
                    </button>
                </div>
                
                ";
                
            }
        }
        ?>
        
        
    </div>
    <div class="pagination">
        <button class="btn-pagination">
            <svg xmlns="http://www.w3.org/2000/svg" class="btn-pagination-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
       
        <?php 
        for ($x = 1; $x <=$num_pages; $x++){
            if ($x == $cur_page+1){
            echo " <a href='all-members.php?page_num=$x' class='page-link page-link--current'>$x</a>";
            }else {
              echo " <a href='all-members.php?page_num=$x' class='page-link '>$x</a>"; 
            }
        }
        ?>
        <button class="btn-pagination">
            <svg xmlns="http://www.w3.org/2000/svg" class="btn-pagination-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

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
                    <li><a class="footer-link" href="#">Create account</a></li>
                    <li><a class="footer-link" href="#">Sign in</a></li>
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

    </footer>
    <div data-overlay class="overlay hidden"></div>
    </div>
    <script src="js/loading.js"></script>
    <script src="js\NavBar\nav-hover.js"></script>
    <script src="js\NavBar\navbarMenu.js"></script>
    <script src="js\slider.js"></script>
    <script src="js\modal.js"></script>

</body>

</html>