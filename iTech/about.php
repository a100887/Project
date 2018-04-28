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
    
    <body id="aboutBody">
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
        
        <header id="aboutBanner">
            <div class="bannerText"><h3><strong>About Us</strong></h3></div>
        </header>
        
        <main class="aboutMain">
            <section>
                <h3 class="aboutHeader">Who are we?</h3>
                <br>
                <p class="aboutIntro">iTech is a gaming hardware manufacturing company established in 2009 by Silvan Vella, with dual headquarters in Birgu and Xlendi. The company’s main headquarters is stationed in Malta  and it has been listed in the Hong Kong Stock Exchange since November 2017. iTech is one of the world's most recognizable and best-performing gaming brands and is also considered one of the pioneers of esports as well as one of the biggest brands in esports today.</p>
            </section>
            
            <section>
                <img class="staffImg" src="images/staff.jpg" alt="Staff">
            </section>
            
            <section class="accordionSec">
                <button class="accordion">Payment Methods</button>
                <div class="panel">
                    <p>At the moment we only accept PayPal, Visa and Master Card.</p>
                </div>

                <button class="accordion">Delivery Time</button>
                <div class="panel">
                    <p>Usually purchased items will take around 1 week or more to be delivered depending on your location.</p>
                </div>

                <button class="accordion">Refunds</button>
                <div class="panel">
                    <p>All purchased items can be refunded within one week of delivery and are still packaged.</p>
                </div> 

                <button class="accordion">How to update account information?</button>
                <div class="panel">
                    <p>To update your account information kindly send an email to the support team from the Contact Us Page.</p>
                </div>

                <button class="accordion">Registration</button>
                <div class="panel">
                    <p>You can register by navigating to the Sign in page and clicking on the "Create account?" link.</p>
                </div>
            </section>
        </main>
        
        <script src="js/script.js"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>


