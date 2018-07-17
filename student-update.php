<?php
 require_once("includes/session.php");
// student admission processing
//database connection
require_once('includes/constant.php');
require_once('includes/function/function.php'); 
require_once('includes/dbconnect.php');

?>
<?php
if (isset($_POST['update'])) {
 
 // form variables
      $admissiondate =         escape_string($_POST['admissiondate']);
      $class =                 escape_string(ucfirst($_POST['class']));
      $surname =               escape_string($_POST['surname']);
      $firstname =             escape_string($_POST['firstname']);
      $othername =             escape_string($_POST['othername']);
      $gender =                $_POST['gender'];
      $dateOfBirth =           escape_string($_POST['dob']);
      $nationality =           escape_string($_POST['nationality']);
      $passport =              $_FILES['passport']['name'];
      $tmp_name =              $_FILES['passport']['tmp_name'];
      $religion =              escape_string($_POST['religion']);
      
      $fathername =            escape_string($_POST['fathername']);
      $mothername =            escape_string($_POST['mothername']);
      $guardian_name =         escape_string($_POST['guardian_name']);
      $physical_address =      escape_string($_POST['physical_address']);
      $district =              escape_string($_POST['district']);
      $contact =               escape_string($_POST['contact']);
      $mobile =                escape_string($_POST['mobile']);
      $email =                 escape_string($_POST['email']);
       
         $sql = "UPDATE as_students SET as_classid ='$class', as_surname='$surname', as_firstname='$firstname', as_othername='$othername', as_gender='$gender', as_date_of_birth = '$dateOfBirth', as_nationality = '$nationality', as_religion = '$religion', as_fathername = '$fathername', as_mothername = '$mothername', as_guardianname = '$guardian_name', as_physical_address = '$physical_address', as_district = '$district', as_contact = '$contact', as_mobile = '$mobile', as_email = '$email' WHERE as_studentno = $update";

      if(mysql_query($sql)){
          echo '<script language="javascript">';
          echo 'alert("Record successfully updated!");';
          // echo 'window.location="student_results.php";';
          echo '</script>';
        
      } else {
        echo '<script language="javascript">';
        echo 'alert("Error Updating!");';
        echo 'window.location="student_results.php";';
        echo '</script>';
       }  
}
?>