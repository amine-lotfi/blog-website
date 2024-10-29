<?php 

	//  Connect to database
	$conn = mysqli_connect("localhost", "admin", "admin24", "blog_db");

	// check connection
    if (!$conn) {
        $error_message = "NOT CONNECTED:" . mysqli_connect_error();
        echo '<script>alert("' . $error_message . '")</script>';
    }

?>
