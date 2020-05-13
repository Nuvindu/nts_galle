<?php session_start(); ?>
<?php
require_once './dbOperations/includes/config.inc.php';
require_once './dbOperations/includes/connect&functions.inc.php';
?>
<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Side Navigation Bar</title>
    <link rel="stylesheet" type="text/css" href="css/user-page.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>

    <div class="wrapper">
        <div class="sidebar">
            <h2>Moodle</h2>
            <ul>
                <li><a href="#"><i class="fas fa-home"></i>Dashboard</a></li>
                <li><a href="#"><i class="fas fa-user"></i>Profile</a></li>
                <li><a href="#"><i class="fas fa-address-card"></i>About</a></li>
                <li><a href="#"><i class="fas fa-project-diagram"></i>Exams</a></li>
                <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
                <li><a href="#"><i class="fas fa-address-book"></i>Hostel Info</a></li>
                <li><a href="student-profile.php"><i class="fas fa-map-pin"></i>Student Details</a></li>
            </ul>
        </div>
        <div class="main_content">
            <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log Out</a>
            </div>
            <div class="header">Semester Modules</div>

            <div id="courses">
                <div class="antomy">
                    <br><br>
                    <h3> Human Anatomy</h3>
                    <a href="#"><button class="apply">Go to this module</button></a>
                    <p>This course is designed to help students appreciate the normal structure of the human body and
                        apply this knowledge in nursing. The students will be exposed to the cell structure, embryology,
                        the circulatory, respiratory and digestive systems. Students will also be exposed to preserved
                        body structures to aid understanding. Diagrams of anatomical structures will also be presented
                        as part of the course. There will be concurrent practical sessions. </p>
                </div>
                <div class="Physiology">
                    <br><br>
                    <h3>Human Physiology</h3>
                    <a href="#"><button class="apply">Go to this module</button></a>
                    <p>This course is designed to give students in-depth knowledge in the general function and
                        physiological processes of the normal human body. Students will study the functions and specific
                        biophysiochemical properties of organs in the circulatory, respiratory and digestive systems as
                        well as metabolisms. There will be concurrent practical sessions.</p>

                </div>
                <div class="Mental Health">
                    <br><br>
                    <h3>Intoduction to Mental Health Nursing</h3>
                    <a href="#"><button class="apply">Go to this module</button></a>
                    <p>This course introduces students to the history, processes and methods of community health
                        nursing. Students will also discuss the concept of health, personal and environmental health.
                        They will develop competencies in promoting health in the community and managing home accidents.
                        The students will be expected to select a community or group and examine their environmental
                        health practices.</p>

                </div>
                <div class="Emergency nursing">
                    <br><br>
                    <h3>Emergency Nursing</h3>
                    <a href="#"><button class="apply">Go to this module</button></a>
                    <p>The course introduces students to the various types of trauma and their management. It will also
                        equip the students with knowledge and skills that can be utilized to provide safety / emergency
                        care to individuals in the community. The course would include practical sessions in the
                        laboratory and students would be expected to do return demonstration on competencies
                        demonstrated.</p>

                </div>
                <div class="health Assement">
                    <br><br>
                    <h3>Principles and Practice of Health Assement</h3>
                    <a href="#"><button class="apply">Go to this module</button></a>
                    <p>The course is designed to equip students with knowledge and skills in carrying out comprehensive
                        health assessment. Students will be taken through the physical assessment of the human body in
                        relation to the various body systems. They will gain competency in determining normal and
                        abnormal functioning of organs and systems. The course will consist of classroom teaching and
                        skills demonstration.</p>

                </div>
            </div>
        </div>
    </div>


</body>

</html>
<?php mysqli_close($connection); ?>