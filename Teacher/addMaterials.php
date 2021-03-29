<?php
    //require_once 'TeacherSession.php';
    require_once '../lib/material.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/addMaterialsCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    ADD Material
                </h3>
                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / Add Material
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['add'])){
        //collect data
        $name = $_POST['name'];
        $date = date("d-m-20y");
        $time = date("h:i A");
        $level = $_POST['level'];
        $stage = $_POST['stage'];
        $type = $_POST['type'];
        $fileName = $_FILES['fileName']['name'];
        $fileNameTmp = $_FILES['fileName']['tmp_name'];
        $material = new Material($name, $date, $time, $level, $stage, $type, $fileName, $fileNameTmp);
        if(is_numeric($material->addMaterial())){
            echo '<div class="container greenMessage">
                    <p>The Material has been saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Material is not Saved <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
        }
    }
?>
<section>
    <div class="container">
    <!--  Content -->
        <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
          <input type="hidden" name="formID" value="82356970666570" />
          <div class="form-all">
                <ul class="form-section page-section">
                  <li id="cid_1" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                                <h2 id="header_1" class="form-header" data-component="header">
                                  ADD Material
                                </h2>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textbox" id="id_19">
                        <label class="form-label form-label-left form-label-auto" id="label_19" for="input_19">
                          Name
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_19" class="form-input jf-required">
                          <input type="text" id="input_19" name="name" data-type="input-textbox" class="form-textbox validate[required]" size="30" value="" data-component="textbox" required="" />
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_radio" id="id_15">
                        <label class="form-label form-label-left form-label-auto" id="label_15" for="input_15">
                          Level
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_15" class="form-input jf-required">
                          <div class="form-multiple-column" data-columncount="4" data-component="radio">
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_15_0" name="level" value="1" required="" />
                                  <label id="label_input_15_0" for="input_15_0"> 1 </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_15_1" name="level" value="2" required="" />
                                  <label id="label_input_15_1" for="input_15_1"> 2 </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_15_2" name="level" value="3" required="" />
                                  <label id="label_input_15_2" for="input_15_2"> 3 </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_15_3" name="level" value="4" required="" />
                                  <label id="label_input_15_3" for="input_15_3"> 4 </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_radio" id="id_16">
                        <label class="form-label form-label-left form-label-auto" id="label_16" for="input_16">
                          Stage
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_16" class="form-input jf-required">
                          <div class="form-multiple-column" data-columncount="3" data-component="radio">
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_16_0" name="stage" value="Preparatory" required="" />
                                  <label id="label_input_16_0" for="input_16_0"> Preparatory </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_16_1" name="stage" value="Secondary" required="" />
                                  <label id="label_input_16_1" for="input_16_1"> Secondary </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_16_2" name="stage" value="Academic" required="" />
                                  <label id="label_input_16_2" for="input_16_2"> Academic </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_radio" id="id_17">
                        <label class="form-label form-label-left form-label-auto" id="label_17" for="input_17">
                          Type
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_17" class="form-input jf-required">
                          <div class="form-multiple-column" data-columncount="2" data-component="radio">
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_17_0" name="type" value="Arabic" required="" />
                                  <label id="label_input_17_0" for="input_17_0"> Arabic </label>
                                </span>
                                <span class="form-radio-item">
                                  <span class="dragger-item">
                                  </span>
                                  <input type="radio" class="form-radio validate[required]" id="input_17_1" name="type" value="English" required="" />
                                  <label id="label_input_17_1" for="input_17_1"> English </label>
                                </span>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_fileupload" id="id_27">
                        <label class="form-label form-label-left form-label-auto" id="label_27" for="input_27">
                          Choose File
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_27" class="form-input jf-required">
                          <input type="file" id="input_27" name="fileName" class="form-upload validate[required]" data-imagevalidate="yes" data-file-accept="pdf, doc, docx, xls, xlsx, csv, txt, rtf, html, zip, mp3, wma, mpg, flv, avi, jpg, jpeg, png, gif" data-file-maxsize="0" data-file-minsize="0" data-file-limit="" data-component="fileupload" required="" />
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
<script src="https://cdn.jotfor.ms/js/vendor/imageinfo.js?v=3.3.7324" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/prototype.forms.js" type="text/javascript"></script>
<script src="https://cdn.jotfor.ms/static/jotform.forms.js?3.3.7324" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.init(function(){
          JotForm.alterTexts({"ageVerificationError":"You must be older than {minAge} years old to submit this form.","alphabetic":"This field can only contain letters","alphanumeric":"This field can only contain letters and numbers.","ccDonationMinLimitError":"Minimum amount is {minAmount} {currency}","ccInvalidCVC":"CVC number is invalid.","ccInvalidExpireDate":"Expire date is invalid.","ccInvalidNumber":"Credit Card Number is invalid.","ccMissingDetails":"Please fill up the Credit Card details.","ccMissingDonation":"Please enter numeric values for donation amount.","ccMissingProduct":"Please select at least one product.","characterLimitError":"Too many Characters.  The limit is","characterMinLimitError":"Too few characters. The minimum is","confirmClearForm":"Are you sure you want to clear the form?","confirmEmail":"E-mail does not match","currency":"This field can only contain currency values.","cyrillic":"This field can only contain cyrillic characters","dateInvalid":"This date is not valid. The date format is {format}","dateInvalidSeparate":"This date is not valid. Enter a valid {element}.","dateLimited":"This date is unavailable.","disallowDecimals":"Please enter a whole number.","email":"Enter a valid e-mail address","fillMask":"Field value must fill mask.","freeEmailError":"Free email accounts are not allowed","generalError":"There are errors on the form. Please fix them before continuing.","generalPageError":"There are errors on this page. Please fix them before continuing.","gradingScoreError":"Score total should only be less than or equal to","incompleteFields":"There are incomplete required fields. Please complete them.","inputCarretErrorA":"Input should not be less than the minimum value:","inputCarretErrorB":"Input should not be greater than the maximum value:","lessThan":"Your score should be less than or equal to","maxDigitsError":"The maximum digits allowed is","maxSelectionsError":"The maximum number of selections allowed is ","minSelectionsError":"The minimum required number of selections is ","multipleFileUploads_emptyError":"{file} is empty, please select files again without it.","multipleFileUploads_fileLimitError":"Only {fileLimit} file uploads allowed.","multipleFileUploads_minSizeError":"{file} is too small, minimum file size is {minSizeLimit}.","multipleFileUploads_onLeave":"The files are being uploaded, if you leave now the upload will be cancelled.","multipleFileUploads_sizeError":"{file} is too large, maximum file size is {sizeLimit}.","multipleFileUploads_typeError":"{file} has invalid extension. Only {extensions} are allowed.","nextButtonText":"Next","numeric":"This field can only contain numeric values","pastDatesDisallowed":"Date must not be in the past.","pleaseWait":"Please wait...","prevButtonText":"Previous","progressMiddleText":"of","required":"This field is required.","requireEveryCell":"Every cell is required.","requireEveryRow":"Every row is required.","requireOne":"At least one field required.","reviewBackText":"Back to Form","reviewSubmitText":"Review and Submit","seeAllText":"See All","submissionLimit":"Sorry! Only one entry is allowed.  Multiple submissions are disabled for this form.","submitButtonText":"Submit","uploadExtensions":"You can only upload following files:","uploadFilesize":"File size cannot be bigger than:","uploadFilesizemin":"File size cannot be smaller than:","url":"This field can only contain a valid URL","wordLimitError":"Too many words. The limit is","wordMinLimitError":"Too few words.  The minimum is"});
        JotForm.clearFieldOnHide="disable";
        /*INIT-END*/
});

   JotForm.prepareCalculationsOnTheFly([null,{"name":"addMaterials","qid":"1","text":"ADD Materials","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"level","qid":"15","text":"Level","type":"control_radio"},{"description":"","name":"typeA16","qid":"16","text":"Stage","type":"control_radio"},{"description":"","name":"type","qid":"17","text":"Type","type":"control_radio"},null,{"description":"","name":"name","qid":"19","subLabel":"","text":"Name","type":"control_textbox"},null,null,null,null,null,null,null,{"description":"","name":"chooseFile","qid":"27","subLabel":"","text":"Choose File","type":"control_fileupload"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"addMaterials","qid":"1","text":"ADD Materials","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"level","qid":"15","text":"Level","type":"control_radio"},{"description":"","name":"typeA16","qid":"16","text":"Stage","type":"control_radio"},{"description":"","name":"type","qid":"17","text":"Type","type":"control_radio"},null,{"description":"","name":"name","qid":"19","subLabel":"","text":"Name","type":"control_textbox"},null,null,null,null,null,null,null,{"description":"","name":"chooseFile","qid":"27","subLabel":"","text":"Choose File","type":"control_fileupload"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
