<?php
 include "db.php";
 include "header.php";
?>
 
  <body>

  
            <?php
            //to read all the information of an user

              if (isset($_GET['update'])) {

                 $user_id = $_GET['update'];

                 $query = "SELECT * FROM users WHERE id = $user_id";

                 $select_user_id = mysqli_query($db, $query);

                 while ( $row = mysqli_fetch_assoc($select_user_id)) {

                  $id           = $row['id'];
                  $name         = $row['name'];
                  $email        = $row['email'];
                  $phone        = $row['phone'];
                  $address      = $row['address'];
                  $father_name  = $row['father_name'];
                  $avatar       = $row['avatar'];
                                 
              ?>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="heading">Update User Information</h1>

            <form action="" method="POST">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Father's Name</label>
                <input type="text" name="fname" class="form-control" value="<?php echo $father_name; ?>" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $address; ?>"  required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $phone; ?>" required="required" autocomplete="off">
              </div>

              <div class="form-group">
                <input type="submit" name="update" value="Update User Info" class="btn btn-success">
              </div>
              
            </form>
         </div>
        </div>
      </div>

    </section>


                <?php
                 }
               } 
            ?>

            <?php 

            // To update the user information into the database

            if (isset($_POST['update'])) {


                $name        = $_POST['name'];
                $fname       = $_POST['fname'];
                $email       = $_POST['email'];
                $address     = $_POST['address'];
                $phone       = $_POST['phone'];

                $query = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', address = '$address', father_name = '$fname' WHERE id = '$id' ";

                $update_query = mysqli_query($db, $query);

                if (!$update_query) {
                  die("Query Faild" . mysqli_error($db));
                }

                else {
                  header("Location: index.php");
                }
            }

            ?>

           
  				

<?php include "footer.php"; ?>

