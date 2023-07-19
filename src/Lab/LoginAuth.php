<?php 
	include './db_Admin.php';
	session_start();

	$email = $_POST['email'];
    $password = $_POST['password'];
	$fqry = $conn->query("SELECT * FROM cits_users where email='$email' and password = '$password' ");
	
	if($fqry->num_rows > 0){

			
		while($session_row = mysqli_fetch_assoc($fqry)){
			
			$_SESSION['userId'] = $session_row['email'];
		}
	echo 1;
}else{
    echo 2;
}
?>