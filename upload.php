
				<?php
		
			if(isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {
			$tailleMax = 2097152;
			$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
			if($_FILES['photo']['size'] <= $tailleMax) {
				$extensionUpload = strtolower(substr(strrchr($_FILES['photo']['name'], '.'), 1));
				if(in_array($extensionUpload, $extensionsValides)) {
					$chemin = "./photo/".$_FILES['photo']['name'].".".$extensionUpload;
				$resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $chemin);
				

				} 
				} 
				}
				
		
	        ?>