<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>iTech - Products</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body id="productsBody">
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
        
        <form class="filterForm" method="post" action="filter.php">          
           <div class="radio1ColourDiv">
               <input class="radio1" type="radio" name="colour" value="2">White
           </div>
           
            <div class="radio2ColourDiv">
                <input class="radio2" type="radio" name="colour" value="1" checked>Black
            </div>
            
            <div class="radio1CategoryDiv">
               <input class="radio1" type="radio" name="category" value="2">Mats<br>
           </div>
           
            <div class="radio2CategoryDiv">
                <input class="radio2" type="radio" name="category" value="1" checked>Mouse<br>
            </div>
            
            <div class="radio3CategoryDiv">
               <input class="radio1" type="radio" name="category" value="4">Headset<br>
           </div>
           
            <div class="radio4CategoryDiv">
                <input class="radio2" type="radio" name="category" value="3" checked>Keyboard<br>
            </div>
            <br><br>
            <input class="filterBtn" type="submit" name="filter" value="Filter">
        </form>
        
 
        <main class="prodMain">  
            <?php
                
                if (isset($_POST['filter'])) {
                echo "<br><h2 class='noResult'>Filtered results</h2>";
                $colour = $_POST['colour'];
                $category = $_POST['category'];

                $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                or die("Cannot connect to database");

                $query = "SELECT * FROM product WHERE pColourId = '$colour' AND pCategoryId = '$category' AND pStock > '0'";

                $result = mysqli_query($conn, $query);

                    if(mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {

                            echo "<div class='product'>
                                        <a href='http://localhost/itech/reviews.php?pid=$row[pId]'><img src='$row[pImage]'></a>
                                        <h3><a class='prodTitle' href='http://localhost/itech/reviews.php?pid=$row[pId]'>$row[pName]</a></h3>
                                        <hr>
                                        <p class='price'>Price: &euro;$row[pPrice]</p>
                                        <p>Stock: $row[pStock]</p>
                                        <p>$row[pDescription]</p>
                                        <a href='http://localhost/itech/cart.php?pid=$row[pId]'><button class='prodButton'>Add to Cart</button></a>
                                  </div>";
                            }
                    }

                    else {

                        echo "<h3 class='noResult'>No results matched those filtering options</h3>";
                    }
                }
            
            ?>
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>