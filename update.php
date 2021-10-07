<?php

require_once "Database.php";

$db = new Database();
$database = $db->getConnection();



if(isset($_POST["id"]) && !empty($_POST["id"])){

$username = $_POST["username"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$email = $_POST["email"];
$address = $_POST["address"];

$id = $_POST["id"];

try {
 

    $sql = "UPDATE new_user SET Username=:username, Firstname=:firstname, Lastname=:lastname, Address=:address, Email=:email WHERE ID =:id";

    if($stmt = $database->prepare($sql)){

        $stmt->bindParam(":username", $param_username);
        $stmt->bindParam(":firstname", $param_firstname);
        $stmt->bindParam(":lastname", $param_lastname);
        $stmt->bindParam(":address", $param_address);
        $stmt->bindParam(":email", $param_email);
        $stmt->bindParam(":id", $param_id);
        

        $param_username = $username;
        $param_firstname = $firstname;
        $param_lastname = $lastname;
        $param_address = $address;
        $param_email =$email;
        $param_id = $id;
        

        if($stmt->execute()){

            header("location: welcome.php");
            exit();
        } else{

            $error = $stmt->errorInfo();
            throw new PDOException($error[2]);
            echo "Oops! Something went wrong. Please try again later.";
        }
    
     
    unset($stmt);
}

} catch (PDOException $err) {
    $error_message = $err->getMessage();
    echo "<p>Error Message: $error_message</p>";
}  
    unset($database);
} 

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <script type="text/javascript" src="script.js">
    </script>
</head>

<body>
    <div>
        <p style="font-family: Century Gothic; font-size: 15px;"> Update your Profile</p>
    </div>
    <?php

$id =  $_GET["id"];

$sql = "SELECT * FROM new_user WHERE ID=:id";

if($stmt = $database->prepare($sql)){
    $stmt->bindParam(":id", $param_id);   
    $param_id = $id;
    $stmt->execute();

            while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {      
            $username = $row["Username"];
            $firstname = $row["Firstname"];
            $lastname = $row["Lastname"];
            $email = $row["Email"];
            $address = $row["Address"];
    }
}
?>
    <hr>
    <fieldset>
        <legend style="font-family: Century Gothic; font-size: 15px;">Update the Form</legend>
        <form action="update.php?id=<?php $id; ?>" method="POST" name="updateForm" onsubmit="return update()">
            <div>
                <label for="username" style="font-family: Century Gothic; font-size: 15px;"> Username:</label><br>
                <input type="text" name="username" id="username" value="<?php echo $username; ?>" size="30"
                    style="font-family: Century Gothic; font-size: 15px;">
                <div class="error" id="usernameErr"></div>
            </div>
            <div>
                <label for="firstname" style="font-family: Century Gothic; font-size: 15px;"> Firstname:</label><br>
                <input type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>" size="30"
                    style="font-family: Century Gothic; font-size: 15px;">
                <div class="error" id="firstnameErr"></div>
            </div>
            <div>
                <label for="lastname" style="font-family: Century Gothic; font-size: 15px;"> Lastname:</label><br>
                <input type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>" size="30"
                    style="font-family: Century Gothic; font-size: 15px;">
                <div class="error" id="lastnameErr"></div>
            </div>
            <div>
                <label for="email" style="font-family: Century Gothic; font-size: 15px;"> Email:</label><br>
                <input type="email" name="email" id="email" value="<?php echo $email; ?>" size="30"
                    style="font-family: Century Gothic; font-size: 15px;">
                <div class="error" id="emailErr"></div>
            </div>
            <div>
                <label for="address" style="font-family: Century Gothic; font-size: 15px;"> Address:</label><br>
                <textarea name="address" id="address" cols="35" rows="5"
                    style="font-family: Century Gothic; font-size: 15px;"><?php echo $address; ?></textarea>
                <div class="error" id="addressErr"></div>
            </div>
            <div>
                <br>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" value="Update your Account" 
                    style="font-family: Century Gothic; font-size: 15px;">
                    <a href="welcome.php"><input type="button" value="Back"></a>
                <input type="reset" value="Reset" name="reset" style="font-family: Century Gothic; font-size: 15px;" onclick="location.reload()">

            </div>
        </form>
    </fieldset>
</body>

</html>