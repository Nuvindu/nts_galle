<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once './includes/config.inc.php';
    require_once './includes/connect&functions.inc.php';

    // chechking for that actually user has press the submit button
    // else user can visit this page by url

    if (isset($_POST['submit'])) {
        $fname = trim($_POST['fname']); //removing extra white spaces
        $iname = $_POST['iname'];
        $birthday = $_POST['Birthday'];
        $NIC = $_POST['NIC'];
        $email = $_POST['email'];
        $password = $_POST['Password'];

        // data validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL) & !preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $email)) {
            header("Location: ../reg_students_fom.php?error=invalidemail&fname=" . $fname . "&iname=" . $iname . "&Birthday=" . $birthday . "&NIC=" . $NIC);
            die("wrong email");
        } elseif (!preg_match("/^[a-zA-Z0-9._-]*$/", $fname)) {
            header("Location: ../reg_students_fom.php?error=invalidemail&iname=" . $iname . "&Birthday=" . $birthday . "&NIC=" . $NIC . "&email=" . $email);
            die();
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $record = [
            'fname' => $fname,
            'iname' => $iname,
            'birthday' => $birthday,
            'NIC' => $NIC,
            'hash' => $hash,
            'email' => $email
        ];
        // record to be send to the database


        $db = connect(DB_HOST, DB_NAME, DB_USERNAME, DB_PASSWORD);

        setcookie("birthday", $birthday, time() + 3600, "/");
        setcookie("NIC", $NIC, time() + 3600, "/");
        setcookie("email", $email, time() + 3600, "/");
        setcookie("iname", $iname, time() + 3600, "/");
        setcookie("fname", $fname, time() + 3600, "/");

        $isnameexist = checkDuplicateName($db, $fname, $iname);
        $isemailexist = checkEmail($db, $email);
        $isNICexist = checkNIC($db, $NIC);
        if ($isnameexist) {
            // if name already in database
            unset($_COOKIE['iname']);
            unset($_COOKIE['fname']);
            setcookie('iname', null, -1, "/");
            setcookie('fname', null, -1, "/");
        }
        if ($isemailexist) {
            // if email already in database
            unset($_COOKIE['email']);
            setcookie('email', null, -1, "/");
        }
        if ($isNICexist) {
            // if NIC already in database
            unset($_COOKIE['NIC']);
            setcookie('NIC', null, -1, "/");
        }
        if ($isnameexist || $isNICexist || $isemailexist) {
            header("Location: ../reg_students_fom.php?error=true");
        } else {
            insertRecord($db, $record);
            header("Location: ../login.php");
        }


        $db->close();
    } else {
        header("Location: ../reg_students_fom.php");
        // if user try to enter without clicking submit button then redirext them to form again
    }
    ?>
</body>

</html>