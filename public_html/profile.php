<?php
// Include the database configuration file  
require_once 'config.php';

// $updated_image = '';
session_start();
error_reporting(0);
// If file upload form is submitted 
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
if(isset($_GET["user"])){
    $user_profile = $_GET["user"];
    
}else{
$user_profile = $_SESSION['username'];
}

if(isset($_POST["submit_desc"]) && $user_profile == $_SESSION['username'] && strlen($_POST["new_description"])>0 ){
    $temp = $_POST["new_description"];
    $sql = "UPDATE USER SET description= '$temp' WHERE username ='$user_profile' ";
    $result = mysqli_query($conn, $sql);
    
}


$sql = "SELECT * FROM USER WHERE username = '$user_profile' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$profile_pic = $row['profile_pic'];
$user_desc = $row['description'];
if(isset($_POST["submit"])) {
if ($_FILES["fileToUpload"]["size"] < 1000000) {
    $target_dir = "media/Profile_Images";
    // Get file info 
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Allow certain file formats 
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    if (in_array($imageFileType, $allowTypes)) {
        $image = $_FILES['image'];
        $path = "media/Profile_Images/".$user_profile.'.'.$imageFileType;
        move_uploaded_file($image['tmp_name'],$path);
        $sql = "UPDATE USER SET profile_pic= '$path' WHERE username ='$user_profile' ";
        $result = mysqli_query($conn, $sql);
    } else {
        $errorMSG=  'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
} else {
    $errorMSG = 'Please select an image file to upload.';
}
}

$error_msg = "";
if(isset($_POST["submit_book"])) {
    if (strlen($_POST["isbn"])>0 && strlen($_POST['ppd'])>0 && strlen($_POST['status'])>0){
    $isbn = $_POST['isbn'];
    $ppd = $_POST['ppd'];
    $status = $_POST['status'];
    
    $response = file_get_contents('https://www.googleapis.com/books/v1/volumes?q=isbn:'.$isbn);
    $response = json_decode($response,true);
    $title = $response['items'][0]['volumeInfo']['title'];
    $author = $response['items'][0]['volumeInfo']['authors'][0];
    $description = $response['items'][0]['volumeInfo']['description'];
    $new_picture = $response['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
    $genre = $response['items'][0]['volumeInfo']['categories'][0];
    
    $sql = "SELECT * FROM BOOK WHERE BOOK.isbn = '$isbn'";
    $result = mysqli_query($conn, $sql);
    $id  = random_int(100000000, 999999999);
    if (mysqli_num_rows($result)>0 && strlen($new_picture)>0){
        $sql = "INSERT INTO COPY (id,status, picture, owner,bookISBN, pricePerDay)
            VALUES ('$id','$status', '$new_picture', '$user_profile','$isbn',$ppd) ";
            $result = mysqli_query($conn, $sql);
    }elseif(strlen($new_picture)>0){
            $sql = "INSERT INTO BOOK (isbn,name, author, genre)
            VALUES ('$isbn','$title', '$author', '$genre') ";
            echo $sql;
            $result = mysqli_query($conn, $sql);
            $sql = "INSERT INTO COPY (id,status, picture, owner,bookISBN, pricePerDay)
            VALUES ('$id','$status', '$new_picture', '$user_profile','$isbn',$ppd) ";
            $result = mysqli_query($conn, $sql);
        
    }
 
}else {
    $error_msg = "Some of the information entered was notin the coorect format";
}
}



?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fork-awesome@1.2.0/css/fork-awesome.min.css" integrity="sha256-XoaMnoYC5TH6/+ihMEnospgm0J1PM/nioxbOUdnM8HY=" crossorigin="anonymous">
    
    <link rel="icon" href="media\Logo\B-removebg-preview.png">
    <script src="https://kit.fontawesome.com/54f44a10c5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="css\NavBar CSS\navbar.css">
    <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css">
    <link rel="stylesheet" href="css\buttons\signup_btn.css">
    <link rel="stylesheet" href="css/footer.css">
    <!-- icons scripts -->
    <script type="module" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule="" src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"></script>
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Varela+Round&display=swap" rel="stylesheet">



    <link rel="stylesheet" href="css/banner.css">
    <link rel="stylesheet" href="css/login-area.css">
    <link rel="stylesheet" href="css/text-input.css">
    <link rel="stylesheet" href="css/colors.css">
    <link rel="stylesheet" href="css/variables.css">
    <link rel="stylesheet" href="css/states.css">
    <link rel="stylesheet" href="css/loading.css">

    <link rel="stylesheet" href="css/css-for-profile-page.css">

    <!-- <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet"> -->

</head>



<body class="body">
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
                <li class="cell dropdown" sectionName="section-members">
                    <a href="all-members.php">Members</a>
                </li>
                <li class="cell dropdown" sectionName="section-books">
                    <a href="all_booksu.php">Books</a>
                </li>
                <li class="cell" sectionName="section-bookmarks">
                    <a href="bookmarks.php">Bookmarks</a>
                </li>
                <li class="cell active" sectionName="section-profile">
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



    <header>


        <div id='user-info-intro'>
            <?php
            echo"
            <div id='p-i'>
            <img id='profile-img' width='150%' src=$profile_pic >
            <i id='edit-pen' class='fas  fa-pencil'></i>
            </div>
            <div id='user-details'>
            <h1 id='profile-name'>$name </h1>
            <p id='profile-desc' style='color:black'>$user_desc</p>
            
            ";
            if($user_profile == $_SESSION['username']){
                echo "
                <form method = 'post' action =''>
            <textarea id='in-desc' cols='100' name = 'new_description' placeholder='Enter user description'></textarea>
            <Input type='Button' onclick='return false;' id='bb' value = 'Edit'/>  
            <input type = 'submit' name = 'submit_desc' id='sub' value = 'submit'> 
            </form>
            </div>
            ";
                
            }
        ?>
        </div>

            <div style='margin-top:15%' class="icons-container">
                
                <!--<a id="facebook-icon" target="_blank" href="https:facebook.com">-->
                <!--    <ion-icon style='color:#FC6254' name="logo-facebook"></ion-icon>-->
                <!--</a>-->
                <!--<a id="twitter-icon" target="_blank" href="https:twitter.com">-->
                <!--    <ion-icon style='color:#FC6254' name="logo-twitter"></ion-icon>-->
                <!--</a>-->
                <!--<a id="instagram-icon" target="_blank" href="https:instagram.com">-->
                <!--    <ion-icon style='color:#FC6254' name="logo-instagram"></ion-icon>-->
                <!--</a>-->
                <!--<a id="google-icon" target="_blank" href="https:google.com">-->
                <!--    <ion-icon style='color:#FC6254' name="logo-google"></ion-icon>-->
                <!--    </ion-icon>-->
                <!--</a>-->
                
                <br> 
                
                <?php
                if($_SESSION['username'] == $user_profile){
                    echo "<div id='file-container'> <form style='margin-top:3%; margin-bottom:3%; ' action='profile.php' method='POST' enctype='multipart/form-data' >
                    <label style='margin-top: 12%;font-size: 1.6rem'>Select Image File:</label>
                    <input id='file-input' type='file' name='image'>
                    <input id= 'image-submit' style='position:relative; right: 5%;' type='submit' name='submit' value='Upload'>
                    <p style='font-size:2rem; margin:2%;'> Or drag image here!</p>
                    </div>
                </form> ";
                }
                ?>
                


            </div>


    </header>

    <section class="section-1">

        <h1 id='profile-header'>Books Offered By <span id="books-by-author-name"><?php echo $name ?></span></h1>

        <div class="books-container">
    <?php
    $sql = "SELECT BOOK.isbn, BOOK.author, BOOK.name,BOOK.genre, COPY.owner, COPY.status,COPY.picture, COPY.pricePerDay 
    FROM COPY, BOOK 
    WHERE BOOK.isbn = COPY.bookISBN and  COPY.owner='$user_profile' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
            $book_name = $row['name'];
                $author = $row['author'];
                $owner = $row['owner'];
                $address = $row['address'];
                $price = $row['pricePerDay'];
                $genre = $row['genre'];
                $picture = $row['picture'];
                $status = $row['status'];
        
            echo "
            <figure class='figure-attribute'>
                <img class='book-img' src=$picture alt='book image'>
                <figcaption class='fig-caption'>$book_name</figcaption>
                <p class='author'> $author</p>
                <p class='price'>$price $</p>
            </figure>
            ";
        }

    ?>
        

        </div>
        <?PHP if($user_profile == $_SESSION['username']){
        echo "
        <button id='adb' style='margin-left:40%; font-size:1.9rem' >Add new book &#128214;</button>

    
                <form style='width:50%; margin:auto' action='' method='POST' id='add-book-form'>
                                     <div  style='padding-top: 5%; font-size:1.5rem;'>
                     <label style='margin-top: 20px; font-size:1.5rem;' for='isbn'>ISBN</label>
                    <div class='text-input'>
                        <input type='text' name='isbn' id='isbn' value='' placeholder=' Enter ISBN'>
                    </div>
                    </div>
                    
                    <div  style='padding-top: 5%; font-size:1.5rem;'>
                    <label style='margin-top: 200px; font-size:1.5rem;' for='ppd'>Price per day</label>
                    <div class='text-input'>
                        <input type='text' name='ppd' id='ppd' value='' placeholder='How much do you want to rent it for, per day in EGP'>
                    </div>
                    </div>

                    <div style='padding-top: 5%; font-size:1.5rem;'>
                    <label  for='status'>How do you describe the status of your book</label>
                    <select name = 'status'>
                        <option value = 'New'>New</option>
                        <option value = 'Moderate'>Moderate</option>
                        <option value = 'Old'>Old</option>
                        <option value = 'Used' >Used</option>
                    </select>
                    </div>
                    <br>
                 
                 <input type='submit' name = 'submit_book'>

                </form>";
        }
        ?>

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
        </div>
    </footer>



























    <script src="js\NavBar\nav-hover.js"></script>
    <script src="js\NavBar\navbarMenu.js"></script>
    <script src="js/profile.js"></script>
    <script src="js/loading.js"></script>




    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>