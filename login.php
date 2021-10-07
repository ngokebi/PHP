<?php

session_start();
 
if ((isset($_SESSION["id"])) && (isset($_SESSION["loggedin"]) === true)) {
    header("location: welcome.php");
}
 

require_once "Database.php";

$db = new Database();
$database = $db->getConnection();
 

if(isset($_POST["submit"])){
 
$username = $_POST["username"];
$password = $_POST["password"];

        $sql = "SELECT ID, Username, Password FROM new_user WHERE Username = :username";
        
        if($stmt = $database->prepare($sql)){

            $stmt->bindParam(":username", $param_username, PDO::PARAM_STR);
            

            $param_username = trim($_POST["username"]);
            

            if($stmt->execute()){

                if($stmt->rowCount() == 1){
                    if($row = $stmt->fetch()){
                        $id = $row["ID"];
                        $username = $row["Username"];
                        $hashed_password = $row["Password"];
                        if(password_verify($password, $hashed_password)){

                            session_start();    

                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: welcome.php");
                        } else{

                            echo "Invalid username or password.";
                            header("location: login.html");
                        }
                    }
                } else{

                    echo "Invalid username or password.";
                    header("location: login.html");
                }
            } else{
                    $error = $stmt->errorInfo();
                    throw new PDOException($error, 2);
                echo "Oops! Something went wrong. Please try again later.";
                header("location: login.html");
            }


            unset($stmt);
        
    }
    

    unset($database);
}
?>