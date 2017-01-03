<!DOCTYPE html>
<html>
<head>
	<title>Listar Empleados</title>
</head>
<body>


	<?php 

			

		function json_list(){
			$path='';
			$finename=$path."employees.json";
			if(!is_file($finename)){
				return array();
			}else{
				$cadena=json_decode(@file_get_contents($finename));
				return $cadena;	
			}
			
		}

		function detalle_json_list($json,$id){
			foreach ($json as $key => $value) {
				if($value->id==$id){
					echo "<label><strong>Id:</strong> ".$value->id."</label><p></p>";
					echo "<label><strong>Name:</strong> ".$value->name."</label><p></p>";
					echo "<label><strong>Email:</strong> ".$value->email."</label><p></p>";
					echo "<label><strong>Phone:</strong> ".$value->phone."</label><p></p>";
					echo "<label><strong>Address:</strong> ".$value->address."</label><p></p>";
					echo "<label><strong>Position:</strong> ".$value->position."</label><p></p>";
					echo "<label><strong>Salary:</strong> ".$value->salary."</label><p></p>";
					echo "<label><strong>Skills:</strong> <ul>";
						foreach ($value->skills as $key2 => $value2) {
							echo "<li>".$value2->skill."</li>";
						}
					echo "<ul></label>";
				}
			}
		}

		


	 ?>

	<div id="list_gen" class="list_gen">
		<h2>Detalle Empleado</h2>
		<?php
		if(isset($_POST)){
			$json=json_list();
			detalle_json_list($json,$id);
		}
		?>
	</div>


	<footer>
	</footer>
</body>
</html>