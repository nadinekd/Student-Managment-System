<!DOCTYPE html>
<html lang="en">
<?php
require_once('Header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('DatabaseSMS.php');
require_once('Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);

$semester = $Admin->getSemesters();

$course = $Admin->getCourses();

$teacher = $Admin->getTeachers();

$schedule = $Admin->getSchedules();

$class = $Admin->getClasses();

?>
<style>
    body {
        background-color: gray;
    }

    .register {
        background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        margin-top: 3%;
        padding: 3%;
    }

    .register-left {
        text-align: center;
        color: #fff;
        margin-top: 4%;
    }

    .register-left input {
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        width: 60%;
        background: #f8f9fa;
        font-weight: bold;
        color: #383d41;
        margin-top: 30%;
        margin-bottom: 3%;
        cursor: pointer;
    }

    .register-right {
        background: #f8f9fa;
        border-top-left-radius: 10% 50%;
        border-bottom-left-radius: 10% 50%;
    }

    .register-left img {
        margin-top: 15%;
        margin-bottom: 5%;
        width: 25%;
        -webkit-animation: mover 2s infinite alternate;
        animation: mover 1s infinite alternate;
    }

    @-webkit-keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    @keyframes mover {
        0% {
            transform: translateY(0);
        }

        100% {
            transform: translateY(-20px);
        }
    }

    .register-left p {
        font-weight: lighter;
        padding: 12%;
        margin-top: -9%;
    }

    .register .register-form {
        padding: 10%;
        margin-top: 10%;
    }

    .btnRegister {
        float: right;
        margin-top: 10%;
        border: none;
        border-radius: 1.5rem;
        padding: 2%;
        background: #0062cc;
        color: #fff;
        font-weight: 600;
        width: 50%;
        cursor: pointer;
    }

    .register .nav-tabs {
        margin-top: 3%;
        border: none;
        background: #0062cc;
        border-radius: 1.5rem;
        width: 28%;
        float: right;
    }

    .register .nav-tabs .nav-link {
        padding: 2%;
        height: 34px;
        font-weight: 600;
        color: #fff;
        border-top-right-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }

    .register .nav-tabs .nav-link:hover {
        border: none;
    }

    .register .nav-tabs .nav-link.active {
        width: 100px;
        color: #0062cc;
        border: 2px solid #0062cc;
        border-top-left-radius: 1.5rem;
        border-bottom-left-radius: 1.5rem;
    }

    .register-heading {
        text-align: center;
        margin-top: 8%;
        margin-bottom: -15%;
        color: #495057;
    }
</style>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To AG University</h3>
                <P>We look forward to welcoming you to our campus soon!​</P>
                <form action="SignIn.php" method="POST">
                    <input type="submit" name="" value="SignOut" /><br />
                </form>
            </div>
            <div class="col-md-9 register-right">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Instructor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Table</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Registration Form</h3>

                                <form action="Insert_Course.php" method="POST">
                                    <div class="row register-form mx-0 px-0">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="Classname" placeholder="Classname" value="" required>

                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="semester" required>
                                                    <option disabled value="" selected hidden>Select Semester</option>
                                                    <?php
                                                    for ($i = 0; $i < count($semester); $i++) {
                                                    ?>
                                                        <option value="<?php echo $semester[$i]["SemesterId"] ?>"><?php echo $semester[$i]["SName"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="Course" required>
                                                    <option disabled value="" selected hidden>Select Course</option>
                                                    <?php
                                                    for ($i = 0; $i < count($course); $i++) {
                                                    ?>
                                                        <option value="<?php echo $course[$i]["CourseId"] ?>"><?php echo $course[$i]["CourseName"] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="teacher" required>
                                                    <option disabled value="" selected hidden>Select Instructor</option>
                                                    <?php
                                                    for ($i = 0; $i < count($teacher); $i++) {
                                                    ?>
                                                        <option value="<?php echo $teacher[$i]["TeacherId"] ?>"><?php echo $teacher[$i]["TFirstName"] . " " . $teacher[$i]["TLastName"] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <select class="custom-select" name="schedule" required>
                                                    <option disabled value="" selected hidden>Schedule Time</option>
                                                    <?php
                                                    for ($i = 0; $i < count($schedule); $i++) {
                                                    ?>
                                                        <option value="<?php echo $schedule[$i]["ScheduleId"] ?>"><?php echo $schedule[$i]["Time"] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>

                                            <input type="submit" class="btnRegister" value="Register" />

                                        </div>

                                    </div>
                            </div>
                            </form>

                        </div>
                    </div>

                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Table</h3>
                        <div class="row register-form">
                            <div class="col-md-6">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <table border="5" class="table-hover table-bordered width:fit content" id="Registration_table">

                                            <thead class="table-primary">

                                                <th> Class Name </th>
                                                <th> Semester </th>
                                                <th> Course </th>
                                                <th> Instructor </th>
                                                <th> Schedule </th>
                                                <th>Delete </th>
                                                <th> Edit </th>


                                            </thead>
                                            </span>
                                            <?php
                                            for ($i = 0; $i < count($class); $i++) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $class[$i]['ClassName']; ?> </td>
                                                    <td><?php echo $class[$i]['SName']; ?> </td>
                                                    <td><?php echo $class[$i]['CourseName']; ?> </td>
                                                    <td><?php echo $class[$i]['TFirstName'] . " " . $class[$i]['TLastName']; ?> </td>
                                                    <td><?php echo $class[$i]['Time']; ?> </td>
                                                    <td><a href="Delete_course_registration_form.php?id=<?php echo $class[$i]['ClassId']; ?>">Delete </a> </td>
                                                    <td><a href="Edit_course_registration_form.php?id=<?php echo $class[$i]['ClassId']; ?>">Edit </a> </td>
                                                </tr> <?php } ?>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>


        <?php
        require_once('Footer.php'); ?>

</body>

</html>