<?php


include 'config.php';
session_start();
error_reporting(0);



$search = "Book name or ISBN...";
if (isset($_GET['search_text'])) {
   $search = $_GET['search_text'];
    $sql = "SELECT BOOK.isbn, BOOK.author, BOOK.name,BOOK.genre, COPY.owner, COPY.status,COPY.picture, COPY.pricePerDay, address 
    FROM COPY, BOOK, ADDRESS 
    WHERE BOOK.isbn = COPY.bookISBN and ADDRESS.username = COPY.owner and (BOOK.name like '$search%' or BOOK.isbn like '$search%') ";
    $result = mysqli_query($conn, $sql);  
    
  }elseif (isset($_GET['filter'])) {
   $genre = $_GET['filter'];
    $sql = "SELECT BOOK.isbn, BOOK.author, BOOK.name,BOOK.genre, COPY.owner, COPY.status,COPY.picture, COPY.pricePerDay, address 
    FROM COPY, BOOK, ADDRESS 
    WHERE BOOK.isbn = COPY.bookISBN and ADDRESS.username = COPY.owner and BOOK.genre = '$genre' ";
    $result = mysqli_query($conn, $sql);
  }else{
      $sql = "SELECT BOOK.isbn, BOOK.author, BOOK.name,BOOK.genre, COPY.owner, COPY.status,COPY.picture, COPY.pricePerDay, address 
    FROM COPY, BOOK, ADDRESS 
    WHERE BOOK.isbn = COPY.bookISBN and ADDRESS.username = COPY.owner";
    $result = mysqli_query($conn, $sql);
  }
    


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Booky Home</title>
  <link rel="icon" href="media\Logo\B-removebg-preview.png" />

  <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="css/layout.css" />

  <link rel="stylesheet" href="css\NavBar CSS\navbar.css" />
  <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css" />
  <link rel="stylesheet" href="css\buttons\signup_btn.css" />

  <link rel="stylesheet" href="css\banner.css" />
  <link rel="stylesheet" href="css\book_area\books_section.css" />
  <link rel="stylesheet" href="css\book_area\control.css" />
  <link rel="stylesheet" href="css\book_area\book_grid.css" />

  <link rel="stylesheet" href="css/text-input.css" />

  <link rel="stylesheet" href="css/colors.css" />
  <link rel="stylesheet" href="css/variables.css" />
  <link rel="stylesheet" href="css/states.css" />
  <link rel="stylesheet" href="css/footer.css" />
  <link rel="stylesheet" href="css/buttons/3d_button.css" />
  <link rel="stylesheet" href="css/loading.css">

  <!-- <script src="https://unpkg.com/feather-icons"></script> -->
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Varela+Round&display=swap" rel="stylesheet" />
</head>

<body style="overflow: hidden;">
    <div id="loading">
        <div id="spinner"></div>
    </div>
    
      <!-- Header and Menu bar (should be placed here) -->
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
            <li class="cell dropdown active" sectionName="section-books">
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
        <div class="text title">Book A Book</div>
        <div class="text subtitle">Make a deal.</div>
        <img src="media\svg\glass_books_coffee._recolored.svg" alt="" />
        <!-- </div> -->
      </section>
    
      <main>
        <section id="book-area">
          <section id="control">
            <div id="search" >
              <div class="title">Search</div>
                <form action="all_booksu.php#search" method="GET" >
                  <div class="text-input">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <label for="search-books"></label>
                    <input type="text" name="search_text" id="search-books" placeholder="<?php echo htmlspecialchars($search);?>" />
                  </div>
                  <button name="sumbit" class="button-3d" disabled>Search</button>
                </form>
            </div>
    
            <div id="genre">
              <div class="title">Genre</div>
              <form action="">
                <label for="genre_filter"></label>
                
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php#search';">
                  <label for="genre_action"><i class="fa-solid fa-xmark"></i></label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=action#search';">
                  <label for="genre_action">Action</label>
                </span>
                <span class="genre_checkbox" onclick="location.href='all_booksu.php?filter=drama#search';">
                  <label for="genre_drama">Drama</label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=science#search';">
                  <label for="genre_science">Science</label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=comedy#search';">
                  <label for="genre_comedy">Comedy</label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=fiction#search';">
                  <label for="genre_fiction">Fiction</label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=math#search';">
                  <label for="genre_math">Math</label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=autography#search';">
                  <label for="genre_autography">Autography</label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=kids#search';">
                  <label for="genre_kids">Kids</label>
                </span>
                <span class="genre_checkbox"  onclick="location.href='all_booksu.php?filter=programming#search';">
                  <label for="genre_programming">Programming</label>
                </span>
              </form>
            </div>
          </section>
    
          <section class="grid" id="books">
              <?php
              if ( mysqli_num_rows($result) > 0 ){
                  
                  while($row = mysqli_fetch_array($result))
                  
                    {
                    $isbn = $row['isbn']; 
                    $book_name = $row['name'];
                    $author = $row['author'];
                    $owner = $row['owner'];
                    $address = $row['address'];
                    $price = $row['pricePerDay'];
                    $genre = $row['genre'];
                    $picture = $row['picture'];
                    $status = $row['status'];
                    $book_description_url = '"book_description.php?isbn='.$isbn.'"';
                    
                    if ($status =="New" ){
                        $stars = "<i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star' style='color:#FFDF00'></i>";
                        
                    }elseif ($status == "Moderate"){
                        $stars = "<i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star' ></i>";
                        
                    }elseif ($status == "Old"){
                        $stars = "<i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star' ></i>
                    <i class='fa-solid fa-star' ></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star' ></i>";
                    }elseif ($status == "Used") {
                         $stars = "<i class='fa-solid fa-star' style='color:#FFDF00'></i>
                    <i class='fa-solid fa-star'  style='color:#FFDF00' ></i>
                    <i class='fa-solid fa-star' ></i>
                    <i class='fa-solid fa-star'></i>
                    <i class='fa-solid fa-star' ></i>";
                    }
                    
                   echo "
                   
                    <div class='book-card' onclick='location.href=$book_description_url'>
                  <div class='book-cover'>
                    <img src='$picture' alt=''  />
                    <i class='fa-regular fa-bookmark'></i>
                  </div>
        
                  <div class='book-name'>
                    $book_name
                  </div>
        
                  <div class='author'>Autohor</div>
                  <div class='author-name'>$author</div>
        
                  <div class='rating'>
                    <div class='price'>$price £E</div>
                    $stars
                    
                  </div>
        
                  <div class='tags'>
                    <span>$genre</span>
                 
                  </div>
        
                  <div class='bottom'>
                    <span>
                      <div class='seller'>Provided by</div>
                      <div class='seller-name'>$owner</div>
                    </span>
                    <span>
                      <div class='location'>Pick up address</div>
                      <div class='location-name'>$address</div>
                    </span>
                  </div>
                </div>
                   
                   
                   ";
                    }
              } else {
                  echo "
                  <center><h2> Sorry no books matched your search </h2></center>
                  ";
              }
            
            
            ?>
              
          </section>
          
        </section>
    
        <footer class="footer">
            <div class="container grid grid--footer">
    
    
    
                <div class="logo-col">
                    <a class="logo" href="">BOOKY</a>
                    <ul class="social-links">
                        <li>
                            <a class="footer-link" href="#">
                                <ion-icon class="social-icon md hydrated" name="logo-instagram" role="img" aria-label="logo instagram"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="#">
                                <ion-icon class="social-icon md hydrated" name="logo-facebook" role="img" aria-label="logo facebook"></ion-icon>
                            </a>
                        </li>
                        <li>
                            <a class="footer-link" href="#">
                                <ion-icon class="social-icon md hydrated" name="logo-twitter" role="img" aria-label="logo twitter"></ion-icon>
                            </a>
                        </li>
                    </ul>
    
                    <p class="copyright">
                        Copyright © <span class="year">2027</span> by Booky
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
                            <a class="footer-link" href="tel:999-999-999">999-999-999</a><br>
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
                        <li><a class="footer-link" href="#">Privacy &amp; terms</a></li>
                    </ul>
                </nav>
            </div>
        </footer>
      </main>
  <!-- Footer -->
  <script src="js/loading.js"></script>
  <script src="js\book_area\book_grid.js"></script>
  <script src="js\show-password.js"></script>
  <script src="js\NavBar\nav-hover.js"></script>
  <script src="js\NavBar\navbarMenu.js"></script>
  <script src="js\book_area\book_control.js"></script>
</body>

</html>