<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/question.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/filterQuestionsCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Filter The Questions
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Filter The Questions
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
            if($_GET['action']){
                echo '<form class="jotform-form" action="addQuestion.php" method="post" accept-charset="utf-8">
                <input type="hidden" name="formID" value="82613909969574" />
                <div class="form-all">
                      <ul class="form-section page-section">
                        <li id="cid_1" class="form-input-wide" data-type="control_head">
                              <div class="form-header-group ">
                                <div class="header-text httal htvam">
                                      <h2 id="header_1" class="form-header" data-component="header">
                                        Filter The Questions
                                      </h2>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_3">
                              <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3">
                                Level
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_3" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="5" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_0" name="level" value="1" required="" />
                                        <label id="label_input_3_0" for="input_3_0"> 1 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_1" name="level" value="2" required="" />
                                        <label id="label_input_3_1" for="input_3_1"> 2 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_2" name="level" value="3" required="" />
                                        <label id="label_input_3_2" for="input_3_2"> 3 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_3" name="level" value="4" required="" />
                                        <label id="label_input_3_3" for="input_3_3"> 4 </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_4">
                              <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4">
                                Stage
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_4" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_4_0" name="stage" value="Preparatory" required="" />
                                        <label id="label_input_4_0" for="input_4_0"> Preparatory </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_4_1" name="stage" value="Secondary" required="" />
                                        <label id="label_input_4_1" for="input_4_1"> Secondary </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_4_2" name="stage" value="Academic" required="" />
                                        <label id="label_input_4_2" for="input_4_2"> Academic </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_6">
                              <label class="form-label form-label-left form-label-auto" id="label_6" for="input_6">
                                Type
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_6" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="3" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_6_0" name="type" value="Arabic" required="" />
                                        <label id="label_input_6_0" for="input_6_0"> Arabic </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_6_1" name="type" value="English" required="" />
                                        <label id="label_input_6_1" for="input_6_1"> English </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_5">
                              <label class="form-label form-label-left form-label-auto" id="label_5" for="input_5">
                                Category
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_5" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="3" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_5_0" name="category" value="MCQ" required="" />
                                        <label id="label_input_5_0" for="input_5_0"> MCQ </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_5_1" name="category" value="TrueFalse" required="" />
                                        <label id="label_input_5_1" for="input_5_1"> True & False </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_8">
                              <label class="form-label form-label-left form-label-auto" id="label_8" for="input_8">
                                Difficulty
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_8" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_8_0" name="difficulty" value="1" required="" />
                                        <label id="label_input_8_0" for="input_8_0"> 1 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_8_1" name="difficulty" value="2" required="" />
                                        <label id="label_input_8_1" for="input_8_1"> 2 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_8_2" name="difficulty" value="3" required="" />
                                        <label id="label_input_8_2" for="input_8_2"> 3 </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line" data-type="control_button" id="id_2">
                              <div id="cid_2" class="form-input-wide">
                                <div style="text-align:center" class="form-buttons-wrapper">
                                      <button id="input_2" type="submit" name="submit" value="submit" class="form-submit-button" data-component="button">
                                        Submit
                                      </button>
                                </div>
                              </div>
                        </li>
                      </ul>
                </div>
              </form>';
            }else{
                echo '<form class="jotform-form" action="questions.php" method="post" accept-charset="utf-8">
                <input type="hidden" name="formID" value="82613909969574" />
                <div class="form-all">
                      <ul class="form-section page-section">
                        <li id="cid_1" class="form-input-wide" data-type="control_head">
                              <div class="form-header-group ">
                                <div class="header-text httal htvam">
                                      <h2 id="header_1" class="form-header" data-component="header">
                                        Filter The Questions
                                      </h2>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_3">
                              <label class="form-label form-label-left form-label-auto" id="label_3" for="input_3">
                                Level
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_3" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="5" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_0" name="level" value="1" required="" />
                                        <label id="label_input_3_0" for="input_3_0"> 1 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_1" name="level" value="2" required="" />
                                        <label id="label_input_3_1" for="input_3_1"> 2 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_2" name="level" value="3" required="" />
                                        <label id="label_input_3_2" for="input_3_2"> 3 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_3" name="level" value="4" required="" />
                                        <label id="label_input_3_3" for="input_3_3"> 4 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_3_4" name="level" value="All" required="" />
                                        <label id="label_input_3_4" for="input_3_4"> All </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_4">
                              <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4">
                                Stage
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_4" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_4_0" name="stage" value="Preparatory" required="" />
                                        <label id="label_input_4_0" for="input_4_0"> Preparatory </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_4_1" name="stage" value="Secondary" required="" />
                                        <label id="label_input_4_1" for="input_4_1"> Secondary </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_4_2" name="stage" value="Academic" required="" />
                                        <label id="label_input_4_2" for="input_4_2"> Academic </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_4_3" name="stage" value="All" required="" />
                                        <label id="label_input_4_3" for="input_4_3"> All </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_6">
                              <label class="form-label form-label-left form-label-auto" id="label_6" for="input_6">
                                Type
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_6" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="3" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_6_0" name="type" value="Arabic" required="" />
                                        <label id="label_input_6_0" for="input_6_0"> Arabic </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_6_1" name="type" value="English" required="" />
                                        <label id="label_input_6_1" for="input_6_1"> English </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_6_2" name="type" value="All" required="" />
                                        <label id="label_input_6_2" for="input_6_2"> All </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_5">
                              <label class="form-label form-label-left form-label-auto" id="label_5" for="input_5">
                                Category
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_5" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="3" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_5_0" name="category" value="MCQ" required="" />
                                        <label id="label_input_5_0" for="input_5_0"> MCQ </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_5_1" name="category" value="TrueFalse" required="" />
                                        <label id="label_input_5_1" for="input_5_1"> True & False </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_5_2" name="category" value="All" required="" />
                                        <label id="label_input_5_2" for="input_5_2"> All </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line jf-required" data-type="control_radio" id="id_8">
                              <label class="form-label form-label-left form-label-auto" id="label_8" for="input_8">
                                Difficulty
                                <span class="form-required">
                                      *
                                </span>
                              </label>
                              <div id="cid_8" class="form-input jf-required">
                                <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_8_0" name="difficulty" value="1" required="" />
                                        <label id="label_input_8_0" for="input_8_0"> 1 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_8_1" name="difficulty" value="2" required="" />
                                        <label id="label_input_8_1" for="input_8_1"> 2 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_8_2" name="difficulty" value="3" required="" />
                                        <label id="label_input_8_2" for="input_8_2"> 3 </label>
                                      </span>
                                      <span class="form-radio-item">
                                        <span class="dragger-item">
                                        </span>
                                        <input type="radio" class="form-radio validate[required]" id="input_8_3" name="difficulty" value="All" required="" />
                                        <label id="label_input_8_3" for="input_8_3"> All </label>
                                      </span>
                                </div>
                              </div>
                        </li>
                        <li class="form-line" data-type="control_button" id="id_2">
                              <div id="cid_2" class="form-input-wide">
                                <div style="text-align:center" class="form-buttons-wrapper">
                                      <button id="input_2" type="submit" name="submit" value="submit" class="form-submit-button" data-component="button">
                                        Submit
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
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.7627" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
          JotForm.alterTexts(undefined);
        JotForm.clearFieldOnHide="disable";
        JotForm.submitError="jumpToFirstError";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"filterThe","qid":"1","text":"Filter The Questions","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"description":"","name":"level","qid":"3","text":"Level","type":"control_radio"},{"description":"","name":"stage","qid":"4","text":"Stage","type":"control_radio"},{"description":"","name":"category","qid":"5","text":"Category","type":"control_radio"},{"description":"","name":"type","qid":"6","text":"Type","type":"control_radio"},null,{"description":"","name":"difficulty","qid":"8","text":"Difficulty","type":"control_radio"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"filterThe","qid":"1","text":"Filter The Questions","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},{"description":"","name":"level","qid":"3","text":"Level","type":"control_radio"},{"description":"","name":"stage","qid":"4","text":"Stage","type":"control_radio"},{"description":"","name":"category","qid":"5","text":"Category","type":"control_radio"},{"description":"","name":"type","qid":"6","text":"Type","type":"control_radio"},null,{"description":"","name":"difficulty","qid":"8","text":"Difficulty","type":"control_radio"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
