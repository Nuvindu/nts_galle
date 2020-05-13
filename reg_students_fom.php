<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style-reg-inputform.css">
    <title>Sign up</title>
</head>

<body>
    <div class="bg-image">
        <div class="header">
            <?php include './header.php' ?>
        </div>

        <div class="form-input">
            <div class="div-relative">
                <form action="./dbOperations/db_add_student.php" method="POST" id="form-props">
                    <label for="Full Name">Full Name:</label>
                    <input class="texbox-styles" type="text" name="fname" placeholder="Full name" value="<?php if (isset($_COOKIE['fname'])) {
                                                                                                                echo $COOKIE['fname'];
                                                                                                            }  ?>"
                        style="background: <?php if (!isset($_COOKIE['fname']) && $_GET['error'] === "true") { // if name already in database make txt area background red 
                                                                                                                                            echo "red";
                                                                                                                                        }  ?>"
                        required>
                    <br>


                    <label for="Name with initials">Name with initials:</label>
                    <input class="texbox-styles" type="text" name="iname" placeholder="Name with initials"
                        value="<?php if (isset($_COOKIE['iname'])) {
                                                                                                                        echo $_COOKIE['iname'];
                                                                                                                    }  ?>"
                        style="background: <?php if (!isset($_COOKIE['iname']) && $_GET['error'] === "true") { // if name already in database make txt area background red 
                                                                                                                                                    echo "red";
                                                                                                                                                }  ?>"
                        required>
                    <br>

                    <label for="Birthday">Birthday:</label>
                    <input class="texbox-styles" type="date" name="Birthday" value="<?php if (isset($_COOKIE['birthday'])) {
                                                                                        echo $_COOKIE['birthday'];
                                                                                    }  ?>" required>
                    <br>


                    <label for="NIC">NIC:</label>
                    <input class="texbox-styles" type="text" name="NIC" placeholder="NIC" value="<?php if (isset($_COOKIE['NIC'])) {
                                                                                                        echo $_COOKIE['NIC'];
                                                                                                    }  ?>"
                        style=" background: <?php if (!isset($_COOKIE['NIC']) && $_GET['error'] === "true") {
                                                                                                                                    // if name already in database make text area background red
                                                                                                                                    echo "red";
                                                                                                                                }  ?>" required>

                    <label for="email">Email</label>
                    <input class="texbox-styles" type="text" name="email" placeholder="Email" value="<?php if (isset($_COOKIE['email'])) {
                                                                                                            echo $_COOKIE['email'];
                                                                                                        }  ?>"
                        style=" background: <?php if (!isset($_COOKIE['email']) && $_GET['error'] === "true") {
                                                                                                                                        // if email already in database make text area background red
                                                                                                                                        echo "red";
                                                                                                                                    }  ?>" required>

                    <br>

                    <label for="Password">Password:</label>
                    <input class="texbox-styles" type="password" name="Password" id="password" placeholder="Password"
                        required>
                    <br>

                    <label for="rep-Password">Repeat Password:</label>
                    <input class="texbox-styles" type="password" name="rep-Password" id="rep-password"
                        placeholder="Retype password" required>
                    <!-- script for check confirmed password and password are identical -->
                    <script src="./js/confirm-pw.js"></script>
                    <br>

                    <input type="submit" class="button" value="submit" name="submit">


                </form>

            </div>

        </div>

    </div>

</body>

</html>