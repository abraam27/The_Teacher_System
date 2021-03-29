<?php
    require_once 'TeacherSession.php';
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
                    Question Details
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Question Details / <a href="questions.php?id=<?php echo $_GET['id']?>">Delete The Question</a>
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
            $question = Question::retreiveQuestionById($_GET['id']);
            echo '<table class="table leftTable">
                    <tbody>
                        <tr>
                            <th scope="row"> Question : </th>
                            <td width="700px">'.$question['question'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> image : </th>';
                            if(!is_null($question['image'])){
                                echo '<td><img width="100%" height="300px" href="../upload/'.$question['image'].'"/></td>';
                            }else{
                                echo '<td> - </td>';
                            }
                    echo'</tr>
                        <tr>
                            <th scope="row"> Choice 1 : </th>
                            <td>'.$question['choice1'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Choice 2 : </th>
                            <td>'.$question['choice2'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Choice 3 : </th>
                            <td>'.$question['choice3'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Choice 4 : </th>
                            <td>'.$question['choice1'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Choice 4 : </th>
                            <td>'.$question['choice1'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Answer : </th>
                            <td>'.$question['answer'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Category : </th>
                            <td>'.$question['category'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Difficulty : </th>
                            <td>'.$question['difficulty'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Level : </th>
                            <td>'.$question['level'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Stage : </th>
                            <td>'.$question['stage'].'</td>
                        </tr>
                        <tr>
                            <th scope="row"> Type : </th>
                            <td>'.$question['type'].'</td>
                        </tr>
                    </tbody>
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
