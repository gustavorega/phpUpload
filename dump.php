<?php
	$marcadores = $_POST['marcadores'];
	//var_dump($_POST);
	$i = count($marcadores);	
	for($j = 0; $j < $i; $j++)
    {
      //echo $marcadores[$j] . "<br>";
    }
	
	
	function reArrayFiles(&$file_post) {

		$file_ary = array();
		$file_count = count($file_post['name']);
		$file_keys = array_keys($file_post);

		for ($i=0; $i<$file_count; $i++) {
			foreach ($file_keys as $key) {
				$file_ary[$i][$key] = $file_post[$key][$i];
			}
		}

		return $file_ary;
	}
	
	$uploadedFiles = array();
	
	$format_file = array("jpg", "png", "gif", "bmp");
	$max_file_size = 1024*1024*10; //maksimal 10 Mb
	$path = "photos/"; // Lokasi folder untuk menampung file
	$count = 0;

	if ($_FILES['photoUpload']) {
		foreach ($_FILES['photoUpload']['name'] as $f => $name) {     
			if ($_FILES['photoUpload']['error'][$f] == 4) {
				continue; // Skip file if any error found
			}	       
			if ($_FILES['photoUpload']['error'][$f] == 0) {	           
				if ($_FILES['photoUpload']['size'][$f] > $max_file_size) {
					$message[] = "$name is too large!.";
					continue; // Skip large files
				}
				elseif( ! in_array(pathinfo($name, PATHINFO_EXTENSION), $format_file) ){
					$message[] = "$name is not a valid format";
					continue; // Skip invalid file formats
				}
				else{ // No error found! Move uploaded files 
					$filenameUp = $path.md5(uniqid()).".".pathinfo($name, PATHINFO_EXTENSION);
					array_push($uploadedFiles,$filenameUp);
					if(move_uploaded_file($_FILES["photoUpload"]["tmp_name"][$f], $filenameUp))
					$count++; // Number of successfully uploaded file
				}
			}
		}
		echo 'berhasil upload '.$count.' files <br>';
		foreach ($uploadedFiles as $imgSrc){
			echo "<img width='200px' src='".$imgSrc."'/>";
		}
	}
	
?>