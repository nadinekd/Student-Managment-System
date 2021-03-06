<!DOCTYPE html>
<html lang="en">
<?php
require_once('Header.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('../Model/DatabaseSMS.php');
require_once('../Model/Admin.php');
$db = new DatabaseSMS();
$Admin = new Admin($db);

$semester = $Admin->getSemesters();

$course = $Admin->getCourses();

$teacher = $Admin->getTeachers();

$schedule = $Admin->getSchedules();

$class = $Admin->getClasses();

?>

<body>
    <div class=" register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome To Time Travel University</h3>
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

                                <form action="../Controller/Verify_Insert_Course.php" method="POST">
                                    <div class="row register-form mx-0 px-0 col-md-12">
                                        <div class="centering col-md-6">
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
                                            <?php if (isset($_GET["result"])) {
                                                echo $_GET["result"];
                                            } ?>
                                            <input type="submit" class="btnRegister" value="Register" />

                                        </div>

                                    </div>
                            </div>
                            </form>

                        </div>
                    </div>

                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Table</h3>
                        <div class=" register-form">

                            <div class="form-group">
                                <table border="5" class="table table-hover table-bordered width:fit content" id="Registration_table">

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
                                            <td><a href="../Controller/Delete_course_registration_form.php?id=<?php echo $class[$i]['ClassId']; ?>">Delete </a> </td>
                                            <td><a href="../View/Edit_course_registration_form.php?id=<?php echo $class[$i]['ClassId']; ?>">Edit </a> </td>
                                        </tr> <?php } ?>
                                </table>
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