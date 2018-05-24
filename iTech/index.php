<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>iTech - Home</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="indexBody">
        <nav class="stroke" id="mainNav">
           
            <ul class="nav justify-content-end">
               
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="products.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link active" href="cart.php"><img class="cart" src="images/cart.png"></a>
                </li>
                
                <li class="nav-item navSignIn">
                    <?php
                        if (isset($_SESSION['clientId'])) {
                            echo "<a class='nav-link active signBtn' href='logout.php'>Logout</a>";
                        }
                        
                        else {
                            echo "<a class='nav-link active signBtn' href='login.php'>Sign in</a>";
                        }
                        
                    ?>
                </li>
            </ul>
        </nav>
        
        <main>
            <section class="wrapper">
               <div class="webTitle">
                    <h1>iTech</h1>
                    <h3>Changes for the Better</h3>
                    <a href="help.php"><div class="button">Help</div></a>
               </div>
            </section>
            
        </main>
        
        <footer class="footer-distributed">

			<div class="footer-left">

				<h3 class="logoText">iTech<span><img class="logoImg" src="images/iTechLogo.png" alt="Company Logo"></span></h3>

				<p class="footer-links">
					<a href="index.php">Home</a>
					·
					<a href="products.php">Products</a>
					·
					<a href="gallery.php">Gallery</a>
					·
					<a href="about.php">About</a>
					·
					<a href="contact.php">Contact</a>
				</p>

				<p class="footer-company-name">iTech &copy; 2018</p>
			</div>

			<div class="footer-center">

				<div>
					<i class="fa fa-map-marker"><img src="images/marker.png" alt=""></i>
					<p><span>St.Laurence Street</span>Birgu, Malta</p>
				</div>

				<div>
					<i class="fa fa-phone"><img src="images/telephone.png" alt=""></i>
					<p>+1 555 123456</p>
				</div>

				<div>
					<i class="fa fa-envelope"><img src="images/message.png" alt=""></i>
					<p><a href="mailto:support@company.com">iTech@company.com</a></p>
				</div>

			</div>

			<div class="footer-right">

				<p class="footer-company-about">
					<span>About the company</span>
					iTech is an E-Commerce website which offers the latest gaming peripherals for your gaming needs.
				</p>

				<div class="footer-icons">

					<a href="https://www.facebook.com/"><img src="images/fb.png" alt=""><i class="fa fa-facebook"></i></a>
					<a href="https://twitter.com/"><img src="images/twitter.png" alt=""><i class="fa fa-twitter"></i></a>
					<a href="https://www.linkedin.com/"><img src="images/linkedin.png" alt=""><i class="fa fa-linkedin"></i></a>
					<a href="https://github.com/"><img src="images/github.png" alt=""><i class="fa fa-github"></i></a>

				</div>
			</div>
		</footer>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>