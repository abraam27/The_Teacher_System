<?php
    //require_once 'TeacherSession.php';
    require_once '../model/center.php';
    require_once '../template/TeacherTemplate/head.tpl';
    require_once '../template/TeacherTemplate/addCenterCSS.tpl';
    require_once '../template/TeacherTemplate/navbar.tpl';
?>
<!--  PAGE HEADING -->
<section class="page-header" data-stellar-background-ratio="1.2">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center">
                <h3>
                    ADD Center
                </h3>
                <p class="page-breadcrumb">
                    <a href="HospitalHome.php">Home</a> / Add Center
                </p>
            </div>
        </div> <!-- end .row  -->
    </div> <!-- end .container  -->
</section> <!-- end .page-header  -->
<?php
    if(isset($_POST['add'])){
        //collect data
        $name = $_POST['name'];
        $address = $_POST['address'];
        $district = $_POST['district'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $email = $_POST['email'];
        $center = new Center($name, $address, $district, $phone1, $phone2, $email);
        if(is_numeric($center->add())){
            echo '<div class="container greenMessage">
                    <p>The Center Info has been Saved Successfully <i class="fa fa-smile-o"></i> !</p>
		</div>';
        }else{
            echo '<div class="container redMessage">
                    <p>The Center Info did not Save <i class="fa fa-frown-o"></i> Please try Again !</p>
                </div>';
        }
    }
?>
<section>
    <div class="container">
        <!--  Content -->	
        <form class="jotform-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post" accept-charset="UTF-8">
          <input type="hidden" name="formID" value="82356970666570" />
          <div class="form-all">
                <ul class="form-section page-section">
                  <li id="cid_1" class="form-input-wide" data-type="control_head">
                        <div class="form-header-group ">
                          <div class="header-text httal htvam">
                                <h2 id="header_1" class="form-header" data-component="header">
                                  Add Center
                                </h2>
                          </div>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textbox" id="id_30">
                        <label class="form-label form-label-left form-label-auto" id="label_30" for="input_30">
                          Name
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_30" class="form-input jf-required">
                          <input type="text" id="input_30" name="name" data-type="input-textbox" class="form-textbox validate[required]" size="30" value="" data-component="textbox" required="" />
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_address" id="id_32">
                        <label class="form-label form-label-left form-label-auto" id="label_32" for="input_32_addr_line1">
                          Address
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_32" class="form-input jf-required">
                          <table summary="" class="form-address-table" border="0" cellPadding="0" cellSpacing="0">
                                <tbody>
                                  <tr>
                                        <td colSpan="2">
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="text" id="input_32_addr_line1" name="address" class="form-textbox validate[required] form-address-line" value="" data-component="address_line_1" required="" />
                                                <label class="form-sub-label" for="input_32_addr_line1" id="sublabel_32_addr_line1" style="min-height:13px"> Street Address </label>
                                          </span>
                                        </td>
                                  </tr>
                                  <tr>
                                        <td width="50%">
                                          <span class="form-sub-label-container" style="vertical-align:top">
                                                <input type="text" id="input_32_city" name="district" class="form-textbox validate[required] form-address-city" size="21" value="" data-component="city" required="" />
                                                <label class="form-sub-label" for="input_32_city" id="sublabel_32_city" style="min-height:13px"> District </label>
                                          </span>
                                        </td>
                                  </tr>
                                </tbody>
                          </table>
                        </div>
                  </li>
                  <li class="form-line jf-required" data-type="control_textbox" id="id_31">
                        <label class="form-label form-label-left form-label-auto" id="label_31" for="input_31">
                          Phone # 1
                          <span class="form-required">
                                *
                          </span>
                        </label>
                        <div id="cid_31" class="form-input jf-required">
                          <input type="text" id="input_31" name="phone1" data-type="input-textbox" class="form-textbox validate[required, Numeric]" size="30" value="" data-component="textbox" required="" />
                        </div>
                  </li>
                  <li class="form-line" data-type="control_textbox" id="id_33">
                        <label class="form-label form-label-left form-label-auto" id="label_33" for="input_33"> Phone # 2 </label>
                        <div id="cid_33" class="form-input">
                          <input type="text" id="input_33" name="phone2" data-type="input-textbox" class="form-textbox validate[Numeric]" size="30" value="-" data-component="textbox" />
                        </div>
                  </li>
                  <li class="form-line" data-type="control_email" id="id_34">
                        <label class="form-label form-label-left form-label-auto" id="label_34" for="input_34"> Email </label>
                        <div id="cid_34" class="form-input">
                          <span class="form-sub-label-container" style="vertical-align:top">
                                <input type="email" id="input_34" name="email" class="form-textbox validate[Email]" size="30" value="-" data-component="email" />
                                <label class="form-sub-label" for="input_34" style="min-height:13px"> example@example.com </label>
                          </span>
                        </div>
                  </li>
                  <li class="form-line" data-type="control_button" id="id_2">
                        <div id="cid_2" class="form-input-wide">
                          <div style="text-align:center" class="form-buttons-wrapper">
                                <button id="input_2" name="add" value="add" type="submit" class="form-submit-button" data-component="button">
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

   JotForm.prepareCalculationsOnTheFly([null,{"name":"addCenter","qid":"1","text":"Add Center","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"name","qid":"30","subLabel":"","text":"Name","type":"control_textbox"},{"description":"","name":"phone","qid":"31","subLabel":"","text":"Phone # 1","type":"control_textbox"},{"description":"","name":"address","qid":"32","text":"Address","type":"control_address"},{"description":"","name":"phone33","qid":"33","subLabel":"","text":"Phone # 2","type":"control_textbox"},{"description":"","name":"email","qid":"34","subLabel":"example@example.com","text":"Email","type":"control_email"}]);
   setTimeout(function() {
JotForm.paymentExtrasOnTheFly([null,{"name":"addCenter","qid":"1","text":"Add Center","type":"control_head"},{"name":"add","qid":"2","text":"ADD","type":"control_button"},null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,{"description":"","name":"name","qid":"30","subLabel":"","text":"Name","type":"control_textbox"},{"description":"","name":"phone","qid":"31","subLabel":"","text":"Phone # 1","type":"control_textbox"},{"description":"","name":"address","qid":"32","text":"Address","type":"control_address"},{"description":"","name":"phone33","qid":"33","subLabel":"","text":"Phone # 2","type":"control_textbox"},{"description":"","name":"email","qid":"34","subLabel":"example@example.com","text":"Email","type":"control_email"}]);}, 20); 
</script>
<?php
    require_once '../template/TeacherTemplate/end.tpl';
?>
