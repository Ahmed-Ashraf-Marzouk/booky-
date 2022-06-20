<?php


include 'config.php';
session_start();
error_reporting(0);

$_greeting = '';
if (isset($_GET['isbn'])){
    $isbn = $_GET['isbn'];
    // $sql = "SELECT BOOK.isbn, BOOK.author, BOOK.name,BOOK.genre, COPY.picture
    // FROM BOOK,COPY
    // WHERE  BOOK.isbn = '$isbn'";
    // $BOOK = mysqli_query($conn, $sql); 
    // $book_name = $row['name'];
    // $author = $row['author'];
    // $genre = $row['genre'];
    // $picture = $row['picture'];
    // $status = $row['status'];
    
    $response = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=isbn:'.$isbn);
    $response = json_decode($response,true);
    $title = $response['items'][0]['volumeInfo']['title'];
    $author = $response['items'][0]['volumeInfo']['authors'][0];
    $description = $response['items'][0]['volumeInfo']['description'];
    $image = $response['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
    
    
    $sql = "REVIEW.description, REVIEW.username,REVIEW.stars
    FROM  REVIEW
    WHERE  REVIEW.isbn = '$isbn'";
    $REVIEWS = mysqli_query($conn, $sql); 
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Description</title>

  <link rel="icon" href="media\Logo\B-removebg-preview.png" />

  <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css\footer.css">
  <link rel="stylesheet" href="css/layout.css" />

  <link rel="stylesheet" href="css\NavBar CSS\navbar.css" />
  <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css" />
  <link rel="stylesheet" href="css\buttons\signup_btn.css" />

  <link rel="stylesheet" href="css/banner.css" />

  <link rel="stylesheet" href="css/login-area.css" />
  <link rel="stylesheet" href="css/text-input.css" />

  <link rel="stylesheet" href="css/colors.css" />
  <link rel="stylesheet" href="css/variables.css" />
  <link rel="stylesheet" href="css/states.css" />
  <link rel="stylesheet" href="css/book-description-styles.css" />
  <link rel="stylesheet" href="css/loading.css" />

  <!-- fonts -->
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
        <li class="cell">
          <a href="index.php">Home</a>
        </li>
        <li class="cell" sectionName="section-members">
          <a href="all-members.php">Members</a>
        </li>
        <li class="cell active" sectionName="section-books">
          <a href="all_booksu.php">Books</a>
        </li>
        <li class="cell" sectionName="section-bookmarks">
          <a href="bookmarks.php">Bookmarks</a>
        </li>
        <li class="cell" sectionName="section-profile">
          <a href="profile.php">Profile</a>
        </li>

        <li class="cell">
          <a href="profile.php"><?php if ($_SESSION['username'] != '')
                                  $_greeting = 'Hi, ';
                                echo $_greeting  . $_SESSION['username']; ?></a>
        </li>

      </section>

      <div class="popover">
        <div class="content">
          <div class="section section-members">
            <div class="column">
              <ul>
                <li class="title">By Genre</li>
                <li>Action</li>
                <li>Fiction</li>
                <li>Non-fiction</li>
                <li>Drama</li>
                <li>Fiction</li>
                <li>Adventre</li>
                <li>Adventre</li>
                <li>Adventre</li>
                <li>Adventre</li>
              </ul>
            </div>
            <div class="column">
              <ul>
                <li class="title">By Topic</li>
                <li>Science</li>
                <li>Math</li>
                <li>Nature</li>
                <li>Health</li>
                <li>Business</li>
              </ul>
            </div>
            <div class="column">
              <ul>
                <li class="title">By Genre</li>
                <li>Action</li>
                <li>Adventre</li>
                <li>Fiction</li>
                <li>Non-fiction</li>
                <li>Drama</li>
              </ul>
            </div>
          </div>

          <div class="section section-books">
            <div class="column">
              <ul>
                <li class="title">By Genre</li>
                <li>Action</li>
                <li>Fiction</li>
              </ul>
            </div>
            <div class="column">
              <ul>
                <li class="title">By Genre</li>
                <li>Action</li>
                <li>Adventre</li>
                <li>Fiction</li>
              </ul>
            </div>
          </div>

          <div class="section section-bookmarks">
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
                <li>Fiction</li>
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

  <div class="container"></div>
  <div class="book-card">
    <div class="image-container">
      <div class="image-background">
        <img class="image" src="<?PHP echo$image;?>" alt="" />
      </div>
    </div>
    <div class="side-content">
      <div class="title">
        <h1><?PHP echo $title ;?></h1>
      </div>
      <div class="rate">
        <input type="radio" id="star5" name="rate" value="5" />
        <label for="star5" title="text">5 stars</label>
        <input type="radio" id="star4" name="rate" value="4" />
        <label for="star4" title="text">4 stars</label>
        <input type="radio" id="star3" name="rate" value="3" />
        <label for="star3" title="text">3 stars</label>
        <input type="radio" id="star2" name="rate" value="2" />
        <label for="star2" title="text">2 stars</label>
        <input type="radio" id="star1" name="rate" value="1" />
        <label for="star1" title="text">1 star</label>
      </div>
      <div class="decription-container">
        <p class="book-description">
          <?PHP
          echo $description;
          ?>
        </p>
      </div>
    </div>
  </div>
  <div class="reviews">
    <h2 class="reviews-title">Book reviews</h2>
    <div class="review">
      <div class="user">
        <div class="user-image-container">
          <img class="user-image" src="media/jpg/personal-image-TIEC.jpg" alt="" />
        </div>
      </div>
      <div class="comment">
        <p class="user-name">Ahmed Ashraf Marzouk 🚀</p>
        <p class="comment-content">
          I really wanted to like this book. I have long held a fascination
          with traffic -- probably because of all hours I've spent stuck in it
          wondering why it behaves the way it does. I remember having weird
          traffic discussions with co-workers about traffic like: pretend you
          left the office to go home at 5:00 and it took you 1 hour to arrive
          in your driveway. Leaving at 5:30 on the other hand, because of the
          lighter traffic, you would roll into your driveway in only half an
          hour. If you and your housemate left at these times is it possible
          that you'd arrive at home at the same instant, despite having left
          work a half hour apart. Yes, a clinically strange thing to talk
          about on coffee break but, like I said, traffic fascinates me.
        </p>
      </div>
      <div class="up-down-votes"></div>
    </div>

    <div class="review">
      <div class="user">
        <div class="user-image-container">
          <img class="user-image" src="media/jpg/personal-image-TIEC.jpg" alt="" />
        </div>
      </div>
      <div class="comment">
        <p class="user-name">Ahmed Ashraf Marzouk 🚀</p>
        <p class="comment-content">
          Vanderbilt gets 5 stars for scaring the hell out of me every time I
          sit in the driver's seat. TRAFFIC is a compelling, curious read that
          makes you feel like you shouldn't be sitting in a car, much less
          driving one. You'll learn that there's such a thing as a "traffic
          archeologist," find out what was killing all the pedestrians in New
          York before cars, learn about the illusions that plague you as a
          driver, and hopefully a few things that will change your driving
          style. Most importantly, you'll learn who is right: the late merger
          or the early one.
        </p>
      </div>
      <div class="up-down-votes"></div>
    </div>

    <div class="review">
      <div class="user">
        <div class="user-image-container">
          <img class="user-image" src="media/jpg/personal-image-TIEC.jpg" alt="" />
        </div>
      </div>
      <div class="comment">
        <p class="user-name">Ahmed Ashraf Marzouk 🚀</p>
        <p class="comment-content">
          I had high hopes for this book after it sat unpurchased on my Amazon
          wishlist for three years...and once I finally got around to buying
          it, boy was I disappointed. To start with, Vanderbilt is the worst
          kind of modern nonfiction writer: the know-nothing cherrypicker who
          did some research on the internet and thinks he's an expert now,
          despite a total lack of objectivity which comes through on every
          page of his text. Vanderbilt smugly grabs research - any research -
          to justify his own pre-existing view of how things are, only
          bothering to evaluate the studies he's read that HE doesn't
          personally agree with. Most of the data in this book is just that:
          data, and while some of the data are interesting, the key to writing
          a book like this is not just data but what you do with them.
          Vanderbilt clearly has no background in interpreting data (as so few
          people who write these kinds of books actually do), so to him, a
          study from New Zealand is as valid as a study from New Jersey,
          despite vastly different methodologies, confidence intervals, and
          populations, and the two can be freely combined if it justifies a
          conclusion that HE has already drawn. For anyone who has actually
          taken a class in research methods, it's as lazy as it is amateurish.
        </p>
      </div>
      <div class="up-down-votes"></div>
    </div>
  </div>
  <div class="slider" id="slider">
    <h2 class="slider-title">Similar books</h2>
    <div class="slide" id="slide">
        
      <?php    
      
        $sql = "SELECT picture FROM COPY";

        $result = mysqli_query($conn, $sql); 
        for($x = 0; $x <5;$x++){
            $row = mysqli_fetch_array($result);
            $picture = $row['picture'];
            echo"
              <img width='60%' class='item' src=$picture/>
                ";
        }
        
        $sql = "SELECT picture FROM COPY";
        $result = mysqli_query($conn, $sql); 
        for($x = 0; $x <5;$x++){
            $row = mysqli_fetch_array($result);
            $picture = $row['picture'];
            echo"
              <img width='60%' class='item' src=$picture/>
                ";
        }
        
         $sql = "SELECT picture FROM COPY";
        $result = mysqli_query($conn, $sql); 
        for($x = 0; $x <6;$x++){
            $row = mysqli_fetch_array($result);
            $picture = $row['picture'];
            echo"
              <img width='60%' class='item' src=$picture/>
                ";
        }
      ?>
    </div>
    <button class="ctrl-btn pro-prev">Prev</button>
    <button class="ctrl-btn pro-next">Next</button>
  </div>

  <br />

  <br />
  <br />
  <br />
  <br />
  <br />
  
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

  <script src="js/book-description-script.js"></script>
  <script src="js\show-password.js"></script>
  <script src="js\NavBar\nav-hover.js"></script>
  <script src="js\NavBar\navbarMenu.js"></script>
<script src="js/loading.js"></script>
</body>

</html>