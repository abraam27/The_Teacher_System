<?php
    //require_once 'TeacherSession.php';
    require_once '../model/exam.php';
    require_once '../model/modelQuestion.php';
    require_once '../model/studentExam.php';
    require_once '../lib/student.php';
    require_once '../lib/question.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/createExamCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Create Exam
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Create Exam
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['create'])){
        //collect data
        $name = $_POST['name'];
        $noOfModels = $_POST['noOfModels'];
        $noOfMCQLevel1 = $_POST['noOfMCQLevel1'];
        $noOfMCQLevel2 = $session['noOfMCQLevel2'];
        $noOfMCQLevel3 = $session['noOfMCQLevel3'];
        $noOfTandFLevel1 = $session['noOfTandFLevel1'];
        $noOfTandFLevel2 = $_POST['noOfTandFLevel2'];
        $noOfTandFLevel3 = $_POST['noOfTandFLevel3'];
        $level = $_POST['level'];
        $stage = $_POST['stage'];
        $type = $_POST['type'];
        $day = $_POST['day'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        $date = $day . '-' . $month . '-' . $year;
        $hour = $_POST['hour'];
        $min = $_POST['min'];
        $ampm = $_POST['ampm'];
        $time = $hour . ':' . $min . ' '. $ampm;
        $sessionID = $_POST['sessionID'];
        $dhour = $_POST['dhour'];
        $dmin = $_POST['dmin'];
        $duration = $dhour . ':' . $dmin;
        for($i = 0 ; $i < $noOfModels ; $i++){
            $exam = new Exam($name, $date, $time, $duration);
            $examID = $exam->add();
            if(is_numeric($examID)){
                $TF_level_1 = Question::retreiveQuestions("TF", 1, $level, $stage, $type);
                $TF_level_2 = Question::retreiveQuestions("TF", 2, $level, $stage, $type);
                $TF_level_3 = Question::retreiveQuestions("TF", 3, $level, $stage, $type);
                $MCQ_level_1 = Question::retreiveQuestions("MCQ", 1, $level, $stage, $type);
                $MCQ_level_2 = Question::retreiveQuestions("MCQ", 2, $level, $stage, $type);
                $MCQ_level_3 = Question::retreiveQuestions("MCQ", 3, $level, $stage, $type);
                if(count($TF_level_1) > $noOfTandFLevel1){
                    $tmp = Question::chooseRandomQuestions(0, count($TF_level_1)-1, count($noOfTandFLevel1));
                    for($j = 0 ; $j < $noOfTandFLevel1 ; $j++){
                        $question = $TF_level_1[$tmp[j]];
                        $examQuestion = new ModelQuestion($examID, $question['questionID']);
                    }
                }else{
                    $exam = Exam::delete($examID);
                    echo '<div class="container redMessage">
                        <p>Sorry !! but you should select # of TF Qs < or = # of saved TF Qs of level 1 <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
                if(count($TF_level_2) > $noOfTandFLevel2){
                    $tmp = Question::chooseRandomQuestions(0, count($TF_level_2)-1, count($noOfTandFLevel2));
                    for($j = 0 ; $j < $noOfTandFLevel2 ; $j++){
                        $question = $TF_level_1[$tmp[j]];
                        $examQuestion = new ModelQuestion($examID, $question['questionID']);
                    }
                }else{
                    $exam = Exam::delete($examID);
                    echo '<div class="container redMessage">
                        <p>Sorry !! but you should select # of TF Qs < or = # of saved TF Qs of level 2 <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
                if(count($TF_level_3) > $noOfTandFLevel3){
                    $tmp = Question::chooseRandomQuestions(0, count($TF_level_3)-1, count($noOfTandFLevel3));
                    for($j = 0 ; $j < $noOfTandFLevel3 ; $j++){
                        $question = $TF_level_3[$tmp[j]];
                        $examQuestion = new ModelQuestion($examID, $question['questionID']);
                    }
                }else{
                    $exam = Exam::delete($examID);
                    echo '<div class="container redMessage">
                        <p>Sorry !! but you should select # of TF Qs < or = # of saved TF Qs of level 3 <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
                if(count($MCQ_level_1) > $noOfMCQLevel1){
                    $tmp = Question::chooseRandomQuestions(0, count($MCQ_level_1)-1, count($noOfMCQLevel1));
                    for($j = 0 ; $j < $noOfMCQLevel1 ; $j++){
                        $question = $MCQ_level_1[$tmp[j]];
                        $examQuestion = new ModelQuestion($examID, $question['questionID']);
                    }
                }else{
                    $exam = Exam::delete($examID);
                    echo '<div class="container redMessage">
                        <p>Sorry !! but you should select # of MCQs < or = # of saved MCQs of level 1 <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
                if(count($MCQ_level_2) > $noOfMCQLevel2){
                    $tmp = Question::chooseRandomQuestions(0, count($MCQ_level_2)-1, count($noOfMCQLevel2));
                    for($j = 0 ; $j < $noOfMCQLevel2 ; $j++){
                        $question = $MCQ_level_2[$tmp[j]];
                        $examQuestion = new ModelQuestion($examID, $question['questionID']);
                    }
                }else{
                    $exam = Exam::delete($examID);
                    echo '<div class="container redMessage">
                        <p>Sorry !! but you should select # of MCQs < or = # of saved MCQs of level 2 <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
                if(count($MCQ_level_3) > $noOfMCQLevel3){
                    $tmp = Question::chooseRandomQuestions(0, count($MCQ_level_3)-1, count($noOfMCQLevel3));
                    for($j = 0 ; $j < $noOfMCQLevel3 ; $j++){
                        $question = $MCQ_level_3[$tmp[j]];
                        $examQuestion = new ModelQuestion($examID, $question['questionID']);
                    }
                }else{
                    $exam = Exam::delete($examID);
                    echo '<div class="container redMessage">
                        <p>Sorry !! but you should select # of MCQs < or = # of saved MCQs of level 3 <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
                $students = Student::retreiveAllStudentsBysessionID($sessionID);
                if(is_array($students) && count($students)>0){
                    foreach ($students as $student) {
                        $studentExam = new ModelQuestion($student['studentID'], $examID);
                        $studentExam->add();
                    }
                }else{
                    echo '<div class="container redMessage">
                        <p>The Session did not have Students <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
                }
            echo '<div class="container greenMessage">
                    <p>The Exam has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
            }else{
                echo '<div class="container redMessage">
                        <p>The Exam did not Save <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
            
        }
        
        
        
        
        
        
    }
    
?>
<section>
    <div class="container">
        <!--  Content -->	
        <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" accept-charset="utf-8">
          <input type="hidden" name="formID" value="82356970666570" />
          <div class="form-all">
                <ul class="form-section page-section">
                  <li id="cid_1" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                                <h2 id="header_1" class="form-header" data-component="header">
                                  Create Exam
                                </h2>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textbox" id="id_41">
                        <label class="form-label form-label-left form-label-auto" id="label_41" for="input_41">
                          Name
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_41" class="form-input jf-required">
                          <input type="text" id="input_41" name="name" data-type="input-textbox" class="form-textbox validate[required]" size="30" value="" data-component="textbox" required="" />
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_38">
                        <label class="form-label form-label-left form-label-auto" id="label_38" for="input_38">
                          # of Models
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_38" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_38" name="noOfModels" style="width:150px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option selected="" value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                                <option value="13"> 13 </option>
                                <option value="14"> 14 </option>
                                <option value="15"> 15 </option>
                                <option value="16"> 16 </option>
                                <option value="17"> 17 </option>
                                <option value="18"> 18 </option>
                                <option value="19"> 19 </option>
                                <option value="20"> 20 </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_42">
                        <label class="form-label form-label-left form-label-auto" id="label_42" for="input_42">
                          # of MCQ level 1
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_42" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_42" name="noOfMCQLevel1" style="width:150px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option selected="" value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                                <option value="13"> 13 </option>
                                <option value="14"> 14 </option>
                                <option value="15"> 15 </option>
                                <option value="16"> 16 </option>
                                <option value="17"> 17 </option>
                                <option value="18"> 18 </option>
                                <option value="19"> 19 </option>
                                <option value="20"> 20 </option>
                                <option value="21"> 21 </option>
                                <option value="22"> 22 </option>
                                <option value="23"> 23 </option>
                                <option value="24"> 24 </option>
                                <option value="25"> 25 </option>
                                <option value="26"> 26 </option>
                                <option value="27"> 27 </option>
                                <option value="28"> 28 </option>
                                <option value="29"> 29 </option>
                                <option value="30"> 30 </option>
                                <option value="31"> 31 </option>
                                <option value="32"> 32 </option>
                                <option value="33"> 33 </option>
                                <option value="34"> 34 </option>
                                <option value="35"> 35 </option>
                                <option value="36"> 36 </option>
                                <option value="37"> 37 </option>
                                <option value="38"> 38 </option>
                                <option value="39"> 39 </option>
                                <option value="40"> 40 </option>
                                <option value="41"> 41 </option>
                                <option value="42"> 42 </option>
                                <option value="43"> 43 </option>
                                <option value="44"> 44 </option>
                                <option value="45"> 45 </option>
                                <option value="46"> 46 </option>
                                <option value="47"> 47 </option>
                                <option value="48"> 48 </option>
                                <option value="49"> 49 </option>
                                <option value="50"> 50 </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_44">
                        <label class="form-label form-label-left form-label-auto" id="label_44" for="input_44">
                          # of MCQ level 2
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_44" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_44" name="noOfMCQLevel2" style="width:150px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option selected="" value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                                <option value="13"> 13 </option>
                                <option value="14"> 14 </option>
                                <option value="15"> 15 </option>
                                <option value="16"> 16 </option>
                                <option value="17"> 17 </option>
                                <option value="18"> 18 </option>
                                <option value="19"> 19 </option>
                                <option value="20"> 20 </option>
                                <option value="21"> 21 </option>
                                <option value="22"> 22 </option>
                                <option value="23"> 23 </option>
                                <option value="24"> 24 </option>
                                <option value="25"> 25 </option>
                                <option value="26"> 26 </option>
                                <option value="27"> 27 </option>
                                <option value="28"> 28 </option>
                                <option value="29"> 29 </option>
                                <option value="30"> 30 </option>
                                <option value="31"> 31 </option>
                                <option value="32"> 32 </option>
                                <option value="33"> 33 </option>
                                <option value="34"> 34 </option>
                                <option value="35"> 35 </option>
                                <option value="36"> 36 </option>
                                <option value="37"> 37 </option>
                                <option value="38"> 38 </option>
                                <option value="39"> 39 </option>
                                <option value="40"> 40 </option>
                                <option value="41"> 41 </option>
                                <option value="42"> 42 </option>
                                <option value="43"> 43 </option>
                                <option value="44"> 44 </option>
                                <option value="45"> 45 </option>
                                <option value="46"> 46 </option>
                                <option value="47"> 47 </option>
                                <option value="48"> 48 </option>
                                <option value="49"> 49 </option>
                                <option value="50"> 50 </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_45">
                        <label class="form-label form-label-left form-label-auto" id="label_45" for="input_45">
                          # of MCQ level 3
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_45" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_45" name="noOfMCQLevel3" style="width:150px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option selected="" value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                                <option value="13"> 13 </option>
                                <option value="14"> 14 </option>
                                <option value="15"> 15 </option>
                                <option value="16"> 16 </option>
                                <option value="17"> 17 </option>
                                <option value="18"> 18 </option>
                                <option value="19"> 19 </option>
                                <option value="20"> 20 </option>
                                <option value="21"> 21 </option>
                                <option value="22"> 22 </option>
                                <option value="23"> 23 </option>
                                <option value="24"> 24 </option>
                                <option value="25"> 25 </option>
                                <option value="26"> 26 </option>
                                <option value="27"> 27 </option>
                                <option value="28"> 28 </option>
                                <option value="29"> 29 </option>
                                <option value="30"> 30 </option>
                                <option value="31"> 31 </option>
                                <option value="32"> 32 </option>
                                <option value="33"> 33 </option>
                                <option value="34"> 34 </option>
                                <option value="35"> 35 </option>
                                <option value="36"> 36 </option>
                                <option value="37"> 37 </option>
                                <option value="38"> 38 </option>
                                <option value="39"> 39 </option>
                                <option value="40"> 40 </option>
                                <option value="41"> 41 </option>
                                <option value="42"> 42 </option>
                                <option value="43"> 43 </option>
                                <option value="44"> 44 </option>
                                <option value="45"> 45 </option>
                                <option value="46"> 46 </option>
                                <option value="47"> 47 </option>
                                <option value="48"> 48 </option>
                                <option value="49"> 49 </option>
                                <option value="50"> 50 </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_46">
                        <label class="form-label form-label-left form-label-auto" id="label_46" for="input_46">
                          # of T&amp;F level 1
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_46" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_46" name="noOfTandFLevel1" style="width:150px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option selected="" value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                                <option value="13"> 13 </option>
                                <option value="14"> 14 </option>
                                <option value="15"> 15 </option>
                                <option value="16"> 16 </option>
                                <option value="17"> 17 </option>
                                <option value="18"> 18 </option>
                                <option value="19"> 19 </option>
                                <option value="20"> 20 </option>
                                <option value="21"> 21 </option>
                                <option value="22"> 22 </option>
                                <option value="23"> 23 </option>
                                <option value="24"> 24 </option>
                                <option value="25"> 25 </option>
                                <option value="26"> 26 </option>
                                <option value="27"> 27 </option>
                                <option value="28"> 28 </option>
                                <option value="29"> 29 </option>
                                <option value="30"> 30 </option>
                                <option value="31"> 31 </option>
                                <option value="32"> 32 </option>
                                <option value="33"> 33 </option>
                                <option value="34"> 34 </option>
                                <option value="35"> 35 </option>
                                <option value="36"> 36 </option>
                                <option value="37"> 37 </option>
                                <option value="38"> 38 </option>
                                <option value="39"> 39 </option>
                                <option value="40"> 40 </option>
                                <option value="41"> 41 </option>
                                <option value="42"> 42 </option>
                                <option value="43"> 43 </option>
                                <option value="44"> 44 </option>
                                <option value="45"> 45 </option>
                                <option value="46"> 46 </option>
                                <option value="47"> 47 </option>
                                <option value="48"> 48 </option>
                                <option value="49"> 49 </option>
                                <option value="50"> 50 </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_47">
                        <label class="form-label form-label-left form-label-auto" id="label_47" for="input_47">
                          # of T&amp;F level 2
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_47" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_47" name="noOfTandFLevel2" style="width:150px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option selected="" value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                                <option value="13"> 13 </option>
                                <option value="14"> 14 </option>
                                <option value="15"> 15 </option>
                                <option value="16"> 16 </option>
                                <option value="17"> 17 </option>
                                <option value="18"> 18 </option>
                                <option value="19"> 19 </option>
                                <option value="20"> 20 </option>
                                <option value="21"> 21 </option>
                                <option value="22"> 22 </option>
                                <option value="23"> 23 </option>
                                <option value="24"> 24 </option>
                                <option value="25"> 25 </option>
                                <option value="26"> 26 </option>
                                <option value="27"> 27 </option>
                                <option value="28"> 28 </option>
                                <option value="29"> 29 </option>
                                <option value="30"> 30 </option>
                                <option value="31"> 31 </option>
                                <option value="32"> 32 </option>
                                <option value="33"> 33 </option>
                                <option value="34"> 34 </option>
                                <option value="35"> 35 </option>
                                <option value="36"> 36 </option>
                                <option value="37"> 37 </option>
                                <option value="38"> 38 </option>
                                <option value="39"> 39 </option>
                                <option value="40"> 40 </option>
                                <option value="41"> 41 </option>
                                <option value="42"> 42 </option>
                                <option value="43"> 43 </option>
                                <option value="44"> 44 </option>
                                <option value="45"> 45 </option>
                                <option value="46"> 46 </option>
                                <option value="47"> 47 </option>
                                <option value="48"> 48 </option>
                                <option value="49"> 49 </option>
                                <option value="50"> 50 </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_43">
                        <label class="form-label form-label-left form-label-auto" id="label_43" for="input_43">
                          # of T&amp;F level 3
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_43" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_43" name="noOfTandFLevel3" style="width:150px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option selected="" value="0"> 0 </option>
                                <option value="1"> 1 </option>
                                <option value="2"> 2 </option>
                                <option value="3"> 3 </option>
                                <option value="4"> 4 </option>
                                <option value="5"> 5 </option>
                                <option value="6"> 6 </option>
                                <option value="7"> 7 </option>
                                <option value="8"> 8 </option>
                                <option value="9"> 9 </option>
                                <option value="10"> 10 </option>
                                <option value="11"> 11 </option>
                                <option value="12"> 12 </option>
                                <option value="13"> 13 </option>
                                <option value="14"> 14 </option>
                                <option value="15"> 15 </option>
                                <option value="16"> 16 </option>
                                <option value="17"> 17 </option>
                                <option value="18"> 18 </option>
                                <option value="19"> 19 </option>
                                <option value="20"> 20 </option>
                                <option value="21"> 21 </option>
                                <option value="22"> 22 </option>
                                <option value="23"> 23 </option>
                                <option value="24"> 24 </option>
                                <option value="25"> 25 </option>
                                <option value="26"> 26 </option>
                                <option value="27"> 27 </option>
                                <option value="28"> 28 </option>
                                <option value="29"> 29 </option>
                                <option value="30"> 30 </option>
                                <option value="31"> 31 </option>
                                <option value="32"> 32 </option>
                                <option value="33"> 33 </option>
                                <option value="34"> 34 </option>
                                <option value="35"> 35 </option>
                                <option value="36"> 36 </option>
                                <option value="37"> 37 </option>
                                <option value="38"> 38 </option>
                                <option value="39"> 39 </option>
                                <option value="40"> 40 </option>
                                <option value="41"> 41 </option>
                                <option value="42"> 42 </option>
                                <option value="43"> 43 </option>
                                <option value="44"> 44 </option>
                                <option value="45"> 45 </option>
                                <option value="46"> 46 </option>
                                <option value="47"> 47 </option>
                                <option value="48"> 48 </option>
                                <option value="49"> 49 </option>
                                <option value="50"> 50 </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_radio" id="id_35">
                        <label class="form-label form-label-left form-label-auto" id="label_35" for="input_35">
                          Level
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_35" class="form-input jf-required">
                          <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_35_0" name="level" value="1" required="" />
                                  <label id="label_input_35_0" for="input_35_0"> 1 </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_35_1" name="level" value="2" required="" />
                                  <label id="label_input_35_1" for="input_35_1"> 2 </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_35_2" name="level" value="3" required="" />
                                  <label id="label_input_35_2" for="input_35_2"> 3 </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_35_3" name="level" value="4" required="" />
                                  <label id="label_input_35_3" for="input_35_3"> 4 </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_radio" id="id_36">
                        <label class="form-label form-label-left form-label-auto" id="label_36" for="input_36">
                          Stage
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_36" class="form-input jf-required">
                          <div class="form-multiple-column" data-columncount="3" data-component="radio">
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_36_0" name="stage" value="Preparatory" required="" />
                                  <label id="label_input_36_0" for="input_36_0"> Preparatory </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_36_1" name="stage" value="Secondary" required="" />
                                  <label id="label_input_36_1" for="input_36_1"> Secondary </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_36_2" name="stage" value="Academic" required="" />
                                  <label id="label_input_36_2" for="input_36_2"> Academic </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_radio" id="id_37">
                        <label class="form-label form-label-left form-label-auto" id="label_37" for="input_37">
                          Type
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_37" class="form-input jf-required">
                          <div class="form-multiple-column" data-columncount="2" data-component="radio">
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_37_0" name="type" value="Arabic" required="" />
                                  <label id="label_input_37_0" for="input_37_0"> Arabic </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_37_1" name="type" value="English" required="" />
                                  <label id="label_input_37_1" for="input_37_1"> English </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required allowTime" data-type="control_datetime" id="id_48">
                        <label class="form-label form-label-left form-label-auto" id="label_48" for="lite_mode_48">
                          Date &amp; Time
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_48" class="form-input jf-required">
                          <div data-wrapper-react="true">
                                <div style="display:none">
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <input type="tel" class="form-textbox validate[required, disallowPast, limitDate]" id="day_48" name="day" size="2" data-maxlength="2" value="" required="" />
                                        <span class="date-separate">
                                           -
                                        </span>
                                        <label class="form-sub-label" for="day_48" id="sublabel_day" style="min-height:13px"> Day </label>
                                  </span>
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <input type="tel" class="form-textbox validate[required, disallowPast, limitDate]" id="month_48" name="month" size="2" data-maxlength="2" value="" required="" />
                                        <span class="date-separate">
                                           -
                                        </span>
                                        <label class="form-sub-label" for="month_48" id="sublabel_month" style="min-height:13px"> Month </label>
                                  </span>
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <input type="tel" class="form-textbox validate[required, disallowPast, limitDate]" id="year_48" name="year" size="4" data-maxlength="4" value="" required="" />
                                        <label class="form-sub-label" for="year_48" id="sublabel_year" style="min-height:13px"> Year </label>
                                  </span>
                                </div>
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <input type="text" class="form-textbox validate[required, disallowPast, limitDate, validateLiteDate]" id="lite_mode_48" size="12" data-maxlength="12" data-age="" value="" required="" data-format="ddmmyyyy" data-seperator="-" placeholder="dd-mm-yyyy" />
                                  <label class="form-sub-label" for="lite_mode_48" id="sublabel_litemode" style="min-height:13px"> Date </label>
                                </span>
                                <span style="white-space:nowrap;display:inline-block" class="allowTime-container">
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <div id="at_48">
                                          at
                                        </div>
                                        <label class="form-sub-label" for="at_48" style="min-height:13px">  </label>
                                  </span>
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <select class="time-dropdown form-dropdown validate[required, disallowPast, limitDate]" id="hour_48" name="hour">
                                          <option>  </option>
                                          <option value="01" selected=""> 01 </option>
                                          <option value="02"> 02 </option>
                                          <option value="03"> 03 </option>
                                          <option value="04"> 04 </option>
                                          <option value="05"> 05 </option>
                                          <option value="06"> 06 </option>
                                          <option value="07"> 07 </option>
                                          <option value="08"> 08 </option>
                                          <option value="09"> 09 </option>
                                          <option value="10"> 10 </option>
                                          <option value="11"> 11 </option>
                                          <option value="12"> 12 </option>
                                        </select>
                                        <span class="date-separate">
                                           :
                                        </span>
                                        <label class="form-sub-label" for="hour_48" id="sublabel_hour" style="min-height:13px"> Hour </label>
                                  </span>
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <select class="time-dropdown form-dropdown validate[required, disallowPast, limitDate]" id="min_48" name="min">
                                          <option>  </option>
                                          <option value="00" selected=""> 00 </option>
                                          <option value="01"> 01 </option>
                                          <option value="02"> 02 </option>
                                          <option value="03"> 03 </option>
                                          <option value="04"> 04 </option>
                                          <option value="05"> 05 </option>
                                          <option value="06"> 06 </option>
                                          <option value="07"> 07 </option>
                                          <option value="08"> 08 </option>
                                          <option value="09"> 09 </option>
                                          <option value="10"> 10 </option>
                                          <option value="11"> 11 </option>
                                          <option value="12"> 12 </option>
                                          <option value="13"> 13 </option>
                                          <option value="14"> 14 </option>
                                          <option value="15"> 15 </option>
                                          <option value="16"> 16 </option>
                                          <option value="17"> 17 </option>
                                          <option value="18"> 18 </option>
                                          <option value="19"> 19 </option>
                                          <option value="20"> 20 </option>
                                          <option value="21"> 21 </option>
                                          <option value="22"> 22 </option>
                                          <option value="23"> 23 </option>
                                          <option value="24"> 24 </option>
                                          <option value="25"> 25 </option>
                                          <option value="26"> 26 </option>
                                          <option value="27"> 27 </option>
                                          <option value="28"> 28 </option>
                                          <option value="29"> 29 </option>
                                          <option value="30"> 30 </option>
                                          <option value="31"> 31 </option>
                                          <option value="32"> 32 </option>
                                          <option value="33"> 33 </option>
                                          <option value="34"> 34 </option>
                                          <option value="35"> 35 </option>
                                          <option value="36"> 36 </option>
                                          <option value="37"> 37 </option>
                                          <option value="38"> 38 </option>
                                          <option value="39"> 39 </option>
                                          <option value="40"> 40 </option>
                                          <option value="41"> 41 </option>
                                          <option value="42"> 42 </option>
                                          <option value="43"> 43 </option>
                                          <option value="44"> 44 </option>
                                          <option value="45"> 45 </option>
                                          <option value="46"> 46 </option>
                                          <option value="47"> 47 </option>
                                          <option value="48"> 48 </option>
                                          <option value="49"> 49 </option>
                                          <option value="50"> 50 </option>
                                          <option value="51"> 51 </option>
                                          <option value="52"> 52 </option>
                                          <option value="53"> 53 </option>
                                          <option value="54"> 54 </option>
                                          <option value="55"> 55 </option>
                                          <option value="56"> 56 </option>
                                          <option value="57"> 57 </option>
                                          <option value="58"> 58 </option>
                                          <option value="59"> 59 </option>
                                        </select>
                                        <label class="form-sub-label" for="min_48" id="sublabel_minutes" style="min-height:13px"> Minutes </label>
                                  </span>
                                  <span class="form-sub-label-container" style="vertical-align:top">
                                        <select class="time-dropdown form-dropdown validate[required, disallowPast, limitDate]" id="ampm_48" name="q48_date[ampm]">
                                          <option selected="" value="AM"> AM </option>
                                          <option value="PM"> PM </option>
                                        </select>
                                        <label class="form-sub-label" for="ampm_48" style="min-height:13px">  </label>
                                  </span>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <img class="showAutoCalendar" alt="Pick a Date" id="input_48_pick" src="https://cdn.jotfor.ms/images/calendar.png" style="vertical-align:middle" data-component="datetime" />
                                  <label class="form-sub-label" for="input_48_pick" style="min-height:13px">  </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_39">
                        <label class="form-label form-label-left form-label-auto" id="label_39" for="input_39">
                          Session
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_39" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_39" name="sessionID" style="width:300px" data-component="dropdown" required="">
                              <optgroup label="الحرية">
                                  <option value="1">Monday 10:00 AM</option>
                                  <option value="2">Sunday 10:00 AM</option>
                              </optgroup>
                              <optgroup label="تيرا">
                                  <option value="3">Friday 10:00 AM</option>
                                  <option value="4">Tuesday 10:00 AM</option>
                              </optgroup>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_time" id="id_49">
                        <label class="form-label form-label-left form-label-auto" id="label_49" for="input_49_hourSelect">
                          Duration
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_49" class="form-input jf-required">
                          <div data-wrapper-react="true">
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <select class="time-dropdown form-dropdown validate[required]" id="input_49_hourSelect" name="dhour" data-component="time-hour" required="">
                                        <option>  </option>
                                        <option value="0" selected=""> 00 </option>
                                        <option value="1"> 01 </option>
                                        <option value="2"> 02 </option>
                                        <option value="3"> 03 </option>
                                        <option value="4"> 04 </option>
                                        <option value="5"> 05 </option>
                                        <option value="6"> 06 </option>
                                        <option value="7"> 07 </option>
                                        <option value="8"> 08 </option>
                                        <option value="9"> 09 </option>
                                        <option value="10"> 10 </option>
                                        <option value="11"> 11 </option>
                                        <option value="12"> 12 </option>
                                        <option value="13"> 13 </option>
                                        <option value="14"> 14 </option>
                                        <option value="15"> 15 </option>
                                        <option value="16"> 16 </option>
                                        <option value="17"> 17 </option>
                                        <option value="18"> 18 </option>
                                        <option value="19"> 19 </option>
                                        <option value="20"> 20 </option>
                                        <option value="21"> 21 </option>
                                        <option value="22"> 22 </option>
                                        <option value="23"> 23 </option>
                                  </select>
                                  <span class="date-separate">
                                         :
                                  </span>
                                  <label class="form-sub-label" for="input_49_hourSelect" id="sublabel_hour" style="min-height:13px"> Hour </label>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <select class="time-dropdown form-dropdown validate[required]" id="input_49_minuteSelect" name="dmin" data-component="time-minute" required="">
                                        <option>  </option>
                                        <option value="00" selected=""> 00 </option>
                                        <option value="01"> 01 </option>
                                        <option value="02"> 02 </option>
                                        <option value="03"> 03 </option>
                                        <option value="04"> 04 </option>
                                        <option value="05"> 05 </option>
                                        <option value="06"> 06 </option>
                                        <option value="07"> 07 </option>
                                        <option value="08"> 08 </option>
                                        <option value="09"> 09 </option>
                                        <option value="10"> 10 </option>
                                        <option value="11"> 11 </option>
                                        <option value="12"> 12 </option>
                                        <option value="13"> 13 </option>
                                        <option value="14"> 14 </option>
                                        <option value="15"> 15 </option>
                                        <option value="16"> 16 </option>
                                        <option value="17"> 17 </option>
                                        <option value="18"> 18 </option>
                                        <option value="19"> 19 </option>
                                        <option value="20"> 20 </option>
                                        <option value="21"> 21 </option>
                                        <option value="22"> 22 </option>
                                        <option value="23"> 23 </option>
                                        <option value="24"> 24 </option>
                                        <option value="25"> 25 </option>
                                        <option value="26"> 26 </option>
                                        <option value="27"> 27 </option>
                                        <option value="28"> 28 </option>
                                        <option value="29"> 29 </option>
                                        <option value="30"> 30 </option>
                                        <option value="31"> 31 </option>
                                        <option value="32"> 32 </option>
                                        <option value="33"> 33 </option>
                                        <option value="34"> 34 </option>
                                        <option value="35"> 35 </option>
                                        <option value="36"> 36 </option>
                                        <option value="37"> 37 </option>
                                        <option value="38"> 38 </option>
                                        <option value="39"> 39 </option>
                                        <option value="40"> 40 </option>
                                        <option value="41"> 41 </option>
                                        <option value="42"> 42 </option>
                                        <option value="43"> 43 </option>
                                        <option value="44"> 44 </option>
                                        <option value="45"> 45 </option>
                                        <option value="46"> 46 </option>
                                        <option value="47"> 47 </option>
                                        <option value="48"> 48 </option>
                                        <option value="49"> 49 </option>
                                        <option value="50"> 50 </option>
                                        <option value="51"> 51 </option>
                                        <option value="52"> 52 </option>
                                        <option value="53"> 53 </option>
                                        <option value="54"> 54 </option>
                                        <option value="55"> 55 </option>
                                        <option value="56"> 56 </option>
                                        <option value="57"> 57 </option>
                                        <option value="58"> 58 </option>
                                        <option value="59"> 59 </option>
                                  </select>
                                  <label class="form-sub-label" for="input_49_minuteSelect" id="sublabel_minutes" style="min-height:13px"> Minutes </label>
                                </span>
                                <input type="hidden" id="duration_49_ampmRange" name="q49_duration[timeRangeDuration]" value="" />
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <span id="input_49_dummy">

                                  </span>
                                  <label class="form-sub-label" for="input_49_dummy" style="min-height:13px">  </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide">
                          <div style="text-align:center" class="form-buttons-wrapper">
                                <button id="input_2" type="submit" class="form-submit-button" data-component="button">
                                  Create
                                </button>
                          </div>
                        </div>
                  </li>
                </ul>
          </div>
        </form>

    </div>
</section>
<?php
    require_once '../template/TeacherTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.7485" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){

 JotForm.calendarMonths = ["January","February","March","April","May","June","July","August","September","October","November","December"];
 JotForm.calendarDays = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
 JotForm.calendarOther = {"today":"Today"};
 var languageOptions = document.querySelectorAll('#langList li'); 
 for(var langIndex = 0; langIndex < languageOptions.length; langIndex++) { 
   languageOptions[langIndex].on('click', function(e) { setTimeout(function(){ JotForm.setCalendar("48", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":false,"custom":false,"ranges":false,"start":"","end":""}); }, 0); });
 } 
 JotForm.setCalendar("48", false, {"days":{"monday":true,"tuesday":true,"wednesday":true,"thursday":true,"friday":true,"saturday":true,"sunday":true},"future":true,"past":false,"custom":false,"ranges":false,"start":"","end":""});
          JotForm.alterTexts({"ageVerificationError":"You must be older than {minAge} years old to submit this form.","alphabetic":"This field can only contain letters","alphanumeric":"This field can only contain letters and numbers.","ccDonationMinLimitError":"Minimum amount is {minAmount} {currency}","ccInvalidCVC":"CVC number is invalid.","ccInvalidExpireDate":"Expire date is invalid.","ccInvalidNumber":"Credit Card Number is invalid.","ccMissingDetails":"Please fill up the Credit Card details.","ccMissingDonation":"Please enter numeric values for donation amount.","ccMissingProduct":"Please select at least one product.","characterLimitError":"Too many Characters.  The limit is","characterMinLimitError":"Too few characters. The minimum is","confirmClearForm":"Are you sure you want to clear the form?","confirmEmail":"E-mail does not match","currency":"This field can only contain currency values.","cyrillic":"This field can only contain cyrillic characters","dateInvalid":"This date is not valid. The date format is {format}","dateInvalidSeparate":"This date is not valid. Enter a valid {element}.","dateLimited":"This date is unavailable.","disallowDecimals":"Please enter a whole number.","email":"Enter a valid e-mail address","fillMask":"Field value must fill mask.","freeEmailError":"Free email accounts are not allowed","generalError":"There are errors on the form. Please fix them before continuing.","generalPageError":"There are errors on this page. Please fix them before continuing.","gradingScoreError":"Score total should only be less than or equal to","incompleteFields":"There are incomplete required fields. Please complete them.","inputCarretErrorA":"Input should not be less than the minimum value:","inputCarretErrorB":"Input should not be greater than the maximum value:","lessThan":"Your score should be less than or equal to","maxDigitsError":"The maximum digits allowed is","maxSelectionsError":"The maximum number of selections allowed is ","minSelectionsError":"The minimum required number of selections is ","multipleFileUploads_emptyError":"{file} is empty, please select files again without it.","multipleFileUploads_fileLimitError":"Only {fileLimit} file uploads allowed.","multipleFileUploads_minSizeError":"{file} is too small, minimum file size is {minSizeLimit}.","multipleFileUploads_onLeave":"The files are being uploaded, if you leave now the upload will be cancelled.","multipleFileUploads_sizeError":"{file} is too large, maximum file size is {sizeLimit}.","multipleFileUploads_typeError":"{file} has invalid extension. Only {extensions} are allowed.","nextButtonText":"Next","numeric":"This field can only contain numeric values","pastDatesDisallowed":"Date must not be in the past.","pleaseWait":"Please wait...","prevButtonText":"Previous","progressMiddleText":"of","required":"This field is required.","requireEveryCell":"Every cell is required.","requireEveryRow":"Every row is required.","requireOne":"At least one field required.","reviewBackText":"Back to Form","reviewSubmitText":"Review and Submit","seeAllText":"See All","submissionLimit":"Sorry! Only one entry is allowed.  Multiple submissions are disabled for this form.","submitButtonText":"Submit","uploadExtensions":"You can only upload following files:","uploadFilesize":"File size cannot be bigger than:","uploadFilesizemin":"File size cannot be smaller than:","url":"This field can only contain a valid URL","wordLimitError":"Too many words. The limit is","wordMinLimitError":"Too few words.  The minimum is"});
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"createExam","qid":"1","text":"Create Exam","type":"control_head"},{"name":"create","qid":"2","text":"Create","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"level","qid":"35","text":"Level","type":"control_radio"},{"description":"","name":"stage","qid":"36","text":"Stage","type":"control_radio"},{"description":"","name":"type","qid":"37","text":"Type","type":"control_radio"},{"description":"","name":"Of","qid":"38","subLabel":"","text":"# of Models","type":"control_dropdown"},{"description":"","name":"session","qid":"39","subLabel":"","text":"Session","type":"control_dropdown"},{"description":"","name":"time","qid":"40","text":"Time","type":"control_time"},{"description":"","name":"name","qid":"41","subLabel":"","text":"Name","type":"control_textbox"},{"description":"","name":"Of42","qid":"42","subLabel":"","text":"# of MCQ level 1","type":"control_dropdown"},{"description":"","name":"Of43","qid":"43","subLabel":"","text":"# of T&F level 3","type":"control_dropdown"},{"description":"","name":"Of44","qid":"44","subLabel":"","text":"# of MCQ level 2","type":"control_dropdown"},{"description":"","name":"Of45","qid":"45","subLabel":"","text":"# of MCQ level 3","type":"control_dropdown"},{"description":"","name":"Of46","qid":"46","subLabel":"","text":"# of T&F level 1","type":"control_dropdown"},{"description":"","name":"Of47","qid":"47","subLabel":"","text":"# of T&F level 2","type":"control_dropdown"},{"description":"","name":"date","qid":"48","text":"Date & Time","type":"control_datetime"},{"description":"","name":"duration","qid":"49","text":"Duration","type":"control_time"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"createExam","qid":"1","text":"Create Exam","type":"control_head"},{"name":"create","qid":"2","text":"Create","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"level","qid":"35","text":"Level","type":"control_radio"},{"description":"","name":"stage","qid":"36","text":"Stage","type":"control_radio"},{"description":"","name":"type","qid":"37","text":"Type","type":"control_radio"},{"description":"","name":"Of","qid":"38","subLabel":"","text":"# of Models","type":"control_dropdown"},{"description":"","name":"session","qid":"39","subLabel":"","text":"Session","type":"control_dropdown"},{"description":"","name":"time","qid":"40","text":"Time","type":"control_time"},{"description":"","name":"name","qid":"41","subLabel":"","text":"Name","type":"control_textbox"},{"description":"","name":"Of42","qid":"42","subLabel":"","text":"# of MCQ level 1","type":"control_dropdown"},{"description":"","name":"Of43","qid":"43","subLabel":"","text":"# of T&F level 3","type":"control_dropdown"},{"description":"","name":"Of44","qid":"44","subLabel":"","text":"# of MCQ level 2","type":"control_dropdown"},{"description":"","name":"Of45","qid":"45","subLabel":"","text":"# of MCQ level 3","type":"control_dropdown"},{"description":"","name":"Of46","qid":"46","subLabel":"","text":"# of T&F level 1","type":"control_dropdown"},{"description":"","name":"Of47","qid":"47","subLabel":"","text":"# of T&F level 2","type":"control_dropdown"},{"description":"","name":"date","qid":"48","text":"Date & Time","type":"control_datetime"},{"description":"","name":"duration","qid":"49","text":"Duration","type":"control_time"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
