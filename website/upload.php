<?php
	require_once 'conn.php';
 
	if(ISSET($_POST['upload'])){
		$file_name = $_FILES['file']['name'];
		$file_temp = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$exp = explode(".", $file_name);
		$ext = end($exp);
		$name = date("Y-m-d h-i-s").".".$ext;
		$path = "uploads/".$name;
 
		if($file_size > 5242880){
			echo "<script>alert('File too large')</script>";
			echo "<script>window.location='index.php'</script>";
		}else{
			try{				
				if(move_uploaded_file($file_temp, $path)){
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO `file` (`file`, `location`) VALUES ('$name', '$path')";
					$conn->exec($sql);
				}
 
			}catch(PDOException $e){
				echo $e->getMessage();
			}
 
			$conn = null;
 
			header('location:index.php');
		}
	}
?>