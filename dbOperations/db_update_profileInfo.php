<?php
require_once './includes/config.inc.php';
require_once './includes/connect&functions.inc.php';
$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$name = $_POST['name'];
$email = $_POST['email'];
$NIC = $_POST['NIC'];
$UserSessionName = $_POST['UserSessionName'];



$sql = "UPDATE student_details";
$sql .= " SET ";
$sql .= "fname=?,";
$sql .= "email=?,";
$sql .= "NIC=?";
$sql .= " WHERE ";
$sql .= "id=?";

$stmt = mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql statement error";
    printf("fatal error.please contact Admin immideately");
    exit();
} else {
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $NIC, $UserSessionName);
    mysqli_stmt_execute($stmt);
    printf("rows updated: %d\n", mysqli_stmt_affected_rows($stmt));
}

$db->close();