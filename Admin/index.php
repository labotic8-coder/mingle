<?php
session_start();
if(!isset($_SESSION['email'] )){

echo "<script>window.location.href='./index.php';</script>";


}
require "../conn.php";

$msg = "";

   




if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM company_details
 WHERE id='$id'");
     //echo "<script>window.location.href='index.php';</script>";

}

// else {
//     echo "No user ID found!";
// }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/table.css">
    <style>
      #text{
        font-size: 25px;
        font-family: Georgia, 'Times New Roman', Times, serif;
      }
    </style>
</head>
<body>
  <nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#dashboardMenu" aria-controls="dashboardMenu">
      ☰ Menu
    </button>
    <a class="navbar-brand ms-3" href="#">Admin</a>
   <a href="../index.php"> <button type="button" style="padding: 3px 20px; background-color:blue; color: white; border-radius: 10px; text-shadow: 1px 2px 3px; font-size: 18px;">Home</button></a>
  </div>
</nav>

<!-- Offcanvas Sidebar -->
<div class="offcanvas offcanvas-start bg-secondary text-white" tabindex="-1" id="dashboardMenu" aria-labelledby="dashboardMenuLabel  " >
  <div class="offcanvas-header">
    <h5 class="offcanvas-title text" id="dashboardMenuLabel">Dashboard Menu</h5>
    <button type="button" class="btn-close btn-close-whitex" data-bs-dismiss="offcanvas"
     aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-group list-group-flush">
      <div class="text"> 
        <a href="index.php" class="nav-link" id="text">
          <b class="" style="color: blue;">company_details</b>
        </a>
        </div>
       <div class="text"> 
        <a href="index.php" class="nav-link" id="text">
          <b class="" style="color: blue;">Contacts</b>
        </a>
        </div>
<!-- 
      <div class=" text">
        <a href="newsletter_subscriber.php" class="nav-link" id="text">newsletter_users </a></div> -->
      
      <!-- <li class="list-group-item"><a href="#">News Posts</a></li>
      <li class="list-group-item"><a href="#">My Posts</a></li> -->
     
</div>
  
</div>

<div class="table-container">
  <table>
    <thead>
      <tr>
        <th>S/N</th>
        <th>Company_name</th>
        <th>First_name</th>
        <th>Last_name</th>
        <th>phone</th>
         <th>website</th>
         <th>facebook_page</th>
         <th>instagram</th>
         <th>products</th>
         <th>audience</th>
         <th>budget</th>
         <th>text_area</th>
        <th>Date Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      <!-- $select_user = "SELECT * FROM web_users ORDER BY id DESC";

$select_user_exec =mysqli_query($conn, $select_user); -->

     <?php 
     
      $select_user = "SELECT * FROM company_details ORDER BY id DESC";
      $sn = 0;
$select_user_exec =mysqli_query($conn, $select_user);
       
     while($row = mysqli_fetch_assoc($select_user_exec)) { 
       $sn++;
     $company_name= $row['company_name'];
     $First_name = $row['First_name'];
     $Last_name = $row['Last_name'];
     $Email = $row['Email'];
     $Phone = $row['Phone'];
     $website = $row['website'];
     $facebook_page = $row['facebook_page'];
     $instagram = $row['instagram'];
     $products= $row['products'];
     $audience= $row['audience'];
     $budget= $row['budget'];
     $text_area = $row['text_area'];
     $date = $row['date'];

      ?>
    
<tr>
   <td><?php echo $sn ?></td>
  <td><?php echo $company_name ?></td>
  <td><?php echo $First_name ?></td>
  <td><?php echo $Last_name ?></td>
  <td><?php echo $Email ?></td>
  <td><?php echo $Phone ?></td>
  <td><?php echo $website ?></td>
   <td><?php echo $facebook_page ?></td>
    <td><?php echo $instagram ?></td>
    <td><?php echo $products ?></td>
    <td><?php echo $audience ?></td>
    <td><?php echo $budget ?></td>
     <td><?php echo $text_area ?></td>
  <td><?php echo $date ?></td>

  <td>
    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
      Delete
    </button>
  </td>
</tr>

<!-- Modal -->
<div class="modal fade" id="deleteModal<?php echo $row['id']; ?>" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        Are you sure you want to delete <?php echo $First_name; ?>?
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <a href="./index.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">
          Yes, Delete
        </a>
      </div>

    </div>
  </div>
</div>
<?php } ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="delete.js"></script>

</body>
</html>