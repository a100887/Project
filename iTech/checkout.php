<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>iTech - Checkout</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body id="checkoutBody">
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
        
        <header class="invoiceHeader">
           
            <h2 class="headerTitle">INVOICE</h2>
            
            <div class="companyInformation">
                <p>21 555 765</p>
                <p>itech@company.com</p>
                <p>www.itech.com</p>
            </div>
        </header>
        
        <main>
           
           <?php
            
            function clearCart($cId) {
                $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                    or die("Cannot connect to database");
                
                $query = "DELETE FROM shopping_cart WHERE scClientId = $cId";
                
                if(!mysqli_query($conn, $query)) {
                    echo "Clearing of cart failed: " . mysqli_error($conn);
                }
            }
                
                if (isset($_SESSION['clientId'])) {
                    
                    $cId = $_SESSION['clientId'];
                    
                    $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                    or die("Cannot connect to database");
            
                    $query = "SELECT * FROM country INNER JOIN client ON country.ctyId= client.cltCountryId WHERE client.cltId = '$cId'";
                    
                    $result = mysqli_query($conn, $query);
                    
                    if ($result) {
                        
                        if($row = mysqli_fetch_row($result)) {
                            
                            echo "<div class='customerInfo'>
                                    <span>Billed To:</span>
                                    <p>$row[3] $row[4]</p>
                                    <p>$row[7], $row[8]</p>
                                    <p>$row[9], $row[1]</p>
                                </div>";
                        }
                        
                        
                    }
        
                    $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                        or die ("Cannot connect to database");

                    $query = "SELECT manufacturer.mName, product.pName, product.pPrice, product.pStock, shopping_cart.scQuantity, shopping_cart.scProductId FROM product INNER JOIN shopping_cart ON product.pId = shopping_cart.scProductId INNER JOIN manufacturer ON product.pManufacturerId = manufacturer.mId WHERE shopping_cart.scClientId = '$cId'";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        
                        echo "<div class='clear'></div>";
                        echo "<table class='checkoutTbl'>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Item Cost</th>
                                    <th>Quantity</th>
                                    <th>Transaction</th>
                                </tr>";

                        $totPrice = 0;
                        
                        $transaction = "";

                        while($row = mysqli_fetch_row($result)) {

                            if ($row[3] < $row[4]) {
                                $transaction = "Insufficient stock";
                            }

                           else {
                               $updateStmt = "UPDATE product SET pStock = $row[3]-$row[4] WHERE pId = $row[5]";

                               if (mysqli_query($conn, $updateStmt)) {
                                   $totPrice += $row[2] * $row[4];
                                   $transaction = "Paid";
                               }

                                else {
                                    echo mysqli_error($conn);
                                }
                            }
                            
                            echo "<tr>
                                    <td>$row[0] $row[1]</th>
                                    <td>&euro;$row[2]</th>
                                    <td>$row[4]</th>
                                    <td>$transaction</th>
                                </tr>";
                        }
                        
                        echo "</table>";
                        
                        echo "<div class='invoicePrice'>
                            <p>Total Price:</p>
                            <p class='price'>&euro;$totPrice</p>
                        </div>";
                        
                        clearCart($cId);
                    }
                    
                    else {
                        header("Location: cart.php");
                    }
                }
            
                else {
                    header("Location: cart.php");
                }
            ?> 
        </main>
        
        <script src="js/script.js"></script> 
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>