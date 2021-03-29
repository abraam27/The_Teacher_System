<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/ask.php';
    require_once '../model/message.php';
    require_once '../lib/student.php';
    if(is_numeric($_GET['id'])){
        $studentID = $_GET['id'];
    }
    $student = Student::retreiveStudentById($studentID);
    Ask::changeViewStatus($_GET['askID']);
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/sendMessageCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    Send Message to <?php echo $student['firstName'] . ' ' . $student['middleName'] . ' ' . $student['lastName']; ?>
                </h3>
                <p class="page-breadcrumb">
                    <a href="Template.php">Home</a> / Send Message
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->

<!--  Content -->
<section>
    <div class="container">
        <!--  Content -->	
        <form class="jotform-form" action="messages.php" method="post" name="form_82356970666570" id="82356970666570" accept-charset="utf-8">
            <input type="hidden" name="studentID" value="<?php echo $studentID;?>" />
            <input type="hidden" name="askID" value="<?php echo $_GET['askID'];?>" />
          <div class="form-all">
                <ul class="form-section page-section">
                  <li id="cid_1" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                                <h2 id="header_1" class="form-header" data-component="header">
                                  Send a Message
                                </h2>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textarea" id="id_28">
                        <label class="form-label form-label-left form-label-auto" id="label_28" for="input_28">
                          Message
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_28" class="form-input jf-required">
                          <textarea id="input_28" class="form-textarea validate[required]" name="message" cols="40" rows="6" data-component="textarea" required=""></textarea>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_image" id="id_29">
                        <div id="cid_29" class="form-input-wide">
                          <div style="text-align:center">
                                <img alt="" class="form-image" style="border:0" src="https://www.jotform.com/images/image_placeholder.png" height="100px" width="120px" data-component="image" />
                          </div>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide">
                          <div style="text-align:center" class="form-buttons-wrapper">
                                <button id="input_2" type="submit" name="send" value="send"class="form-submit-button" data-component="button">
                                  SEND
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

   JotForm.prepareCalculationsOnTheFly([null,{"name":"sendA","qid":"1","text":"Send a Message","type":"control_head"},{"name":"send","qid":"2","text":"SEND","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"message","qid":"28","subLabel":"","text":"Message","type":"control_textarea"},{"description":"","labelText":"","name":"image","qid":"29","text":"Image","type":"control_image"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"sendA","qid":"1","text":"Send a Message","type":"control_head"},{"name":"send","qid":"2","text":"SEND","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"message","qid":"28","subLabel":"","text":"Message","type":"control_textarea"},{"description":"","labelText":"","name":"image","qid":"29","text":"Image","type":"control_image"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
