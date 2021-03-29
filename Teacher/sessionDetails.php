<?php
    //require_once 'TeacherSession.php';
    require_once '../model/session.php';
    require_once '../model/center.php';
    require_once '../lib/student.php';
    if(is_numeric($_GET['id'])){
        $sessionID = $_GET['id'];
    }
    require_once '../template/TeacherTemplate/head.tpl';
?>
    <style>
        .leftTable th{
            text-align: left
        }
        .leftTable td{
            text-align: left
        }
    </style>
<?php
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Session Details
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Session Details / <a href="centerDetails.php?id=<?php echo $sessionID;?>">Delete Session</a> / <a href="addStudent.php?id=<?php echo $sessionID;?>">Add Student</a>
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<!--  Content -->
<section>
    <div class="container">
        <!--  Content -->
        <?php
            $session = Session::readById($sessionID);
            $center = Center::readById($session['centerID']);
            $students = Student::retreiveAllStudentsBysessionID($session['sessionID']);
            $count;
            if(is_array($students) && count($students)>0){
                $count = count($students);
            }else{
                $count = 0;
            }
            echo '<div style="height:50px"></div>
                <table class="table leftTable">
                    <tbody>
                        <tr>
                            <th scope="row"> Day : </th>
                            <td width="700px">'.$session['day'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Time : </th>
                            <td>'.$session['time'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> lavel : </th>
                            <td>'.$session['level'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Stage : </th>
                            <td>'.$session['stage'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Type : </th>
                            <td>'.$session['type'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Center Name : </th>
                            <td><a href="centerDetails.php?id='.$center['centerID'].'">'.$center['name'].'</a></td>
                        </tr>
                        <tr>
                            <th scope="row"> NO of Students : </th>
                            <td>'.$count.'</td>
                        </tr>
                    </tbody>
                </table>';
            echo '<ul class="form-section page-section">
                    <li id="cid_10" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                              <h1 id="header_10" class="form-header" data-component="header">
                                Student List
                              </h1>
                          </div>
                        </div>
                    </li>
                </ul>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col"> Student ID </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> School </th>
                            <th scope="col"> District </th>
                            <th scope="col"> Phone </th>
                        </tr>
                    </thead>
                    <tbody>';
                    if($count>0){
                        foreach ($students as $student) {
                            echo '<tr>
                                    <th scope="row"> '.$student['studentID'].'</th>
                                    <td><a href="studentDetails.php?id='.$student['studentID'].'"> '.$student['firstName'].' '.$student['middleName'].' '.$student['lastName'].' </a></td>
                                    <td> '.$student['school'].'</td>
                                    <td> '.$student['district'].'</td>
                                    <td> '.$student['phoneNO'].'</td>
                                </tr>';
                        }
                    }else{
                        echo '<tr>
                                <td colspan="5" style="text-align:center" scope="row"> There is no Students !!!</td>
                            </tr>';
                    }
                    echo '</tbody>
                        </table>';
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
