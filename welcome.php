<?php

session_start();
 

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.html");
    exit;
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website</title>
    <link rel="stylesheet" href="style.css" type="text/css" media="screen">
    <script type="text/javascript" src="script.js">
    </script>
</head>
<body>
    <fieldset>
    <legend>Details of User</legend>
    <table>
    <caption>List of Account Holders</caption>
        <thead>
        <tr>
            <td>ID</td>
            <td>Firstname</td>
            <td>Lastname</td>
            <td>Email</td>
            <td>Address</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        <?php
require_once "Database.php";

$db = new Database();
$database = $db->getConnection();

try {
    $sql = "SELECT * FROM new_user WHERE Status = 'Active'";
$id = 0;
if($result = $database->query($sql)){
    if($result->rowCount() > 0){
        while($row = $result->fetch()){
            $id++;
            ?>
<tr>
    <td> <?php echo $id; ?> </td>
    <td> <?php echo $row["Firstname"]; ?> </td>
    <td> <?php echo $row["Lastname"]; ?> </td>
    <td> <?php echo $row["Email"]; ?> </td>
    <td> <?php echo $row["Address"]; ?> </td>
    <td>
        <a href="delete.php?id=<?php echo $row['ID']; ?>"> Delete </a>&nbsp;
        <a href="update.php?id=<?php echo $row['ID']; ?>"> Update </a>
    </td>
</tr>
            <?php
        }

    unset($result);
} else{
    echo 'No records were found';
}
} else{
    // $error = $stmt->errorInfo();
    // throw new PDOException(2, $error);
echo "Oops! Something went wrong. Please try again later.";

}

} catch (PDOException $err) {
    $error_message = $err->getMessage();
    echo "<p>Error Message: $error_message</p>";
}

unset($database);
?>
        </tbody>
    </table>
    <hr>
    <a href="">Reset Your Password</a> 
        <a href="logout.php">Sign Out</a>
    </fieldset>
</body>
</html>