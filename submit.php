<?php
header('Content-Type: application/json');
require "conn.php";

if (isset($_POST['register'])) {
   $error = mysqli_error($conn);


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
   echo json_encode([
        "status" => "success",
        "message" => "Data inserted successfully"
    ]);
}else{
   $error = mysqli_error($conn);

echo json_encode([
        "status" => "error",
        "message" => "Database error: " . $error
    ]);

}



// ////////////////////////////////////////////////
}
 

if (isset($_POST['SUBMIT'])) {
   $firstname= $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $email= $_POST['email'];
   
   $insert_user = " INSERT INTO newsletter (firstname,lastname,email) VALUES ('$firstname','$lastname','$email')";
   $insert_user_exec = mysqli_query($conn, $insert_user)  or die("cant save".mysqli_error($conn));
   if ($insert_user_exec) {
     echo "<script>window.location.href='index.php';</script>";
   }else {
      echo "insertion fails 😥😥";
   }

}





 
if (isset($_POST['save'])) {


   $firstname= $_POST['firstname'];
   $lastname= $_POST['lastname'];
   $email = $_POST['email'];
   $textarea = $_POST['textarea'];
   $human_check = $_POST ['human_check'];

   // Validate email
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid email format."
    ]);
    exit;
}
  
   
$insert_contact = "INSERT INTO contact (firstname,lastname,email,textarea,human_check)VALUES('$firstname','$lastname','$email','$textarea','$human_check')";
   $insert_contact_exec = mysqli_query($conn, $insert_contact);
   // or die("cant save".mysqli_error($conn));
   if ($insert_contact_exec) {
        echo json_encode([
        "status" => "success",
        "message" => "Message sent successfully."
    ]);


   }else {
       echo json_encode([
        "status" => "error",
        "message" => "Database error: "
    ]);
   }


}


?>