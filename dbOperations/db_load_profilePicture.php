<?php

require_once './includes/config.inc.php';
require_once './includes/connect&functions.inc.php';
$db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

$UserSessionName = $_POST['UserSessionName'];

$sql = "SELECT profile_picture_dir FROM student_details";
$sql .= " WHERE ";
$sql .= " id=? ";

$stmt = mysqli_stmt_init($db);
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo "sql statement error";
    printf("fatal error.please contact Admin immideately");
    exit();
} else {

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, 's', $UserSessionName);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);
}

$db->close();
echo json_encode($row);