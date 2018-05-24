<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>iTech - Reviews</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    
    <body id="commentsBody">
      
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
           
           <?php

               if (!empty($_GET['pid'])) {

                   $_SESSION['productId'] = $_GET['pid'];
               }

                $pId = $_SESSION['productId'];

                $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                        or die("Cannot connect to database");

                $query = "SELECT client.cltId, client.cltName, client.cltSurname, comment.cmtClientId, comment.cmtProductId, comment.cmtComment FROM client INNER JOIN comment ON client.cltId = comment.cmtClientId WHERE          comment.cmtProductId = '$pId'";

                $result = mysqli_query($conn, $query) or die ("Error in query: " . mysqli_error($conn));
            
                if (mysqli_num_rows($result) > 0) {
                    
                    while ($row =  mysqli_fetch_row($result)) {
                        
                        echo "<div class='commentDiv'><img src='images/user.jpg'><p class='commentName'>$row[1] $row[2]</p><p class='mainComment'>$row[5]</p><hr></div><br><br>";
                    }
                }

                else {
                    echo "<h2 class='noComments'>There is no comments for this product</h2>";
                }

                if (isset($_POST['submitBtn'])) {
                    
                    function checkInput($data) {
            
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }
                    
                    if (!empty($_SESSION['clientId'])) {
                        
                        $cId = $_SESSION['clientId'];
                        
                        $comment = addslashes(checkInput($_POST['comment']));
                        
                        if (!empty($comment)) {
                            
                            $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                            or die("Cannot connect to database");
                            

                            $query = "INSERT INTO comment(cmtClientId, cmtProductId, cmtComment)
                                VALUES('$cId', '$pId', '$comment')";

                            if (mysqli_query($conn, $query)) {
                                
                                header("Refresh:0");
                            }

                            else {
                                echo "<script type='text/javascript'>swal('Error!', 'You have already reviewed this product', 'error');</script>";
                            }
                        }
                        
                        else {
                            echo "<script type='text/javascript'>swal('Error!', 'Comment box must not be empty', 'error');</script>";
                        }
                    }
                    
                    else {
                        echo "<script type='text/javascript'>swal('Error!', 'Must be logged in to comment', 'error');</script>";
                    }     
                }   
            ?>
            
            <form class="ratingForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
              <div class="ratingDiv">
                
                 <select name="rateNumber">
                   <option value="1">1</option>
                   <option value="2">2</option>
                   <option value="3">3</option>
                   <option value="4">4</option>
                   <option value="5">5</option>
               </select>
               <input name="ratingBtn" type="submit" value="Rate">
                  
              </div>
            </form>
            
            <?php
                
                $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                        or die("Cannot connect to database");

                $query = "SELECT ROUND(AVG(prRating), 1) FROM product_rating WHERE prProductId = $pId";
            
                $result = mysqli_query($conn, $query);
                
            
                $row = mysqli_fetch_row($result);
            
                if (!empty($row[0])) {
                    echo "<p class='productRating'>Rating: $row[0]</p>";
                }
            
                else {
                    
                    echo "<p class='productRating'>No ratings</p>";
                }
            
                if (isset($_POST['ratingBtn'])) {
                    
                    $rating = $_POST['rateNumber'];
                    
                    if (isset($_SESSION['clientId'])) {
                        
                        $cId = $_SESSION['clientId'];
                        
                        $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                        or die ("Cannot connect to the database");
                        
                        $query = "INSERT INTO product_rating (prClientId, prProductId, prRating)
                            VALUES('$cId', '$pId', '$rating')";
                        
                        $result = mysqli_query($conn, $query);
                        
                        if ($result) {
                            echo "<script type='text/javascript'>swal('Success!', 'Your rating has been recorded', 'success');</script>";
                        }
                        
                        else {
                            echo "<script type='text/javascript'>swal('Error!', 'You already rated this product', 'error');</script>";
                        }
                    }
                    
                    else {
                        echo "<script type='text/javascript'>swal('Error!', 'Must be logged in to rate a product', 'error');</script>";
                    }
                }
            ?>
           
            <form class="commentForm" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <textarea name="comment" class="commentTxt" placeholder="Write a review..." rows="4" cols="50"></textarea>
                <br>
                <input class="commentSubmit" name="submitBtn" type="submit" value="Submit">
            </form>
            
        </main>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>