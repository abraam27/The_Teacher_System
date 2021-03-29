<?php
    //require_once 'TeacherSession.php';
    require_once '../model/session.php';
    require_once '../model/center.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/addSessionCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    ADD Session
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Add Session
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['add'])){
        //collect data
        $day = $_POST['day'];
        $hour = $_POST['hour'];
        $min = $_POST['min'];
        $ampm = $_POST['ampm'];
        $time = $hour . ':' . $min . ' ' . $ampm;
        $level = $_POST['level'];
        $stage = $_POST['stage'];
        $type = $_POST['type'];
        $centerID = $_POST['centerID'];
        $session = new Session($day, $time, $level, $stage, $type, $centerID);
        if(is_numeric($session->add())){
            echo '<div class="container greenMessage">
                    <p>The Session Info has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Session Info did not Save <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
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
                                  Add Session
                                </h2>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_38">
                        <label class="form-label form-label-left form-label-auto" id="label_38" for="input_38">
                          Day
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_38" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_38" name="day" style="width:150px" data-component="dropdown" required="">
                                <option value="Monday"> Monday </option>
                                <option value="Tuesday"> Tuesday </option>
                                <option value="Wednesday"> Wednesday </option>
                                <option value="Thursday"> Thursday </option>
                                <option value="Friday"> Friday </option>
                                <option selected="" value="Saturday"> Saturday </option>
                                <option value="Sunday"> Sunday </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_time" id="id_40">
                        <label class="form-label form-label-left form-label-auto" id="label_40" for="input_40_hourSelect">
                          Time
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_40" class="form-input jf-required">
                          <div data-wrapper-react="true">
                                <span class="form-sub-label-container" style="vertical-align:top ; color:#555">
                                  <select class="time-dropdown form-dropdown validate[required]" id="input_40_hourSelect" name="hour" data-component="time-hour" required="">
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
                                  <label class="form-sub-label" for="input_40_hourSelect" id="sublabel_hour" style="min-height:13px"> Hour </label>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top ; color:#555">
                                  <select class="time-dropdown form-dropdown validate[required]" id="input_40_minuteSelect" name="min" data-component="time-minute" required="">
                                        <option>  </option>
                                        <option value="00" selected=""> 00 </option>
                                        <option value="15"> 15 </option>
                                        <option value="30"> 30 </option>
                                        <option value="45"> 45 </option>
                                  </select>
                                  <label class="form-sub-label" for="input_40_minuteSelect" id="sublabel_minutes" style="min-height:13px"> Minutes </label>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top ; color:#555">
                                  <select class="time-dropdown form-dropdown validate[required]" id="input_40_ampm" name="ampm" data-component="time-ampm" required="">
                                        <option selected="" value="AM"> AM </option>
                                        <option value="PM"> PM </option>
                                  </select>
                                  <label class="form-sub-label" for="input_40_ampm" style="min-height:13px">  </label>
                                </span>
                          </div>
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
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_39">
                        <label class="form-label form-label-left form-label-auto" id="label_39" for="input_39">
                          Center Name
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_39" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_39" name="centerID" style="width:300px" data-component="dropdown" required="">
                                
                                <option selected="" value=""> Select The Center ! </option>
                                <?php
                                    if(is_numeric($_GET['id'])){
                                        $center = Center::readById($_GET['id']);
                                        echo '<option value="'.$_GET['id'].'"> '.$center['name'].' </option>';
                                    }else{
                                        $centers = Center::readAll();
                                        if(is_array($centers) && count($centers)>0){
                                            foreach ($centers as $center) {
                                                echo '<option value="'.$center['centerID'].'"> '.$center['name'].' </option>';
                                            }
                                        }
                                    }
                                    
                                ?>
                          </select>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide">
                          <div style="text-align:center" class="form-buttons-wrapper">
                                <button id="input_2" type="submit" name="add" value="add" class="form-submit-button" data-component="button">
                                  ADD
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
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.7324" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
          JotForm.alterTexts({"ageVerificationError":"You must be older than {minAge} years old to submit this form.","alphabetic":"This field can only contain letters","alphanumeric":"This field can only contain letters and numbers.","ccDonationMinLimitError":"Minimum amount is {minAmount} {currency}","ccInvalidCVC":"CVC number is invalid.","ccInvalidExpireDate":"Expire date is invalid.","ccInvalidNumber":"Credit Card Number is invalid.","ccMissingDetails":"Please fill up the Credit Card details.","ccMissingDonation":"Please enter numeric values for donation amount.","ccMissingProduct":"Please select at least one product.","characterLimitError":"Too many Characters.  The limit is","characterMinLimitError":"Too few characters. The minimum is","confirmClearForm":"Are you sure you want to clear the form?","confirmEmail":"E-mail does not match","currency":"This field can only contain currency values.","cyrillic":"This field can only contain cyrillic characters","dateInvalid":"This date is not valid. The date format is {format}","dateInvalidSeparate":"This date is not valid. Enter a valid {element}.","dateLimited":"This date is unavailable.","disallowDecimals":"Please enter a whole number.","email":"Enter a valid e-mail address","fillMask":"Field value must fill mask.","freeEmailError":"Free email accounts are not allowed","generalError":"There are errors on the form. Please fix them before continuing.","generalPageError":"There are errors on this page. Please fix them before continuing.","gradingScoreError":"Score total should only be less than or equal to","incompleteFields":"There are incomplete required fields. Please complete them.","inputCarretErrorA":"Input should not be less than the minimum value:","inputCarretErrorB":"Input should not be greater than the maximum value:","lessThan":"Your score should be less than or equal to","maxDigitsError":"The maximum digits allowed is","maxSelectionsError":"The maximum number of selections allowed is ","minSelectionsError":"The minimum required number of selections is ","multipleFileUploads_emptyError":"{file} is empty, please select files again without it.","multipleFileUploads_fileLimitError":"Only {fileLimit} file uploads allowed.","multipleFileUploads_minSizeError":"{file} is too small, minimum file size is {minSizeLimit}.","multipleFileUploads_onLeave":"The files are being uploaded, if you leave now the upload will be cancelled.","multipleFileUploads_sizeError":"{file} is too large, maximum file size is {sizeLimit}.","multipleFileUploads_typeError":"{file} has invalid extension. Only {extensions} are allowed.","nextButtonText":"Next","numeric":"This field can only contain numeric values","pastDatesDisallowed":"Date must not be in the past.","pleaseWait":"Please wait...","prevButtonText":"Previous","progressMiddleText":"of","required":"This field is required.","requireEveryCell":"Every cell is required.","requireEveryRow":"Every row is required.","requireOne":"At least one field required.","reviewBackText":"Back to Form","reviewSubmitText":"Review and Submit","seeAllText":"See All","submissionLimit":"Sorry! Only one entry is allowed.  Multiple submissions are disabled for this form.","submitButtonText":"Submit","uploadExtensions":"You can only upload following files:","uploadFilesize":"File size cannot be bigger than:","uploadFilesizemin":"File size cannot be smaller than:","url":"This field can only contain a valid URL","wordLimitError":"Too many words. The limit is","wordMinLimitError":"Too few words.  The minimum is"});
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"addSession","qid":"1","text":"Add Session","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"level","qid":"35","text":"Level","type":"control_radio"},{"description":"","name":"stage","qid":"36","text":"Stage","type":"control_radio"},{"description":"","name":"type","qid":"37","text":"Type","type":"control_radio"},{"description":"","name":"day","qid":"38","subLabel":"","text":"Day","type":"control_dropdown"},{"description":"","name":"typeA39","qid":"39","subLabel":"","text":"Center Name","type":"control_dropdown"},{"description":"","name":"time","qid":"40","text":"Time","type":"control_time"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"addSession","qid":"1","text":"Add Session","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"level","qid":"35","text":"Level","type":"control_radio"},{"description":"","name":"stage","qid":"36","text":"Stage","type":"control_radio"},{"description":"","name":"type","qid":"37","text":"Type","type":"control_radio"},{"description":"","name":"day","qid":"38","subLabel":"","text":"Day","type":"control_dropdown"},{"description":"","name":"typeA39","qid":"39","subLabel":"","text":"Center Name","type":"control_dropdown"},{"description":"","name":"time","qid":"40","text":"Time","type":"control_time"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
