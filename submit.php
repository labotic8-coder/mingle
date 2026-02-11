<?php
require "conn.php";

if (isset($_POST['submit'])) {
$company_name = $_POST['company_name'];
$first_name = $_POST['First_name'];
$last_name = $_POST['Last_name'];
$email = $_POST['Email'];
$phone = $_POST['Phone'];
$website = $_POST['website'];
$facebook_page = $_POST['facebook_page'];
$instagram = $_POST['instagram'];
$products = $_POST['products'];
$audience = $_POST['audience'];
$budget= $_POST['budget'];
$text_area = $_POST['text_area'];


//return "obi";
// $insert_all_into_db = "INSERT INTO company_details(company, first_name, email, phone, website, facebook_page,instragram)"


$insert_company = "INSERT INTO company_details (company_name,First_name,Last_name, Email,Phone,website,facebook_page,instagram,products, audience,budget, text_area)VALUES('$company_name','$first_name','$last_name','$email','$phone', '$website','$facebook_page', '$instagram' , '$products' ,'$audience', '$budget','$text_area')";
   $insert_company_exec = mysqli_query($conn, $insert_company) or die("cant save".mysqli_error($conn));


if ($insert_company_exec) {
   echo "inserted";
}



// ////////////////////////////////////////////////
}
 
// if (isset($_POST['SUBMIT'])) {
//    $firstname= $_POST['firstname'];
//    $lastname= $_POST['lastname'];
//    $email= $_POST['email'];
  
   
//    $insert_user = " INSERT INTO newsletter (firstname,lastname,email,) VALUES ('$firstname','$lastname','$email',)";
//    $insert_user_exec = mysqli_query($conn, $insert_user);
//    if ($insert_user_exec) {
//       echo "hellooo 😁😁😀 i am now submitting";
//    }else {
//       echo "😥😣😣😏 submittio fails";
//    }








 
if (isset($_POST['save'])) {
   $firstname= $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $email= $_POST['email'];
   $textarea = $_POST['textarea'];
   $check = $_POST ['check'];
  
   
   $insert_user = " INSERT INTO contact (firstname,lastname,email,textarea,check) VALUES ('$firstname','$lastname','$email','$textarea ', '$check')";
   $insert_user_exec = mysqli_query($conn, $insert_user)  or die("cant save".mysqli_error($conn));
   if ($insert_user_exec) {
      echo "hellooo 😁😁😀 i am now submitting";
   }else {
      echo "😥😣😣😏 submittio fails";
   }


}


?>