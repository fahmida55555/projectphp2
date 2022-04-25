<?php

 include "db.php";
 include "header.php";
?>

  <body>

  	<section>
  		<div class="container">
  			<div class="row">
  				<div class="col-md-12">
  					<h1 class="heading">Add New User</h1>

            <form action="" method="POST">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="fname" class="form-control" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <input type="submit" name="addUser" value="Add User" class="btn btn-success">
              </div>
              
         
            <?php 

              if ( isset($_POST['addUser']) ) {
                $name        = $_POST['name'];
                $fname       = $_POST['fname'];
                $email       = $_POST['email'];
                $address     = $_POST['address'];
                $phone       = $_POST['phone'];

                $query = "INSERT INTO users (name, email, phone, address, father_name) VALUES ('$name', '$fname', '$email', '$address', '$phone')";

                $addUser = mysqli_query($db, $query);

                if ($addUser) {
                  header("Location: index.php");
                }
                else {
                  die("Database Not Connected" .mysqli_error($db));
                }

              }

            ?>

  				</div>
  			</div>
  		</div>

  	</section>



  <?php  include "footer.php"; ?>




