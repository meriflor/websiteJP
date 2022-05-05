
<?php
	if(isset($_POST["upload_file"])){
				
		if(isset($_FILES["file_to_upload"]) and $_FILES["file_to_upload"]["size"]>0){
			
			$uploaded_file = $_FILES["file_to_upload"]["tmp_name"];
			$uploaded_file_name = $_FILES["file_to_upload"]["name"];
			
			if(move_uploaded_file($uploaded_file, "uploads/$uploaded_file_name")){
				echo "";
			}
			else{
				echo "";
			}
		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>File upload and download</title>
          
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="css/resume.css" rel="stylesheet">

	</head>

	<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                    <label class="logo"> <span>JOB</span> PORTAL SEARCH</label>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
		<div id="upload-form">
			<form method="post" enctype="multipart/form-data">
				<h1>UPLOAD FILE</h1>
				<h4>File To Upload *</h4>
				<input type="file" name="file_to_upload" required />
				<br>
				<button type="submit" name="upload_file">Upload File</button>
                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
		<div id="uploaded-files">
			
			<h1>UPLOADED FILES</h1>
			<?php 
				$array = glob("uploads/*"); 
				$item_numbers = count($array); 
				echo "<h3>Uploaded Files = [$item_numbers files]</h3>";
				foreach($array as $file){ 
					echo "
						<li>
							<a href='download.php?file=".basename($file)."'>".basename($file)."</a> 
						</li>
					";
				}
			?>
		</div>	
	</body>

</html>
