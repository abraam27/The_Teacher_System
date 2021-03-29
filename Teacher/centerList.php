<?php
    //require_once 'TeacherSession.php';
    require_once '../model/center.php';
    require_once '../model/session.php';
    require_once '../lib/student.php';
    require_once '../template/TeacherTemplate/head.tpl';
    if(isset($_POST['finish'])){
        $session = Session::readById($_SESSION["sessionID"]);
        unset($_SESSION['sessionID']);
    }
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Centers & Sessions
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Centers & Sessions / <a href="addCenter.php">Add Center</a>
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['finish'])){
        //collect data
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $level = $session['level'];
        $stage = $session['stage'];
        $type = $session['type'];
        $school = $_POST['school'];
        $district = $_POST['district'];
        $gender = $_POST['gender'];
        $phoneNO = $_POST['phoneNO'];
        $ownerPhoneNo = $_POST['ownerPhoneNo'];
        $email = $_POST['email'];
        $password = Student::generatePassword();
        $sessionID = $session['sessionID'];
        $student = new Student($firstName, $middleName, $lastName, $level, $stage, $type, $school, $district, $gender, $phoneNO, $ownerPhoneNo, $email, $password, $sessionID);
        if(is_numeric($student->addStudent())){
            echo '<div class="container greenMessage">
                    <p>The Student Info has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Student Info did not Save <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
        }
    }
    if(is_numeric($_GET['id'])){
        $centerID  = $_GET['id'];
        // handel center delete
    }
?>
<section>
    <div class="container">
        <!--  Content -->	
        <?php
            $count = 1;
            $centers = Center::readAll();
            if(is_array($centers) && count($centers)>0){
                foreach ($centers as $center) {
                    echo '<ul class="form-section page-section">
                            <li id="cid_10" class="form-input-wide" data-type="control_head">
                                  <div class="form-header-group ">
                                    <div class="header-text httal htvam">
                                          <h1 id="header_10" class="form-header" data-component="header">
                                            <a href="centerDetails.php?id='.$center['centerID'].'">'.$center['name'].'</a>
                                          </h1>
                                    </div>
                                  </div>
                            </li>
                          </ul>
                          <table class="table">
                              <thead class="thead-dark">
                                  <tr>
                                      <th scope="col">Session #</th>
                                      <th scope="col">Session Day</th>
                                      <th scope="col">Session Time</th>
                                      <th scope="col">Level</th>
                                      <th scope="col">Stage</th>
                                      <th scope="col">Type</th>
                                      <th scope="col"># of Students</th>
                                      <th scope="col">VIEW</th>
                                  </tr>
                              </thead>
                              <tbody>';
                    $sessions = Session::retrieveAllSessionByCenterID($center['centerID']);
                    if(is_array($sessions) && count($sessions)>0){
                        foreach ($sessions as $session) {
                            echo '<tr>
                                    <th scope="row">'.$count++.'</th>
                                    <td>'.$session['day'].'</td>
                                    <td>'.$session['time'].'</td>
                                    <td>'.$session['level'].'</td>
                                    <td>'.$session['stage'].'</td>
                                    <td>'.$session['type'].'</td>
                                    <td>'.Student::countStudentsInSession($session['sessionID']).'</td>
                                    <td><a href="sessionDetails.php?id='.$session['sessionID'].'">VIEW</a></td>
                                </tr>';
                        }
                    }else{
                        echo '<tr>
                                <td colspan="8" style="text-align:center" scope="row"> There is no Sessions !!!</td>
                            </tr>';
                    }
                    echo '</tbody>
                        </table>';
                }
            }
        ?>
    </div>
</section>
<?php
    require_once '../template/TeacherTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
