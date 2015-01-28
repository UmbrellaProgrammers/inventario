<?php
	if(!is_dir("../uploads/")) 
			mkdir("../uploads/", 0777);
		
    $name = $_FILES['images']['name'];
    move_uploaded_file($_FILES['images']['tmp_name'], '../uploads/' . $name);
    
    echo "Archivos correctamente subidos";

?>