<?php
    //require_once 'StudentSession.php';
    require_once '../lib/ask.php';
    require_once '../lib/student.php';
    require_once '../template/StudentTemplate/head.tpl';
    $student = Student::retreiveStudentById($_SESSION['studentID']);
    $countMessages = Message::countNewMessages($student['studentID']);
    require_once '../template/StudentTemplate/askCSS.tpl';
    require_once '../template/StudentTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->

<section class="page-header" data-stellar-background-ratio="1.2">

        <div class="container">

                <div class="row">

                        <div class="col-sm-12 text-center">


                                <h3>
                                        Edit My Profile
                                </h3>

                                <p class="page-breadcrumb">
                                        <a href="material.php">Home</a> / Ask
                                </p>


                        </div>

                </div> <!-- end .row  -->

        </div> <!-- end .container  -->

</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['send'])){
        //collect data
        $message = $_POST['message'];
        $date = date("d-m-20y");
        $time = date("h:i A");
        $image = $_FILES['image']['name'];
        $imageTmp = $_FILES['image']['tmp_name'];
        if(is_null($image)){
            $ask = new Ask($message, $date, $time, $student['studentID']);
            if(is_numeric($ask->add())){
            echo '<div class="container greenMessage">
                    <p>Your Request has been sent Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
            }else{
                echo '<div class="container redMessage">
                        <p>Your Request did not sent <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
        }else{
            $ask = new Ask($message, $date, $time, $student['studentID'], $image, $imageTmp);
            if(is_numeric($ask->add())){
            echo '<div class="container greenMessage">
                    <p>Your Request has been sent Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
            }else{
                echo '<div class="container redMessage">
                        <p>Your Request did not sent <i class="fa fa-frown-o"></i> Please try Again !</p>
                    </div>';
            }
        }
        
    }
?>
<section>
    <div class="container">
        <!--  Content -->
        <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="formID" value="82356970666570" />
          <div class="form-all">
                <ul class="form-section page-section">
                  <li id="cid_1" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                                <h2 id="header_1" class="form-header" data-component="header">
                                  Ask a Question
                                </h2>
                                <div id="subHeader_1" class="form-subHeader">
                                  Write a question and you can attach image with your question
                                </div>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textarea" id="id_5">
                        <label class="form-label form-label-left form-label-auto" id="label_5" for="input_5">
                          Ask a Question
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_5" class="form-input jf-required">
                          <textarea id="input_5" class="form-textarea validate[required]" name="message" cols="60" rows="10" data-component="textarea" required=""></textarea>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_fileupload" id="id_4">
                        <label class="form-label form-label-left form-label-auto" id="label_4" for="input_4"> Add Image </label>
                        <div id="cid_4" class="form-input">
                          <div data-wrapper-react="true">
                                <div data-wrapper-react="true">
                                  <div class="qq-uploader-buttonText-value">
                                      
                                  </div>
                                  <input type="file" id="input_69" name="image"  data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="10854" data-file-minsize="0" data-file-limit="" data-component="fileupload" />
                                </div>
                          </div>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide">
                          <div style="text-align:center" class="form-buttons-wrapper">
                                <button id="input_2" type="submit" class="form-submit-button" data-component="button">
                                  Submit
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
    require_once '../template/StudentTemplate/footer.tpl';
?>
<!-- form js -->
<script src="https://cdn.jotfor.ms/js/vendor/imageinfo.js?v=3.3.7321" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/file-uploader/fileuploader.js?v=3.3.7321"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.7321" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
          JotForm.alterTexts({"ageVerificationError":"You must be older than {minAge} years old to submit this form.","alphabetic":"This field can only contain letters","alphanumeric":"This field can only contain letters and numbers.","ccDonationMinLimitError":"Minimum amount is {minAmount} {currency}","ccInvalidCVC":"CVC number is invalid.","ccInvalidExpireDate":"Expire date is invalid.","ccInvalidNumber":"Credit Card Number is invalid.","ccMissingDetails":"Please fill up the Credit Card details.","ccMissingDonation":"Please enter numeric values for donation amount.","ccMissingProduct":"Please select at least one product.","characterLimitError":"Too many Characters.  The limit is","characterMinLimitError":"Too few characters. The minimum is","confirmClearForm":"Are you sure you want to clear the form?","confirmEmail":"E-mail does not match","currency":"This field can only contain currency values.","cyrillic":"This field can only contain cyrillic characters","dateInvalid":"This date is not valid. The date format is {format}","dateInvalidSeparate":"This date is not valid. Enter a valid {element}.","dateLimited":"This date is unavailable.","disallowDecimals":"Please enter a whole number.","email":"Enter a valid e-mail address","fillMask":"Field value must fill mask.","freeEmailError":"Free email accounts are not allowed","generalError":"There are errors on the form. Please fix them before continuing.","generalPageError":"There are errors on this page. Please fix them before continuing.","gradingScoreError":"Score total should only be less than or equal to","incompleteFields":"There are incomplete required fields. Please complete them.","inputCarretErrorA":"Input should not be less than the minimum value:","inputCarretErrorB":"Input should not be greater than the maximum value:","lessThan":"Your score should be less than or equal to","maxDigitsError":"The maximum digits allowed is","maxSelectionsError":"The maximum number of selections allowed is ","minSelectionsError":"The minimum required number of selections is ","multipleFileUploads_emptyError":"{file} is empty, please select files again without it.","multipleFileUploads_fileLimitError":"Only {fileLimit} file uploads allowed.","multipleFileUploads_minSizeError":"{file} is too small, minimum file size is {minSizeLimit}.","multipleFileUploads_onLeave":"The files are being uploaded, if you leave now the upload will be cancelled.","multipleFileUploads_sizeError":"{file} is too large, maximum file size is {sizeLimit}.","multipleFileUploads_typeError":"{file} has invalid extension. Only {extensions} are allowed.","nextButtonText":"Next","numeric":"This field can only contain numeric values","pastDatesDisallowed":"Date must not be in the past.","pleaseWait":"Please wait...","prevButtonText":"Previous","progressMiddleText":"of","required":"This field is required.","requireEveryCell":"Every cell is required.","requireEveryRow":"Every row is required.","requireOne":"At least one field required.","reviewBackText":"Back to Form","reviewSubmitText":"Review and Submit","seeAllText":"See All","submissionLimit":"Sorry! Only one entry is allowed.  Multiple submissions are disabled for this form.","submitButtonText":"Submit","uploadExtensions":"You can only upload following files:","uploadFilesize":"File size cannot be bigger than:","uploadFilesizemin":"File size cannot be smaller than:","url":"This field can only contain a valid URL","wordLimitError":"Too many words. The limit is","wordMinLimitError":"Too few words.  The minimum is"});
        JotForm.clearFieldOnHide="disable";
          setTimeout(function() {
                  JotForm.initMultipleUploads();
          }, 2);
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"askA1","qid":"1","text":"Ask a Question ","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},null,{"description":"","name":"input4","qid":"4","subLabel":"","text":"Add Images","type":"control_fileupload"},{"description":"","name":"askA","qid":"5","subLabel":"","text":"Ask a Question","type":"control_textarea"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"askA1","qid":"1","text":"Ask a Question ","type":"control_head"},{"name":"submit2","qid":"2","text":"Submit","type":"control_button"},null,{"description":"","name":"input4","qid":"4","subLabel":"","text":"Add Images","type":"control_fileupload"},{"description":"","name":"askA","qid":"5","subLabel":"","text":"Ask a Question","type":"control_textarea"}]);}, 20); 
</script>
<?php
    require_once '../template/StudentTemplate/end.tpl';
?>
