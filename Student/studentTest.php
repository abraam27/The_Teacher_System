<?php
    //require_once 'StudentSession.php';
    require_once '../lib/student.php';
    require_once '../template/StudentTemplate/head.tpl';
    $student = Student::retreiveStudentById($_SESSION['studentID']);
    $countMessages = Message::countNewMessages($student['studentID']);
    require_once '../template/StudentTemplate/CSS.tpl';
    require_once '../template/StudentTemplate/navbar.tpl';
?>
<!--  Slide Show -->
<!--  Content -->
<?php
    require_once '../template/StudentTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/StudentTemplate/end.tpl';
?>
