<?php
//require "conn.php";

if (isset($_POST['submit'])) {
$company_name = $_POST['company_name'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$website = $_POST['website'];
$facebook_page = $_POST['facebook_page'];
$instagram_page = $_POST['instagram_page'];
$product = $_POST['products'];
$audience = $_POST['audience'];
$text_area = $_POST['text_area'];
$budget= $_POST['budget'];

return "obi";
// $insert_all_into_db = "INSERT INTO company_details(company, first_name, email, phone, website, facebook_page,instragram)"

$insert_company = " INSERT INTO company_details (company_name,first_name,last_name, email,phone,website,facebook_page,instagram_page,product, audience, text_area,budget, ) VALUES ( '$company_name','$first_name','$last_name','$email','$phone', '$website','$facebook', '$instragram' , '$product' ,'$audience', '$text_area', '$budget')";
   $insert_company_exec = mysqli_query($conn, $insert_company) or die("cant save".mysqli_error($conn));

   if ($insert_company_exec) {
    echo "inserted";
   }



}



// ////////////////////////////////////////////////

 
if (isset($_POST['SUBMIT'])) {
   $firstname= $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $email= $_POST['email'];
  
   
   $insert_user = " INSERT INTO newsletter (firstname,lastname,email,) VALUES ('$firstname','$lastname','$email',)";
   $insert_user_exec = mysqli_query($conn, $insert_user);
   if ($insert_user_exec) {
      echo "hellooo 😁😁😀 i am now submitting";
   }else {
      echo "😥😣😣😏 submittio fails";
   }


}
?>