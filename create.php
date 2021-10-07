<?php

require_once "Database.php";
 
$db = new Database();
$database = $db->getConnection();

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    // Validate username
        
        $sql = "SELECT ID FROM new_user WHERE Username = :username";
        
        if($stmt = $database->prepare($sql)){
            
            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            
            
            $param_username = $username;
            
            
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    echo "This username is already taken.";
                } else{
                    $username = trim($username);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            unset($stmt);
        }
    
    
 

try {

        $sql = "INSERT INTO new_user (Username, Firstname, Lastname, Email, address, Password) VALUES (:username, :firstname, :lastname, :email, :address, :password)";
 
        if($stmt = $database->prepare($sql)){

            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
            $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
            $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
            $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
            $param_firstname = $firstname;
            $param_lastname = $lastname;
            $param_email = $email;
            $param_address = $address;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if($stmt->execute()){
                header("location: login.html");
                exit();
            } else{
                $error = $stmt->errorInfo();
                throw new PDOException(2, $error);
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        unset($stmt);
    
} catch (PDOException $err) {
    $error_message = $err->getMessage();
    echo "<p>Error Message: $error_message</p>";
}
    unset($database);
}
?>