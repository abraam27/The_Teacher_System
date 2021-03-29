<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/student.php';
    require_once '../model/session.php';
    require_once '../template/TeacherTemplate/head.tpl';
    if(isset($_GET['id'])){
        $_SESSION["sessionID"] = $_GET['id'];
    }
    $session = Session::readById($_SESSION["sessionID"]);
    require_once '../template/TeacherTemplate/addStudentCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Add Student
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Add Student
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['add'])){
        //collect data
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $lastName = $_POST['lastName'];
        $level = $session['level'];
        $stage = $session['stage'];
        $type = $session['type'];
        $school = $_POST['school'];
        $district = $_POST['district'];
        $gender = $_POST['gender'];
        $phoneNO = $_POST['phoneNO'];
        $ownerPhoneNO = $_POST['ownerPhoneNO'];
        $email = $_POST['email'];
        $password = Student::generatePassword();
        $sessionID = $session['sessionID'];
        $student = new Student($firstName, $middleName, $lastName, $level, $stage, $type, $school, $district, $gender, $phoneNO, $ownerPhoneNO, $email, $password, $sessionID);
        if(is_numeric($student->addStudent())){
            echo '<div class="container greenMessage">
                    <p>The Student Info has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Student Info did not Save <i class="fa fa-frown-o"></i> Please try Again !</p>
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
                                  ADD Student
                                </h2>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_fullname" id="id_4">
                        <label class="form-label form-label-left form-label-auto" id="label_4" for="first_4">
                          Name
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_4" class="form-input jf-required">
                          <div data-wrapper-react="true">
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <input type="text" id="first_4" name="firstName" class="form-textbox validate[required]" size="10" value="" data-component="first" required="" />
                                  <label class="form-sub-label" for="first_4" id="sublabel_first" style="min-height:13px"> First Name </label>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <input type="text" id="middle_4" name="middleName" class="form-textbox" size="10" value="" data-component="middle" required="" />
                                  <label class="form-sub-label" for="middle_4" id="sublabel_middle" style="min-height:13px"> Middle Name </label>
                                </span>
                                <span class="form-sub-label-container" style="vertical-align:top">
                                  <input type="text" id="last_4" name="lastName" class="form-textbox validate[required]" size="15" value="" data-component="last" required="" />
                                  <label class="form-sub-label" for="last_4" id="sublabel_last" style="min-height:13px"> Last Name </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_8">
                        <label class="form-label form-label-left form-label-auto" id="label_8" for="input_8">
                          School Name
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_8" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_8" name="school" style="width:510px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option value="السعيدية"> السعيدية </option>
                                <option value="ام الابطال"> ام الابطال </option>
                                <option value="احمد لطفى"> احمد لطفى </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_dropdown" id="id_9">
                        <label class="form-label form-label-left form-label-auto" id="label_9" for="input_9">
                          District
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_9" class="form-input jf-required">
                          <select class="form-dropdown validate[required]" id="input_9" name="district" style="width:300px" data-component="dropdown" required="">
                                <option value="">  </option>
                                <option value="الجيزة"> الجيزة </option>
                                <option value="العمرانية"> العمرانية </option>
                                <option value="الهرم"> الهرم </option>
                                <option value="الدقى"> الدقى </option>
                          </select>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_radio" id="id_10">
                        <label class="form-label form-label-left form-label-auto" id="label_10" for="input_10">
                          Gender
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_10" class="form-input jf-required">
                          <div class="form-single-column" data-component="radio">
                                <span class="form-radio-item" style="clear:left">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_10_0" name="gender" value="Male" required="" />
                                  <label id="label_input_10_0" for="input_10_0"> Male </label>
                                </span>
                                <span class="form-radio-item" style="clear:left">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_10_1" name="gender" value="Female" required="" />
                                  <label id="label_input_10_1" for="input_10_1"> Female </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textbox" id="id_11">
                        <label class="form-label form-label-left form-label-auto" id="label_11" for="input_11">
                          Phone
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_11" class="form-input jf-required">
                          <input type="text" id="input_11" name="phoneNO" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="30" value="" data-component="textbox" required="" />
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textbox" id="id_12">
                        <label class="form-label form-label-left form-label-auto" id="label_12" for="input_12">
                          Owner Phone
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_12" class="form-input jf-required">
                          <input type="text" id="input_12" name="ownerPhoneNO" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="30" value="" data-component="textbox" required="" />
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_email" id="id_13">
                        <label class="form-label form-label-left form-label-auto" id="label_13" for="input_13">
                          Email
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_13" class="form-input jf-required">
                          <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="email" id="input_13" name="email" class="form-textbox validate[required, Email]" size="30" value="-" data-component="email" required="" />
                                <label class="form-sub-label" for="input_13" style="min-height:13px"> example@example.com </label>
                          </span>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide">
                          <div style="text-align:center" class="form-buttons-wrapper">
                                <button id="input_2" type="submit" name="add" value="add" class="form-submit-button" data-component="button" style="margin-right: 10px">
                                  ADD 
                                </button>
                                <button id="input_2" type="submit" name="finish" value="finish" formaction="centerList.php" class="form-submit-button" data-component="button">
                                  FINISH 
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

   JotForm.prepareCalculationsOnTheFly([null,{"name":"addStudent","qid":"1","text":"ADD Student","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},null,{"description":"","name":"name","qid":"4","text":"Name","type":"control_fullname"},null,null,null,{"description":"","name":"schoolName","qid":"8","subLabel":"","text":"School Name","type":"control_dropdown"},{"description":"","name":"typeA9","qid":"9","subLabel":"","text":"District","type":"control_dropdown"},{"description":"","name":"gender","qid":"10","text":"Gender","type":"control_radio"},{"description":"","name":"phone","qid":"11","subLabel":"","text":"Phone","type":"control_textbox"},{"description":"","name":"ownerPhone","qid":"12","subLabel":"","text":"Owner Phone","type":"control_textbox"},{"description":"","name":"email13","qid":"13","subLabel":"example@example.com","text":"Email","type":"control_email"},{"description":"","name":"lastOne","qid":"14","text":"Last One","type":"control_radio"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"addStudent","qid":"1","text":"ADD Student","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},null,{"description":"","name":"name","qid":"4","text":"Name","type":"control_fullname"},null,null,null,{"description":"","name":"schoolName","qid":"8","subLabel":"","text":"School Name","type":"control_dropdown"},{"description":"","name":"typeA9","qid":"9","subLabel":"","text":"District","type":"control_dropdown"},{"description":"","name":"gender","qid":"10","text":"Gender","type":"control_radio"},{"description":"","name":"phone","qid":"11","subLabel":"","text":"Phone","type":"control_textbox"},{"description":"","name":"ownerPhone","qid":"12","subLabel":"","text":"Owner Phone","type":"control_textbox"},{"description":"","name":"email13","qid":"13","subLabel":"example@example.com","text":"Email","type":"control_email"},{"description":"","name":"lastOne","qid":"14","text":"Last One","type":"control_radio"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
