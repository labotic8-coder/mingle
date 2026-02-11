<?php
session_start();
if(!isset($_SESSION['email'] )){

echo "<script>window.location.href='./login.php';</script>";


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
      .table-container {
    width: 100%;
    overflow-x: auto;
}

.table-responsive {
    width: 100%;
}

.custom-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 12px; /* smaller text */
}

.custom-table th,
.custom-table td {
    padding: 6px 8px; /* reduce spacing */
    text-align: left;
    white-space: nowrap; /* prevents breaking */
}

.custom-table th {
    background: #000;
    color: #fff;
    font-weight: 600;
}

.custom-table tr:nth-child(even) {
    background: #f5f5f5;
}

.custom-table td {
    max-width: 150px;
    overflow: hidden;
    text-overflow: ellipsis;
}

    </style>
</head>
<body style="width:100%">
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
   <ul class="list-group sidebar-menu">

    <li class="list-group-item">
        <a href="index.php" class="nav-link">
            <i class="bi bi-building"></i>
            <span>Company Details</span>
        </a>
    </li>

    <li class="list-group-item">
        <a href="contact.php" class="nav-link">
            <i class="bi bi-envelope"></i>
            <span>Contacts</span>
        </a>
    </li>

    <li class="list-group-item">
        <a href="newsletter.php" class="nav-link">
            <i class="bi bi-send"></i>
            <span>Newsletter</span>
        </a>
    </li>

</ul>


     
</div>
  
</div>



<div class="table-container">
  
  <div class="table-responsive">
  <table class="custom-table table table-sm table-bordered table-striped">
    <thead>
      <tr>
        <th>S/N</th>
        <!-- <th>Company_name</th> -->
        <th>First_name</th>
        <th>Last_name</th>
        <th>Email</th>
        <th>phone</th>
         <th>Read More</th>
         <th>Delete</th>
         
        
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
          
          <td><?php echo $First_name ?></td>
          <td><?php echo $Last_name ?></td>
          <td><?php echo $Email ?></td>
          <td><?php echo $Phone ?></td>

          <td>
              <button class="btn btn-sm btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#detailsModal<?php echo $row['id']; ?>">
        Read More
    </button>
            </td>
          

          <td>
            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal<?php echo $row['id']; ?>">
              Delete
            </button>
          </td>
            
        </tr>

        <!-- Details Modal -->
<div class="modal fade" id="detailsModal<?php echo $row['id']; ?>" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg border-0 rounded-4">

      <div class="modal-header bg-dark text-white rounded-top-4">
        <h5 class="modal-title">
            <?php echo $company_name; ?> - Details
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body p-4">

        <div class="row g-3">

          <div class="col-md-6">
            <strong>Website:</strong>
            <p class="text-muted">
              <a href="<?php echo $website; ?>" target="_blank">
                <?php echo $website; ?>
              </a>
            </p>
          </div>

          <div class="col-md-6">
            <strong>Facebook:</strong>
            <p class="text-muted"><?php echo $facebook_page; ?></p>
          </div>

          <div class="col-md-6">
            <strong>Instagram:</strong>
            <p class="text-muted"><?php echo $instagram; ?></p>
          </div>

          <div class="col-md-6">
            <strong>Budget:</strong>
            <p class="text-success fw-bold"><?php echo $budget; ?></p>
          </div>

          <div class="col-md-12">
            <strong>Products:</strong>
            <p class="text-muted"><?php echo $products; ?></p>
          </div>

           <div class="col-md-12">
            <strong>Company Name:</strong>
            <p class="text-muted"><?php echo $company_name ?></p>
          </div>

          

          <div class="col-md-12">
            <strong>Target Audience:</strong>
            <p class="text-muted"><?php echo $audience; ?></p>
          </div>

          <div class="col-md-12">
            <strong>Description:</strong>
            <div class="bg-light p-3 rounded">
              <?php echo nl2br($text_area); ?>
            </div>
          </div>

          <div class="col-md-12 text-end">
            <small class="text-secondary">
              Created on: <?php echo $date; ?>
            </small>
          </div>

        </div>

      </div>

    </div>
  </div>
</div>


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
    </tbody>
  </table>
</div>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="delete.js"></script>

</body>
</html>