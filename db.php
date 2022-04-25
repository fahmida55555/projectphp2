<?php

  $db = mysqli_connect("localhost", "root", "", "projectphp2");

  if($db) {
  	echo "Database Connected Successfully";
  }

  else {
  	die("Database not connected" .mysqli_error($db));
  }


 ?>