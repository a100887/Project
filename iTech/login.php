<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>iTech - Home</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body id="loginBody">
        <nav class="stroke" id="mainNav">
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </nav>
        
        <main>
           <br><br>
            <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                <div class="loginForm">
                   <h2 class="formTitle">Member Login</h2>
                    <div class="formInputs">
                        <input type="email" placeholder="Email" name="email">
                        <br>
                        <input type="password" placeholder="Password" name="password">
                        <br>
                        <input class="logBtn" type="submit" value="Login" name="submit">
                        <br>
                        <div class="userReg"><a href="registration.php">Create an account?</a></div>
                    </div>
                </div>
            </form>
            
            <?php
            
                if(isset($_POST['submit'])) {
                    
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                        or die("Cannot connect to database");
                    $query = "SELECT * FROM client WHERE cltEmail = '$email' AND BINARY cltPassword = '$password'";

                    $result = mysqli_query($conn, $query);

                    if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_row($result);
                        $clientId = $row[0];
                        session_start();
                        $_SESSION['clientId'] = $clientId;
                        header('Location: index.php');
                    }

                    else {
                        echo "<script type='text/javascript'>swal('Error!', 'Incorrect credentials', 'error');</script>";
                    }
                }
            ?>
            
        </main>
  
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    </body>
</html>


