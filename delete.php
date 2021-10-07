<?php

require_once "Database.php";

$db = new Database();
$database = $db->getConnection();



if(isset($_POST["id"]) && !empty($_POST["id"])){
       
    $id = $_POST["id"];

try {

$sql = "UPDATE new_user SET Status = 'Deleted'  WHERE ID =:id";

if($stmt = $database->prepare($sql)){

    $stmt->bindParam(":id", $param_id);
    
    $param_id = $id;
    
    if($stmt->execute()){

    header("location: welcome.php");
    exit();

    } else{
        $error = $stmt->errorInfo();
        throw new PDOException($error[2]);
        echo "Oops! Something went wrong. Please try again later.";
    }
}
unset($stmt);

} catch (PDOException $err) {
    $error_message = $err->getMessage();
    echo "<p>Error Message: $error_message</p>";
}  

unset($database);
} else{

if(empty(trim($_GET["id"]))){

    header("location: error.php");
    exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <script type="text/javascript" src="script.js">
    </script>
</head>

<body>
    <h1> Delete User</h1>
    <hr>
    <div>
        <form action="delete.php" method="post">
            <div>
                <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">
                <p>Are you sure you want to delete this
                    record?</p><br>
                <p>
                    <input type="submit" value="Yes"> &nbsp;
                    <a href="welcome.php">No</a>
                </p>
            </div>
        </form>
    </div>
</body>

</html>