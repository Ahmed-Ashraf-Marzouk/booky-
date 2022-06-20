<?php


include 'config.php';
session_start();
error_reporting(0);
if (!isset($_SESSION['username'])){
    header("Location: login.php");
    
}
$sql = "SELECT BOOK.isbn, BOOK.author, BOOK.name,BOOK.genre,picture, COUNT(COPY.id) as number_copies, ROUND(AVG(pricePerDay)) as avgPrice FROM COPY, BOOK WHERE BOOK.isbn = COPY.bookISBN GROUP BY COPY.bookISBN ORDER BY number_copies DESC";

$result = mysqli_query($conn, $sql); 

$_greeting = '';



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Booky Home</title>
    <link rel="icon" href="media\Logo\title_icon.png">

    <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/layout.css">

    <link rel="stylesheet" href="css\NavBar CSS\navbar.css">
    <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css">
    <link rel="stylesheet" href="css\buttons\signup_btn.css">

    <link rel="stylesheet" href="css\footer.css">
    <link rel="stylesheet" href="css/banner.css">

    <link rel="stylesheet" href="css/login-area.css">
    <link rel="stylesheet" href="css/text-input.css">

    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/states.css">
    <link rel="stylesheet" href="css/Book_Card_Designs/simple_book_card.css">
    <link rel="stylesheet" href="css/Book_Slider/book_slider.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/loading.css">

    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet" />
    
    <!-- Those fonts are not used, and should be deleted if this does not cauese any errors  -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet" /> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Varela+Round&display=swap" rel="stylesheet" /> -->
</head>

<body class="max-width-body bg-color">
    <div id="loading">
        <div id="spinner"></div>
    </div>
    
    <nav id="nav-bar">
        <span class="cell logo">
            <a class="logo" href="">BOOKY</a>
        </span>

        <ul class="row">
            <section class="container">
                <li class="cell active">
                    <a href="">Home</a>
                </li>
                <li class="cell dropdown" sectionName="section-members">
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
                </li></section>

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




    <section id="banner">
        <!-- <div> -->
        <div class="title">Book A Book</div>
        <div class="subtitle">Make a Deal</div>
        <img class="animated" src="media\svg\handshake.svg" alt="handshake image">
        <!-- </div> -->
    </section>
    
    <section id="info">
        <span>What is BOOKY?</span>
        <span>
            A place to sell your unused books to earn some cash.
            <br>
            Be it an old book or a new book it has a place on <strong>BOOKY's</strong> self.
        </span>
        <span>
            Simply upload a book in 2 steps and you are done!
        </span>
    </section>


    <main>
        <section id="trending-books-slider">
            <div class="title">FREQUENT BOOKS</div>
            <div class="container" id="book-card-container">
                <?php
                $classes = ["hidden left","left","current","right","hidden right"];
                for($x = 0; $x <5;$x++){
                    $row = mysqli_fetch_array($result);
                    $book_name = $row['name'];
                    $author = $row['author'];
                    $avgPrice = $row['avgPrice'];
                    $genre = $row['genre'];
                    $picture = $row['picture'];
                    $numCopies = $row['number_copies'];
                    
                    echo "
                    <span class=$classes[$x]>
                        <div class='book-card'>
                        <div data-book-card-top>
                            <img src=$picture alt='Image Missing'>
                        </div>
                        
                        
                        <div data-book-card-bottom>
                            <span data-book-name>$book_name</span>
                            <span data-author-title>Author</span>
                            <span data-author-name>$author</span>
                            <span data-price-container>
                                <span data-price-title>Average <br> Price</span>
                                <span data-price-amount>$avgPrice <span>£E</span></span>
                            </span>
                            <span data-tags-container>
                                <span>$genre</span>
                            </span>
                        </div>
                        <div data-book-card-footer>
                            <span>Available Copies</span>
                            <span>$numCopies</span>
                        </div>          
                        </div>
                    </span>" ;
                }
    ?>
                
                <div class="border-arrow"><span></span></div>
                <div class="border-arrow"><span></span></div>
            </div>

        </section>

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
    </main>
    
    <script src="js/loading.js"></script>
    <script src="js\NavBar\nav-hover.js"></script>
    <script src="js\NavBar\navbarMenu.js"></script>
    <script src="js\top_books.js"></script>

</body>

</html>