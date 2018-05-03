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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body id="scBody">
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
                    <a class="nav-link active" href="contact.php"><img class="cart" src="images/cart.png"></a>
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
            <section>
               
               <table class='shoppingCartTbl'>
                                            <tr>
                                                <th>#</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th class='hrQuantity'>Quantity</th>
                                                <th>Delete</th>

                                            </tr>
               
                <?php
                   
                   function removeFromCart($pId) {
                       
                       $check = false;
                       
                        $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                            or die ("Cannot connect to database");

                        $query = "DELETE FROM shopping_cart WHERE scProductId = '$pId'";
                       
                        if (mysqli_query($conn, $query)) {
                            $check = true;
                        }
                       
                       return $check;
                   }
                   
                   function addToCart($cId, $pId) {
                       
                       $check = false;
                       
                       $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                            or die ("Cannot connect to database");

                        $query = "INSERT INTO shopping_cart(scClientId, scProductId, scQuantity)
                                VALUES('$cId', '$pId', '1')";

                        if(mysqli_query($conn, $query)) {
                            
                            $check = true;
                        }
                       
                       return $check;
                   }
                   
                    if (!empty($_GET['pid'])) {

                       $_SESSION['productId'] = $_GET['pid'];
                    }
                   
                    if (isset($_GET['pid'])) {
                        
                        $pId = $_SESSION['productId'];
                        
                    
                        if (isset($_SESSION['clientId'])) {
                            
                            $cId = $_SESSION['clientId'];
                            
                            if (addToCart($cId, $pId)) {
                                
                                echo "<script type='text/javascript'>swal('Item added!', 'The item has been added to the shopping cart', 'success');</script>";
                            }
                            
                            else {
                                echo "<script type='text/javascript'>swal('Error!', 'You have already added this product to the cart', 'error');</script>";
                            }
                        }
                    }
                
                    //else {
                        
                    if (isset($_SESSION['clientId'])) {
                            
                        $cId = $_SESSION['clientId'];
                            
                        $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                            or die ("Cannot connect to database");

                        $query = "SELECT * FROM product INNER JOIN shopping_cart ON product.pId = shopping_cart.scProductId 
                            INNER JOIN manufacturer ON manufacturer.mId = product.pManufacturerId 
                                WHERE shopping_cart.scClientId = '$cId'";
                        
                        $result = mysqli_query($conn, $query);
                            
                        if (mysqli_num_rows($result) > 0) {
                                
                            $counter = 0;
                                
                            while ($row = mysqli_fetch_row($result)) {
                                $counter++;
                                echo "<br>";
                                echo  "<tr>
                                            <td>$counter</td>
                                            <td>$row[13] $row[1]</td>
                                            <td>&euro;$row[3]</td>
                                            <td><input name='scQuantity' type='number' step='1' min='1' value='1' class='scQuantity'></td>
                                            <td><button class='scDelete'><a href='http://localhost/itech/cart.php?delPid=$row[0]'>Remove</a></button></td>
                                        </tr>";
                            }
                                
                            if (isset($_GET['delPid'])) {
                                    
                                $delPid = $_GET['delPid'];
                                    
                                if(removeFromCart($delPid)) {
                                    
                                    echo "<script type='text/javascript'>swal('Item Deleted!', 'The item has been removed from the shopping cart', 'success');</script>";
                                }
                            }
                        }
                            
                        else {
                             echo "<h3>Shopping Cart is empty</h3>";
                        }
                    }
                        
                    else {
                        echo "<br><h3 class='noResult'>You need to be logged in to access the shopping cart</h3><br>";
                    }
                    //}
                ?>
                </table>
            </section>
        </main>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>