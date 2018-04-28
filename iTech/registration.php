<?php
    $conn = mysqli_connect("localhost", "root", "", "itech_db") 
        or die("Cannot connect to database");

    $query = "SELECT * FROM country";

    $result = mysqli_query($conn, $query) 
        or die ("Error in query" . mysqli_error($conn));;
?>

<!DOCTYPE html>
<html lang="EN">
<head> <!--head information-->
	<meta charset="UTF-8"/>
	<title>Enter details</title>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	 <link rel="stylesheet" href="css/style.css">
	 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
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
	<div class='container'>
        <h1 class="regHeader">Register</h1>
        <br>
        <form method="post" action="<?php $_SERVER['PHP_SELF'];?>">
           
            <div class='form-group row'>
                <label for="name" class='col-sm-2'>First Name:</label>
                <input pattern="[A-Za-z]{1,}" title="Characters must be alpabethic E.g. John" required type="text" id="name" name="name" class='form-control col-sm-10'/>
            </div>
            
            <div class='form-group row'>
                <label for="lastname" class='col-sm-2'>Last Name:</label>
                <input pattern="[A-Za-z]{1,}" title="Characters must be alpabethic E.g. Doe" required type="text" id="lastname" name="lastname" class='form-control col-sm-10'/>
            </div>
            
            <div class='form-group row'> <!--later-->
                <label for="email" class='col-sm-2'>Email:</label>
                <input required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Must match (characters@characters.domain)" type="email" id="email" name="email" class='form-control col-sm-10'/>
            </div>
            
            <div class='form-group row'>
                <label for="pwd" class='col-sm-2'>Password:</label>
                <input required pattern=".{6,}" title="Six or more characters" type="password" id="pwd" name="password" class='form-control col-sm-10'/>
            </div>
            
             <div class='form-group row'>
                <label for="houseNo" class='col-sm-2'>House Number:</label>
                <input required type="number" id="houseNo" name="houseNo" class='form-control col-sm-10'/>
            </div>
            
            <div class='form-group row'>
                <label for="street" class='col-sm-2'>Street:</label>
                <input required pattern="[A-Za-z]{1,}" title="Characters must be alpabethic" type="text" id="street" name="street" class='form-control col-sm-10'/>
            </div>
            
            <div class='form-group row'>
    
                <label for="locality" class='col-sm-2'>Locality:</label>
                <input required pattern="[A-Za-z]{1,}" title="Characters must be alpabethic" type="text" id="locality" name="locality" class='form-control col-sm-10'/>
            </div>
            
            <div class='form-group row'>
               <label for="country" class='col-sm-2'>Country:</label>
                <select name="country" id="country" class='form-control col-sm-10'>
                    <?php
                        while($row = mysqli_fetch_assoc($result)) {
                            
                            echo "<option value='$row[ctyId]'>$row[ctyName]</option>";
                        }
                    ?>
                </select>
            </div>
            
            <div class='form-group row'>
                <label for="phoneNo" class='col-sm-2'>Phone:</label>
                <input required type="number" id="phoneNo" name="phoneNo" class='form-control col-sm-10'/>
            </div>
            
            <!--buttons-->
            <div class='form-group'>
                <input type="submit" name="submitBtn" value="Submit" class='btn btn-primary'/>
                <input type="reset" value="Reset fields" class='btn btn-default'/>
            </div>
        </form>	
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>

<?php
    
    if(isset($_POST['submitBtn'])) {
        
        function checkInput($data) {
            
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        
        function isRegistered($email) {
            
            $check = false;
            
            $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                        or die("Cannot connect to database");
                
            $query = "SELECT * FROM client WHERE cltEmail = '$email'";
                
            $result = mysqli_query($conn, $query);
                    
            if(mysqli_num_rows($result) > 0) {
                            
                $check = true;
            }
            
            return $check;
        }
        
        function validation($name, $surname, $email, $password, $houseNo, $street, $locality, $countryId, $phone) {
            
            $check = false;
        
            if (!empty($name && $surname && $email && $password && $houseNo && $street && $locality && $phone)) {
                
                
                //if ((is_numeric($houseNo) && is_numeric($phone)) && (!(is_numeric($name) && is_numeric($surname) && is_numeric($street) && is_numeric($locality)))) {
                    //$check = true;
                //}
                
                $check = true;
                        
            }
            
            return $check;
        }
        
        $name = checkInput($_POST['name']);
        $surname = checkInput($_POST['lastname']);
        $email = checkInput($_POST['email']);
        $password = checkInput($_POST['password']);
        $houseNo = checkInput($_POST['houseNo']);
        $street = checkInput($_POST['street']);
        $locality = checkInput($_POST['locality']);
        $phone = checkInput($_POST['phoneNo']);
        $countryId = checkInput($_POST['country']);
        
        if (validation($name, $surname, $email, $password, $houseNo, $street, $locality, $countryId, $phone)) {
            
            if (isRegistered($email)) {
                echo "<script type='text/javascript'>swal('Error!', 'Email already exists', 'error');</script>";
            }
                
            else {
                            
                $conn = mysqli_connect("localhost", "root", "", "itech_db") 
                    or die("Cannot connect to database");
                
                $query = "INSERT INTO client (cltName, cltSurname, cltEmail, cltPassword, cltHouseNo, cltStreetAddress, cltLocality, cltCountryId, cltPhoneNo)
                    VALUES('$name', '$surname', '$email', '$password', '$houseNo', '$street', '$locality', '$countryId', '$phone')";
                
                $result = mysqli_query($conn, $query);
                            
                if ($result) {
                    echo "<script type='text/javascript'>swal('Success!', 'Registration Completed', 'success');</script>";
                }
                            
                else {
                    echo "<script type='text/javascript'>swal('Error!', 'Registration failed', 'error');</script>";
                }
            }
        }
        
        else {
            echo "<script type='text/javascript'>swal('Error!', 'Fields must not be empty', 'error');</script>";
        }
    }
?>
