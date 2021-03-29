<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/ask.php';
    require_once '../model/message.php';
    require_once '../lib/student.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Ask Messages
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Ask Messages
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<!--  Content -->
<?php
    if(is_numeric($_GET['id'])){
        $askID = $_GET['id'];
        if(Ask::deleteAskById($askID)){
            echo '<div class="container greenMessage">
                    <p>The Message has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>Yhe Message is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
    }
    if(isset($_POST['send'])){
        $studentID = $_POST['studentID'];
        $message = $_POST['message'];
        $date = date("d-m-20y");
        $time = date("h:i A");
        $askID = $_POST['askID'];
        $message = new Message($message, $date, $time, $studentID);
        if(is_numeric($message->add())){
            echo '<div class="container greenMessage">
                    <p>The Message has been Sent Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
            Ask::changeReplyStatus($askID);
        }else{
            echo '<div class="container redMessage">
                    <p>The Message is not Sent <i class="fa fa-frown-o"></i> Please try Again !</p>
		</div>';
        }
        
    }
?>
<section>
    <div class="container">
        <!--  Content -->	
        <div style="height:50px"></div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" width="50px">#</th>
                    <th scope="col" width="450px">Message</th>
                    <th scope="col" width="100px">Date</th>
                    <th scope="col" width="80px">Time</th>
                    <th scope="col" width="20px">Student Name</th>
                    <th scope="col" width="5px">REPLYED</th>
                    <th scope="col" width="5px">SEND</th>
                    <th scope="col" width="5px">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $count = 1;
                        $asks = Ask::retreiveAllAsks();
                        if(is_array($asks) && count($asks)>0){
                            foreach ($asks as $ask) {
                                if($ask['view']){
                                    if((strtotime($ask['date'])-strtotime(date("d-m-20y")))/(60*60*24) == 0){
                                        echo '<td>'.$count++.'<p  class="label label-pill label-danger count" style="border-radius:50%; margin-right: 20px; font-size: 5px; font-family: \'Dosis\', sans-serif; float: right ; margin-right: 2px">NEW</p></td>';
                                    }else{
                                        echo '<td>'.$count++.'</td>';
                                    }
                                }else{
                                    if((strtotime($ask['date'])-strtotime(date("d-m-20y")))/(60*60*24) == 0){
                                        echo '<th>'.$count++.'<p  class="label label-pill label-danger count" style="border-radius:50%; margin-right: 20px; font-size: 5px; font-family: \'Dosis\', sans-serif; float: right ; margin-right: 2px">NEW</p></th>';
                                    }else{
                                        echo '<th>'.$count++.'</th>';
                                    }
                                }
                                if(!is_null($ask['image'])){
                                    echo '<td>
                                            <div>'.$ask['message'].'</div>
                                            <img width="100%" height="300px" src="../upload/'.$ask['image'].'"/>
                                        </td>';
                                }else{
                                    echo '<td>
                                            <div>'.$ask['message'].'</div>
                                        </td>';
                                }
                                $student = Student::retreiveStudentById($ask['studentID']);
                                echo '<td>'.$ask['date'].'</td>
                                    <td>'.$ask['time'].'</td>
                                    <td><a href="studentDetails.php?id='.$ask['studentID'].'">'.$student['firstName'].' '.$student['middleName'].' '.$student['lastName'].'</a></td>';
                                if($ask['reply']){
                                    echo '<td>YES</td>';
                                }else{
                                    echo '<td>NO</td>';
                                }
                                echo '<td><a href="sendMessage.php?id='.$ask['studentID'].'">SEND</a></td>';
                                echo '<td><a href="messages.php?id='.$ask['askID'].'&askID='.$ask['askID'].'">DELETE</a></td>';
                            }
                        }else{
                            echo '<tr>
                                <td colspan="8" style="text-align:center" scope="row"> There is no Messages Available !!!</td>
                            </tr>';
                        }
                    ?>    
                </tr>
            </tbody>
        </table>
    </div>
</section>
<?php
    require_once '../template/TeacherTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
