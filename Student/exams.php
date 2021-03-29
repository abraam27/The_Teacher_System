<?php
    //require_once 'StudentSession.php';
    require_once '../lib/student.php';
    require_once '../model/message.php';
    require_once '../template/StudentTemplate/head.tpl';
    $student = Student::retreiveStudentById($_SESSION['studentID']);
    $countMessages = Message::countNewMessages($student['studentID']);
?>
<style>
    th,td{
            text-align: center
        }
</style>
<?php
    require_once '../template/StudentTemplate/navbar.tpl';
?>

<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                        My Exams
                </h3>
                <p class="page-breadcrumb">
                    <a href="myMaterials.php">Home</a> / My Exams
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->

<section>
    <div class="container">
        <!--  Content -->	
        <div style="height:50px"></div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" width="30px">#</th>
                    <th scope="col"  width="70px">Date</th>
                    <th scope="col"  width="70px">Time</th>
                    <th scope="col" width = "500px">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;
                    $messages = Message::retrieveAllMessagesByStudentID($student['studentID']);
                    if(is_array($messages) && count($messages)>0){
                        foreach ($messages as $message) {
                            echo '<tr>';
                            if($message['view']){
                                echo '<th scope="row"> '.$count++.' </th>';
                            }else{
                                echo '<th scope="row"> '.$count++.'<p  class="label label-pill label-danger count" style="border-radius:50%; margin-right: 5px; font-size: 10px; font-family: \'Dosis\', sans-serif ; float: right ; margin-right: 2px"> NEW </p> </th>';
                                Message::changeMessageStatus($message['messageID']);
                            }
                            echo '<td> '.$message['date'].' </td>
                                    <td> '.$message['time'].' </td>
                                    <td> '.$message['message'].' </td>
                                </tr>';
                        }
                    }else{
                        echo '<tr>
                                <td colspan="4" style="text-align:center" scope="row"> There is no Blood Requests !!!</td>
                            </tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php
    require_once '../template/StudentTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/StudentTemplate/end.tpl';
?>
