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
    <body id="contactBody">
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
        
        <main>
         <div class="wrapperContact">
                <div id="map"></div>

                <script>
                    function initMap() {
                        
                        var options = {
                            zoom: 14,
                            center: {lat:35.888110 , lng: 14.521507}
                        }

                        var map = new google.maps.Map(document.getElementById('map'), options);

                        var marker = new google.maps.Marker({
                            position: {lat:35.888110 , lng: 14.521507}, map:map
                        });
                    }
                </script>

                <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgLplKDLMyISZcbzk_895DSftv8yKY4Kc&callback=initMap">
                </script>

                <form class="contactForm" method="post" action="send.php">
                    <input name="contactName" class="contactIn" type="text" placeholder="Name" required pattern="[A-Za-z]{3,}" title="Must contain alpabetical characters e.g John">
                    <br>
                    <input name="contactEmail" class="contactIn"  type="email" placeholder="Email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Email must be in the correct format">
                    <br>
                    <textarea name="contactMessage" placeholder="Write your message here..." class="contactIn" required cols="30" rows="10"></textarea>
                    <br>
                    <input name="contactSubmit" class="contactSubmit" type="submit" value="Submit">
                </form>
            </div>
        </main>
  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>
