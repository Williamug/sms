<?php 
require_once('includes/session.php');
require_once('includes/dbconnect.php');
require_once('includes/function/function.php'); 
include_once('includes/header2.php');
require_once('includes/constant.php');
?>

<?php

  //form processing
    if (isset($_POST['submit'])) {
      $schoolname =   $_POST['schoolname'];
      $motto =        $_POST['motto'];
      $address =      $_POST['address'];
      $boxno =        $_POST['boxno'];
      $tel =          $_POST['tel'];
      $tel2 =         $_POST['tel2'];
      $passport =     $_FILES['passport']['name'];
      $tmp_name =     $_FILES['passport']['tmp_name'];
      $email =        $_POST['email'];
      $website =      $_POST['website'];
      $begins =       $_POST['begins'];
      $ends =         $_POST['ends'];

      //init error message
      $form_error_msg = "";

      //form validation
      if (!empty($schoolname) &&! empty($motto) && !empty($address) && !empty($tel) && !empty($passport)) {
        //image processing
        if($passport){
        $target = AS_UPLOADPATH . time() . "_" . $passport; 
                $pp = time() . "_" . $passport;
          move_uploaded_file($tmp_name, $target);

          //insert data into the database

           $query_student_db = "INSERT INTO settings(as_schoolName, as_motto, as_physicalAddress, as_boxno, as_tel1,
                                                             as_tel2, as_email, as_website, as_logoUpload, as_beginOn, as_endOn)
                           VALUES('$schoolname', '$motto', '$address', '$boxno', '$tel', '$tel2', 
                                  '$email', '$website', '$pp', '$begins', '$ends')";
                                                             
                  $data = mysql_query($query_student_db);
                  confirm_insert($data);

                  $data_sent = "Your system settings has been set successfully.";
              echo "<p class=\"alert alert-success\" id=\"as_data_sent\">{$data_sent}</p>";
        header('Location: settings.php?message=' . $data_sent);
        }
      }else{
              $form_error_msg = "Please Fill in missing information to submit.";
        echo "<p class=\"alert alert-danger\"> {$form_error_msg} </p>";
        }
    }
?>

<h2 align="center">AllSchool Management System</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactfrm" role="form" enctype="multipart/form-data">
 <br>
  <fieldset>
  <legend>SYSTEM SETTINGS</legend>
    <div class="row">
      <div class="col-md-6">
          
            <div class="form-group col-md-10">
                 <label for="schoolname">School Name</label><br>
                 <input type="text" class="form-control" name="schoolname" size="40" id="schoolname"  
                 value="<?php if(!empty($_POST['schoolname'])) echo $_POST['schoolname']; ?>" placeholder="" title="" required>
          </div>
          <div class="form-group col-md-10">
                 <label for="motto">Motto</label><br>
                 <input type="text" class="form-control" name="motto" size="40" id="motto" 
                 value="<?php if(!empty($_POST['motto'])) echo $_POST['motto']; ?>" placeholder="" title="" required>
          </div>
          <div class="form-group col-md-10">
                 <label for="address">Physical Address</label><br>
                 <input type="text" class="form-control" name="address" size="40" id="address" 
                 value="<?php if(!empty($_POST['address'])) echo $_POST['address']; ?>" placeholder="" title="" required>
          </div>
         
          <div class="form-group col-md-10">
                 <label for="boxno">Box No.</label><br>
                 <input type="text" class="form-control" name="boxno" size="40" id="boxno"
                  value="<?php if(!empty($_POST['boxno'])) echo $_POST['boxno']; ?>" placeholder="" title="">
          </div>
          <div class="form-group col-md-10">
                 <label for="tel">Telephone</label><br>
                 <input type="text" class="form-control" name="tel" size="40" id="tel" 
                  value="<?php if(!empty($_POST['tel'])) echo $_POST['tel']; ?>" placeholder="" title="" require>
                  <br>
                   <input type="text" class="form-control" name="tel2" size="40" id="tel2" 
                  value="<?php if(!empty($_POST['tel2'])) echo $_POST['tel2']; ?>" placeholder="" title="">
          </div>
          
          </div>
          <div class="col-md-6">
          <!-- Image -->
           <div border="2" id="output" class="" alt=""></div>
          <div class="form-group col-md-10">
                  <label for="fileselect">Upload Logo</label><br>
                 
                 
                 <input type="file" class="form-control" name="passport" multiple="disable" size="40" id="fileselect" 
                  value="<?php if(!empty($_POST['passport'])) echo $_POST['passport']; ?>" placeholder="" title="">
          </div>
          <div class="form-group col-md-10">
                 <label for="email">Email</label><br>
                 <input type="text" class="form-control" name="email" size="40" id="email"
                  value="<?php if(!empty($_POST['email'])) echo $_POST['email']; ?>" placeholder="" title="">
          </div>

            <div class="form-group col-md-10">
                   <label for="website">Website</label><br>
                   <input type="text" class="form-control" name="website" size="40" id="website"
                    value="<?php if(!empty($_POST['website'])) echo $_POST['website']; ?>" placeholder="" title="">
            </div>
            
            <div class="form-group col-md-10">
                   <label for="begins">Next Term Begins on </label><br>
                   <input type="date" class="form-control" name="begins" size="40" id="begins"
                    value="<?php if(!empty($_POST['begins'])) echo $_POST['begins']; ?>" placeholder="" title="">
            </div>

             <div class="form-group col-md-10">
               <label for="ends">Ends on</label><br>
               <input type="date" class="form-control" name="ends" size="40" id="ends"
                value="<?php if(!empty($_POST['ends'])) echo $_POST['ends']; ?>" placeholder="" title="">
        </div>
          
        </div>

      </div>
    </fieldset>
 <div class="as-subreset">
   <div class="row">
    <br><br>
      <div class="col-md-6 form-group">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="reset" class="btn btn-danger">Cancel</button>
      </div>

      <div class="col-md-6 form-group">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </div>
</form>

<?php include("includes/footer.php"); ?>
