<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>iTech - Home</title>
        <script src="js/jquery-3.2.1.min.js"></script>
        <link href="css/lightbox.css" rel="stylesheet">
		<script src="js/lightbox.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script>
			lightbox.option({
			'resizeDuration': 350,
			'wrapAround': true,
			'maxWidth': 720,
			'disableScrolling': true
		})
		</script>
    </head>
    
    <body id="galleryBody">
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
        
        <main class="aboutMain">
            <section class="gallerySec">
				<a href="images/setup1.jpg" data-lightbox="setup"> <img src="images/setup1.jpg" alt="setup"></a>
				<a href="images/setup2.jpg" data-lightbox="setup"><img src="images/setup2.jpg" alt="setup"></a>
				<a href="images/setup3.png" data-lightbox="setup"><img src="images/setup3.png" alt="setup"></a>
				<a href="images/setup4.jpg" data-lightbox="setup"> <img src="images/setup4.jpg" alt="setup"></a>
			</section>
			
			<section class="gallerySec">
				
				<a href="images/setup5.jpg" data-lightbox="setup"><img src="images/setup5.jpg" alt="setup"></a>
				<a href="images/setup6.jpg" data-lightbox="setup"><img src="images/setup6.jpg" alt="setup"></a>
				<a href="images/setup7.jpg" data-lightbox="setup"> <img src="images/setup7.jpg" alt="setup"></a>
				<a href="images/setup8.jpg" data-lightbox="setup"><img src="images/setup8.jpg" alt="setup"></a>
			</section>
			
			<section class="gallerySec">
				<a href="images/setup9.jpg" data-lightbox="setup"><img src="images/setup9.jpg" alt="setup"></a>
				<a href="images/setup10.jpg" data-lightbox="setup"> <img src="images/setup10.jpg" alt="setup"></a>
				<a href="images/setup11.jpg" data-lightbox="setup"><img src="images/setup11.jpg" alt="setup"></a>
				<a href="images/setup12.jpg" data-lightbox="setup"><img src="images/setup12.jpg" alt="setup"></a>
			</section>
			
			<section class="gallerySec">
				<a href="images/setup13.jpg" data-lightbox="setup"> <img src="images/setup13.jpg" alt="setup"></a>
				<a href="images/setup14.jpg" data-lightbox="setup"><img src="images/setup14.jpg" alt="setup"></a>
				<a href="images/setup15.jpg" data-lightbox="setup"><img src="images/setup15.jpg" alt="setup"></a>
				<a href="images/setup16.jpg" data-lightbox="setup"><img src="images/setup16.jpg" alt="setup"></a>
			</section>
       
            <section class="gallerySec">
				<a href="images/setup17.jpg" data-lightbox="setup"> <img src="images/setup17.jpg" alt="setup"></a>
				<a href="images/setup18.jpg" data-lightbox="setup"><img src="images/setup18.jpg" alt="setup"></a>
				<a href="images/setup19.jpg" data-lightbox="setup"><img src="images/setup19.jpg" alt="setup"></a>
				<a href="images/setup20.jpg" data-lightbox="setup"><img src="images/setup20.jpg" alt="setup"></a>
			</section>
        </main>
        
        <script src="js/script.js"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>


