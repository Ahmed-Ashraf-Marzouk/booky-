<?php


include 'config.php';
session_start();
error_reporting(0);
$username = $_SESSION['username'];
if (!isset($username)){
    header("Location: login.php");
    
}

$sql = "SELECT * FROM ADMIN WHERE  username='$username'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows != 1) {
header("Location: index.php");
}


$sql = "SELECT U.username , U.name, U.email, U.join_date, COUNT(C.id) AS numBooks
FROM USER  U
LEFT JOIN COPY C
ON U.username = C.owner
WHERE U.banned_by IS NULL
GROUP BY U.username
ORDER BY numBooks DESC";
$users = mysqli_query($conn, $sql); 
$num_users  = mysqli_num_rows( $users );

$sql = "SELECT B.isbn , B.name, B.author, COUNT(C.id) AS offeredCopies
FROM BOOK  B
LEFT JOIN COPY C
ON B.isbn = C.bookISBN
GROUP BY B.isbn
ORDER BY offeredCopies DESC";
$books = mysqli_query($conn, $sql); 

$sql = "SELECT COUNT(COPY.id) as totalCopies from COPY";
$num_books  = mysqli_fetch_array( mysqli_query($conn, $sql) )['totalCopies'];

if (isset($_POST["search_book"])){
    $search_key = $_POST["search_book"];
    $sql = "SELECT B.isbn , B.name, B.author, COUNT(C.id) AS offeredCopies
    FROM BOOK  B
    LEFT JOIN COPY C
    ON B.isbn = C.bookISBN 
    WHERE B.name like'%$search_key%' OR B.isbn like '$search_key%' OR B.author like  '$search_key%'
    GROUP BY B.isbn
    ORDER BY offeredCopies DESC";
    $books = mysqli_query($conn, $sql);
}
if (isset($_POST["search_user"])){
    $search_key = $_POST["search_user"];
    $sql = "SELECT U.username , U.name, U.email, U.join_date, COUNT(C.id) AS numBooks
    FROM USER  U
    LEFT JOIN COPY C
    ON U.username = C.owner
    WHERE U.banned_by IS NULL AND (U.name like'%$search_key%' OR U.username like '$search_key%' OR U.email like  '$search_key%')
    GROUP BY U.username
    ORDER BY numBooks DESC";
    $users = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/admin_dashboard_style.css">
	<script src="https://kit.fontawesome.com/439a946613.js" crossorigin="anonymous"></script>
	<link 
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" 
  rel="stylesheet"  type='text/css'>
    <link rel="stylesheet" href="css/layout.css" />

    <link rel="stylesheet" href="css\NavBar CSS\navbar.css" />
    <link rel="stylesheet" href="css\NavBar CSS\navbarMenu.css" />
    <link rel="stylesheet" href="css\buttons\signup_btn.css" />
    <link rel="stylesheet"  type='text/css' href="css\colors.css" />
    <link rel="stylesheet" type='text/css' href="css\variables.css" />
    <link rel="stylesheet" href="css\states.css" />
    <link rel="stylesheet" href="css/loading.css">


    <!-- <script src="https://unpkg.com/feather-icons"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Akshar:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&family=Varela+Round&display=swap" rel="stylesheet" />
  
</head>
<body>
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
                    <a href="index.php">Home</a>
                </li>
                <li class="cell" sectionName="section-members">
                    <a href="all-members.php">Members</a>
                </li>
                <li class="cell" sectionName="section-books">
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
	<div class="card">
		<span class="title">General Statistics</span>
		<hr class="seperator"> <br>
	<div id ="stats">
		<div class="stat_element">
			<div class="iconContainer"><i class="fa fa-regular fa-user fa-2x"></i></div>
			<div><span class="data" id= #TotalUsers><?php echo $num_users; ?></span>		
			<span class="subText" >Total Users</span></div>
		</div>

		<div class="stat_element">
			<div class="iconContainer"><i class="fa fa-regular fa-circle-user fa-2x"></i></div>
			<div ><span class="data" id= #NewUsers><?php echo $num_users; ?></span>
			<span class="subText" >New Users</span></div>
		</div>
		
		<div class="stat_element">
			<div class="iconContainer"><i class=" fa fa-regular fa-book fa-2x"></i></div>
			<div ><span class="data"  id= #TotalBook><?php echo $num_books; ?></span>
			<span class="subText">Offered Books</span></div>
		</div>
		<div class="stat_element">
			<div class="iconContainer"><i class="fa fa-regular fa-ticket fa-2x"></i></div>
			<div ><span class="data" id= #supportTickets>10</span>
			<span class="subText">Support tickets</span></div>
		</div>

	</div>
</div>

<div class="two-cards">

    <div class="card">
      <span class="title">Add Books</span>
      <hr class="seperator">
      <div class="banForm">
        <form id="contentBan" action = "" method="post">
        <p>Add New Book manually to list of books allowed in BOOKY. The book isbn is the only required field and the rest can be fetched from the google books api.</p>  
        <fieldset>
        <input placeholder="Book isbn" name = "newBookISBN" type="text" tabindex="1" autofocus required>  
        </fieldset>
        <fieldset>
        <input placeholder="Book name" type="text" tabindex="1" autofocus>  
        </fieldset>
        <fieldset>
        <input placeholder="Author name" type="text" tabindex="1" >
        </fieldset>
        <fieldset>
        <input placeholder="Genre" type="text" tabindex="1" >
        </fieldset>

        <br>
        <button name="submit" type="submit" class = "bluebtn">Add new book</button></button>

        </form>
        
      </div>
    </div>
    
    <div class="card">
      <span class="title">Add Admin</span>
      <hr class="seperator">
      <div class="newAdmin">
        <form id="contentBan" action = "admin_functionality.php" method="post">
        <p>Add new admin.</p>  
        <fieldset>
        <input placeholder=" Admin name" name = "newAdminName" type="text" tabindex="1" autofocus required >  
        </fieldset>
        <fieldset>
        <input placeholder=" Admin username"  name = "newAdminUsername"type="text" tabindex="1" autofocus required >  
        </fieldset>
        <fieldset>
        <input placeholder="Password" type="password"  name = "newAdminPassword" tabindex="1" required>
        </fieldset>
        <fieldset>
        <input placeholder="Admin's email" type="email"  name = "newAdminEmail" tabindex="1"  required>
        </fieldset>
    
        <br>
        <button name="submitNewAdmin" type="submit" class = "bluebtn">Add admin</button>

        </form>
        
      </div>
    </div>
  </div>



		<div class="card" id = "manage_users"> 
			<span class="title">Manage Users</span>
			<hr class="seperator">
			<div class="wrap ">
	   			<div class="search">
	   			   <form action="admin_dashboard.php#manage_users" method ="POST" style = "display:flex"> 
			      <input type="text" class="searchTerm" name="search_user" placeholder="User name, email or ID">
			      <button type="submit" class="searchButton">
			        <i class="fa fa-search"></i>
			     </button>
			     </form>
			   </div>
			</div>
			<div id = "allUsers">
			<table>
				<thead>
					<tr>
					<th>Username</th>
					<th>Name</th>
					<th>Email</th>
					<th>Join Date</th>
					<th>Books offered</th></tr>
				</thead>
				<tbody>
				    <?php 
				    
				    if (mysqli_num_rows($users) == 0){ // NO DATA was returned 
				        echo "
				        <tr>
                      <td>NO ENTRY MATCHED</td>
                      <td>NO ENTRY MATCHED</td>
                      <td>NO ENTRY MATCHED</td>
                      <td>NO ENTRY MATCHED</td>
                      <td>NO ENTRY MATCHED</td>
                      </tr>
                        ";
				    }else {
				    while($row = mysqli_fetch_array($users)){
                        $name  = $row['name'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $join_date = $row['join_date'];
                        $num_books = $row['numBooks'];
                        $pic = $row['profile_pic'];
                        $profile = '"profile.php?user='.$username.'"';
                        $banUser = '"admin_functionality.php?banUser='.$username.'"';
                        echo "
                        <tr>
                      <td>$username</td>
                      <td>$name</td>
                      <td>$email</td>
                      <td>$join_date</td>
                      <td>$num_books</td>
                      <td><button class = 'bluebtn' onclick='location.href=$profile'>View profile</button> 
                        <button class = 'redbtn' onclick='location.href=$banUser'>Ban user</button></td></tr>
                        ";
				    }
				    }
				    ?>
				</tbody>
			</table>
			</div>
	</div>
	<div class="two-cards">
		<div class="card" id = "manage_books"> 
				<span class="title">Manage Books</span>
				<hr class="seperator">
				<div class="wrap ">
		   			<div class="search">
		   			    <form action="admin_dashboard.php#manage_books" method ="post" style = "display:flex">
				      <input type="text" class="searchTerm" name="search_book" placeholder="Book title, Id or author name">
				      <button type="submit" class="searchButton" >
				        <i class="fa fa-search"></i>
				     </button></form>
				   </div>
				</div>
				<div id = "allBooks">
				<table>
					<thead>
						<tr>
						<th>ISBN</th>
						<th>Title</th>
						<th>Author</th>
						<th>Copies offered</th></tr>
					</thead>
					<tbody>
					    <?php
					    
					    if (mysqli_num_rows($books) == 0){ // NO DATA was returned 
				        echo "
				        <tr>
                      <tr>
                        <td>NO ENTRY MATCHED</td>
                        <td>NO ENTRY MATCHED</td>
                        <td>NO ENTRY MATCHED</td>
                        <td>NO ENTRY MATCHED</td>
                      </tr>
                        ";
				    }else {
					    while($row = mysqli_fetch_array($books)){
                        $name  = $row['name'];
                        $isbn  = $row['isbn'];
                        $author = $row['author'];
                        $num_books = $row['offeredCopies'];
                        $bookPage = '"book_description.php?isbn='.$isbn.'"';
                        
                        echo "
                        <tr>
                        <td>$isbn</td>
                        <td>$name</td>
                        <td>$author</td>
                        <td>$num_books</td>
                        <td><button class = 'bluebtn'  onclick='location.href=$bookPage'>View book</button></td></tr>
                        
                        ";
                        
					    }
				    }
					    ?>
						
					</tbody>
				</table>
				</div>
		</div>
		<div class="card">
			<span class="title">Manage Content</span>
			<hr class="seperator">
			<div class="banForm">
				<form id="contentBan" action = "" method="post">
				<p>Prohbit adding content to the website that doesn't follow our terms and aggrements, target content by book name, author, genre.</p>	
				<fieldset>
				<input placeholder="Book name" type="text" tabindex="1" autofocus>	
				</fieldset>
				<fieldset>
				<input placeholder="Author name" type="text" tabindex="1" >
				</fieldset>
				<fieldset>
				<input placeholder="Genre" type="text" tabindex="1" >
				</fieldset>
				<fieldset>
				<textarea placeholder="Type the ban message here...." tabindex="5" required></textarea>
				</fieldset>
				<br>
				<button name="submit" type="submit" class = "redbtn">Submit Ban Triger</button>

				</form>
				
			</div>
		</div>
	</div>

	<script src="js/loading.js"></script>
	<script src="js\NavBar\nav-hover.js"></script>
    <script src="js\NavBar\navbarMenu.js"></script>
</body>
</html>