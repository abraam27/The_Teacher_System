<?php
    //require_once 'TeacherSession.php';
    require_once '../model/center.php';
    require_once '../model/session.php';
    require_once '../lib/student.php';
    if(is_numeric($_GET['id'])){
        $centerID = $_GET['id'];
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
                    Center Details
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Center Details / <a href="centerList.php?id=<?php echo $centerID;?>">Delete Center</a> / <a href="addSession.php?id=<?php echo $centerID;?>">Add Session</a>
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    //handel delete Session
?>
<section>
    <div class="container">
        <!--  Content -->
        <?php
            $center = Center::readById($centerID);
            echo '<ul class="form-section page-section">
                    <li id="cid_10" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                              <h1 id="header_10" class="form-header" data-component="header">
                                '.$center['name'].'
                              </h1>
                          </div>
                        </div>
                    </li>
                </ul>
                <table class="table leftTable">
                    <tbody>
                        <tr>
                            <th scope="row"> Address : </th>
                            <td width="700px">'.$center['address'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> District : </th>
                            <td>'.$center['district'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Phone 1 : </th>
                            <td>'.$center['phone1'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Phone 2 : </th>
                            <td>'.$center['phone2'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Email : </th>
                            <td>'.$center['email'].'</td>
                        </tr>
                    </tbody>
                </table>';
            echo'<ul class="form-section page-section">
                    <li id="cid_10" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                              <h1 id="header_10" class="form-header" data-component="header">
                                Sessions
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
            $count = 1;
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
        ?>
        
    </div>
</section>
<!--  Content -->
<?php
    require_once '../template/TeacherTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
