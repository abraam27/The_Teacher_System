<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/question.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/addQuestionCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    ADD Question
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / ADD Question
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<!--  Content -->
<?php
    if(isset($_POST['add'])){
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
        <?php
            if($_POST['category'] == 'TrueFalse'){
                echo '<form class="jotform-form" action="'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                        <input type="hidden" name="category" value="'.$_POST['category'].'" />
                        <input type="hidden" name="difficulty" value="'.$_POST['difficulty'].'" />
                        <input type="hidden" name="level" value="'.$_POST['level'].'" />
                        <input type="hidden" name="stage" value="'.$_POST['stage'].'" />
                        <input type="hidden" name="type" value="'.$_POST['type'].'" />
                        <div class="form-all">
                              <ul class="form-section page-section">
                                <li id="cid_1" class="form-input-wide" data-type="control_head">
                                      <div class="form-header-group ">
                                        <div class="header-text httal htvam">
                                              <h2 id="header_1" class="form-header" data-component="header">
                                                Add Question
                                              </h2>
                                        </div>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_3">
                                      <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3"> Question </label>
                                      <div id="cid_3" class="form-input">
                                        <textarea id="input_3" class="form-textarea" name="question" cols="50" rows="6" data-component="textarea"></textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_fileupload" id="id_4">
                                      <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4"> Image </label>
                                      <div id="cid_4" class="form-input">
                                        <div data-wrapper-react="true">
                                              <div data-wrapper-react="true">
                                                <input type="file" id="input_4" name="image" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="10854" data-file-minsize="0" data-file-limit="" data-component="fileupload" />
                                              </div>
                                        </div>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_5">
                                      <label class="form-label form-label-left form-label-auto" id="label_5" for="input_5"> Choice 1 </label>
                                      <div id="cid_5" class="form-input">
                                        <textarea id="input_5" class="form-textarea" name="choice1" cols="50" rows="3" data-component="textarea">True</textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_6">
                                      <label class="form-label form-label-left form-label-auto" id="label_6" for="input_6"> Choice 2 </label>
                                      <div id="cid_6" class="form-input">
                                        <textarea id="input_6" class="form-textarea" name="choice2" cols="50" rows="3" data-component="textarea">False</textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_radio" id="id_9">
                                      <label class="form-label form-label-left form-label-auto" id="label_9" for="input_9"> Answer </label>
                                      <div id="cid_9" class="form-input">
                                        <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                              <span class="form-radio-item">
                                                <span class="dragger-item">
                                                </span>
                                                <input type="radio" class="form-radio" id="input_9_0" name="answer" value="True" />
                                                <label id="label_input_9_0" for="input_9_0"> True </label>
                                              </span>
                                              <span class="form-radio-item">
                                                <span class="dragger-item">
                                                </span>
                                                <input type="radio" class="form-radio" id="input_9_1" name="answer" value="True" />
                                                <label id="label_input_9_1" for="input_9_1"> False </label>
                                              </span>
                                        </div>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_button" id="id_2">
                                      <div id="cid_2" class="form-input-wide">
                                        <div style="text-align:center" class="form-buttons-wrapper">
                                              <button id="input_2" type="submit" name="add" value="add" class="form-submit-button" data-component="button">
                                                ADD
                                              </button>
                                              <button id="input_2" type="submit" name="finish" value="finish" formaction="questions.php" class="form-submit-button" data-component="button">
                                                FINISH 
                                              </button>
                                        </div>
                                      </div>
                                </li>
                              </ul>
                        </div>
                      </form>';
            }else{
                echo '<form class="jotform-form" action="'.$_SERVER['PHP_SELF'].'" method="post" enctype="multipart/form-data" accept-charset="utf-8">
                        <input type="hidden" name="category" value="'.$_POST['category'].'" />
                        <input type="hidden" name="difficulty" value="'.$_POST['difficulty'].'" />
                        <input type="hidden" name="level" value="'.$_POST['level'].'" />
                        <input type="hidden" name="stage" value="'.$_POST['stage'].'" />
                        <input type="hidden" name="type" value="'.$_POST['type'].'" />
                        <div class="form-all">
                              <ul class="form-section page-section">
                                <li id="cid_1" class="form-input-wide" data-type="control_head">
                                      <div class="form-header-group ">
                                        <div class="header-text httal htvam">
                                              <h2 id="header_1" class="form-header" data-component="header">
                                                Add Question
                                              </h2>
                                        </div>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_3">
                                      <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3"> Question </label>
                                      <div id="cid_3" class="form-input">
                                        <textarea id="input_3" class="form-textarea" name="question" cols="50" rows="6" data-component="textarea"></textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_fileupload" id="id_4">
                                      <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4"> Image </label>
                                      <div id="cid_4" class="form-input">
                                        <div data-wrapper-react="true">
                                              <div data-wrapper-react="true">
                                                <input type="file" id="input_4" name="image" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="10854" data-file-minsize="0" data-file-limit="" data-component="fileupload" />
                                              </div>
                                        </div>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_5">
                                      <label class="form-label form-label-left form-label-auto" id="label_5" for="input_5"> Choice 1 </label>
                                      <div id="cid_5" class="form-input">
                                        <textarea id="input_5" class="form-textarea" name="choice1" cols="50" rows="3" data-component="textarea"></textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_6">
                                      <label class="form-label form-label-left form-label-auto" id="label_6" for="input_6"> Choice 2 </label>
                                      <div id="cid_6" class="form-input">
                                        <textarea id="input_6" class="form-textarea" name="choice2" cols="50" rows="3" data-component="textarea"></textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_7">
                                      <label class="form-label form-label-left form-label-auto" id="label_7" for="input_7"> Choice 3 </label>
                                      <div id="cid_7" class="form-input">
                                        <textarea id="input_7" class="form-textarea" name="choice3" cols="50" rows="3" data-component="textarea"></textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_textarea" id="id_8">
                                      <label class="form-label form-label-left form-label-auto" id="label_8" for="input_8"> Choice 4 </label>
                                      <div id="cid_8" class="form-input">
                                        <textarea id="input_8" class="form-textarea" name="choice4" cols="50" rows="3" data-component="textarea"></textarea>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_radio" id="id_9">
                                      <label class="form-label form-label-left form-label-auto" id="label_9" for="input_9"> Answer </label>
                                      <div id="cid_9" class="form-input">
                                        <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                              <span class="form-radio-item">
                                                <span class="dragger-item">
                                                </span>
                                                <input type="radio" class="form-radio" id="input_9_0" name="answer" value="1" />
                                                <label id="label_input_9_0" for="input_9_0"> Choice 1 </label>
                                              </span>
                                              <span class="form-radio-item">
                                                <span class="dragger-item">
                                                </span>
                                                <input type="radio" class="form-radio" id="input_9_1" name="answer" value="2" />
                                                <label id="label_input_9_1" for="input_9_1"> Choice 2 </label>
                                              </span>
                                              <span class="form-radio-item">
                                                <span class="dragger-item">
                                                </span>
                                                <input type="radio" class="form-radio" id="input_9_2" name="answer" value="3" />
                                                <label id="label_input_9_2" for="input_9_2"> Choice 3 </label>
                                              </span>
                                              <span class="form-radio-item">
                                                <span class="dragger-item">
                                                </span>
                                                <input type="radio" class="form-radio" id="input_9_3" name="answer" value="4" />
                                                <label id="label_input_9_3" for="input_9_3"> Choice 4 </label>
                                              </span>
                                        </div>
                                      </div>
                                </li>
                                <li class="form-line" data-type="control_button" id="id_2">
                                      <div id="cid_2" class="form-input-wide">
                                        <div style="text-align:center" class="form-buttons-wrapper">
                                              <button id="input_2" type="submit" name="add" value="add" class="form-submit-button" data-component="button">
                                                ADD
                                              </button>
                                              <button id="input_2" type="submit" name="finish" value="finish" formaction="questions.php" class="form-submit-button" data-component="button">
                                                FINISH 
                                              </button>
                                        </div>
                                      </div>
                                </li>
                              </ul>
                        </div>
                      </form>';
            }
        ?>
        
    </div>
</section>
<?php
    require_once '../template/TeacherTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://cdn.jotfor.ms/js/vendor/imageinfo.js?v=3.3.7630" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/file-uploader/fileuploader.js?v=3.3.7630"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.7630" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
          JotForm.alterTexts(undefined);
        JotForm.clearFieldOnHide="disable";
          setTimeout(function() {
                  JotForm.initMultipleUploads();
          }, 2);
        JotForm.submitError="jumpToFirstError";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"addQuestion","qid":"1","text":"Add Question","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},{"description":"","name":"question","qid":"3","subLabel":"","text":"Question","type":"control_textarea"},{"description":"","name":"image","qid":"4","subLabel":"","text":"Image","type":"control_fileupload"},{"description":"","name":"choice1","qid":"5","subLabel":"","text":"Choice 1","type":"control_textarea"},{"description":"","name":"choice2","qid":"6","subLabel":"","text":"Choice 2","type":"control_textarea"},{"description":"","name":"choice3","qid":"7","subLabel":"","text":"Choice 3","type":"control_textarea"},{"description":"","name":"choice4","qid":"8","subLabel":"","text":"Choice 4","type":"control_textarea"},{"description":"","name":"answer","qid":"9","text":"Answer","type":"control_radio"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"addQuestion","qid":"1","text":"Add Question","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},{"description":"","name":"question","qid":"3","subLabel":"","text":"Question","type":"control_textarea"},{"description":"","name":"image","qid":"4","subLabel":"","text":"Image","type":"control_fileupload"},{"description":"","name":"choice1","qid":"5","subLabel":"","text":"Choice 1","type":"control_textarea"},{"description":"","name":"choice2","qid":"6","subLabel":"","text":"Choice 2","type":"control_textarea"},{"description":"","name":"choice3","qid":"7","subLabel":"","text":"Choice 3","type":"control_textarea"},{"description":"","name":"choice4","qid":"8","subLabel":"","text":"Choice 4","type":"control_textarea"},{"description":"","name":"answer","qid":"9","text":"Answer","type":"control_radio"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
