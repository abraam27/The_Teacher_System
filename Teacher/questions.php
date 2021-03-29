<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/question.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Questions
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Questions / <a href="filterQuestions.php?action=add">Add Question</a>
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<!--  Content -->
<?php
    if(is_numeric($_GET['id'])){
        $questionID = $_GET['id'];
        if(Question::deleteQuestionById($questionID)){
            echo '<div class="container greenMessage">
                    <p>The Question has been Deleted Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Question is not Deleted <i class="fa fa-frown-o"></i> Please try Again !</p>
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
    if(isset($_POST['finish'])){
        $question = $_POST['question'];
        $choice1 = $_POST['choice1'];
        $choice2 = $_POST['choice2'];
        $choice3 = $_POST['choice3'];
        $choice4 = $_POST['choice4'];
        $answer = $_POST['answer'];
        $category = $_POST['category'];
        $difficulty = $_POST['difficulty'];
        $level = $_POST['level'];
        $stage = $_POST['stage'];
        $type = $_POST['type'];
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        if(is_numeric($image)){
            if($category == 'TrueFalse'){
                $question = new Question($question, $choice1, $choice2, " ", " ", $answer, $category, $difficulty, $level, $stage, $type);
                if(is_numeric($question->addQuestion())){
                    echo '<div class="container greenMessage">
                            <p>The Question has been saved Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>The Question is not Saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            }else{
                $question = new Question($question, $choice1, $choice2, $choice3, $choice4, $answer, $category, $difficulty, $level, $stage, $type);
                if(is_numeric($question->addQuestion())){
                    echo '<div class="container greenMessage">
                            <p>The Question has been saved Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>The Question is not Saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            }
        }else{
            if($category == 'TrueFalse'){
                $question = new Question($question, $choice1, $choice2, " ", " ", $answer, $category, $difficulty, $level, $stage, $type, $image, $imageTmp);
                if(is_numeric($question->addQuestion())){
                    echo '<div class="container greenMessage">
                            <p>The Question has been saved Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>The Question is not Saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            }else{
                $question = new Question($question, $choice1, $choice2, $choice3, $choice4, $answer, $category, $difficulty, $level, $stage, $type, $image, $imageTmp);
                if(is_numeric($question->addQuestion())){
                    echo '<div class="container greenMessage">
                            <p>The Question has been saved Successfully <i class="fa fa-smile-o"></i> !</p>
                        </div>';
                }else{
                    echo '<div class="container redMessage">
                            <p>The Question is not Saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                        </div>';
                }
            }
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
                    <th scope="col" width="450px">Quesion</th>
                    <th scope="col" width="100px">Answer</th>
                    <th scope="col" width="5px">VIEW</th>
                    <th scope="col" width="5px">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $count = 1;
                        $questions = Question::retreiveQuestions($_POST['category'], $_POST['difficulty'], $_POST['level'], $_POST['stage'], $_POST['type']);
                        if(is_array($questions) && count($questions)>0){
                            foreach ($questions as $question) {
                                echo '<td>'.$count++.'</td>';
                                if(!is_null($question['image'])){
                                    echo '<td>
                                            <div>'.$question['question'].'</div>
                                            <img width="100%" height="300px" src="../upload/'.$question['image'].'"/>
                                        </td>';
                                }else{
                                    echo '<td>
                                            <div>'.$question['question'].'</div>
                                        </td>';
                                }
                                echo '<td>'.$question['answer'].'</td>';
                                echo '<td><a href="questionDetails.php?id='.$question['questionID'].'">VIEW</a></td>';
                                echo '<td><a href="questions.php?id='.$question['questionID'].'">DELETE</a></td>';
                            }
                        }else{
                            echo '<tr>
                                <td colspan="5" style="text-align:center" scope="row"> There is no Questions Available !!!</td>
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
