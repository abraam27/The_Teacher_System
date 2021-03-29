<?php
    //require_once 'StudentSession.php';
    require_once '../lib/student.php';
    require_once '../model/center.php';
    require_once '../model/session.php';
    require_once '../template/StudentTemplate/head.tpl';
    $student = Student::retreiveStudentById($_SESSION['studentID']);
    $countMessages = 0;
    $countMessages ;
    require_once '../template/StudentTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                        Contact ME
                </h3>
                <p class="page-breadcrumb">
                    <a href="myMaterials.php">Home</a> / Contact ME
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->

<section>
    <div class="container">
    <!--  Content -->	
        <div style="height:50px"></div>
        <div class="row">
            <?php
                $centers = Center::readAll();
                if(is_array($centers) && count($centers) > 0){
                    foreach ($centers as $center) {
                        echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="event-latest">
                                    <div class="row"> 
                                        <div class="col-lg-12 col-md-7 col-sm-12 col-xs-12">
                                            <div class="event-details">
                                                <h4 class="event-latest-title">
                                                    <bold style="color:#FE3C47 ; font-family: Dosis, sans-serif ; font-size: 30px">Center Name</bold>
                                                </h4>
                                                <div class="event-latest-details">
                                                    <p class="comments"> <i class="fa fa-map-marker" aria-hidden="true" style="padding-right: 15px"></i>'.$center['address'].', '.$center['district'].'</p>
                                                    <p class="comments"> <i class="fa fa-phone" aria-hidden="true" style="padding-right: 15px"></i>'.$center['phone1'].' | '.$center['phone2'].'</p>
                                                    <p class="comments"><i class="fa fa-envelope" aria-hidden="true" style="padding-right: 15px"></i>'.$center['email'].'</p>';
                                                    $sessions = Session::retrieveAllSessionByCenterID($center['centerID']);
                                                    if(is_array($sessions) && count($sessions)>0){
                                                        foreach ($sessions as $session) {
                                                            echo '<p class="author"><i class="fa fa-calendar" aria-hidden="true" style="padding-right: 15px"></i> '.$session['day'].' | '.$session['time'].' | '.$session['level'].' | '.$session['stage'].' | '.$session['type'].' </p>';
                                                        }
                                                    }else{
                                                        echo '<p style="text-align:center" scope="row"> There is no Sessions !!!</p>';
                                                    }
                                            echo'</div>
                                            </div>
                                        </div> <!--  col-sm-7  -->
                                    </div>
                                </div>
                            </div> <!--  col-sm-6  -->';
                    }
                }else{
                    echo '<p style="text-align:center" scope="row"> There is no Centers !!!</p>';
                }
            ?>
            
        </div> <!--  end .row  --> 
    </div>
</section>
<?php
    require_once '../template/StudentTemplate/footer.tpl';
?>
<!-- form js -->
<?php
    require_once '../template/StudentTemplate/end.tpl';
?>
