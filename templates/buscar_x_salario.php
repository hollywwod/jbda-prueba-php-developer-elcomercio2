<!DOCTYPE html>
<html>
<head>
	<title>Listar por Salario</title>
</head>
<body>

	<form id="frm_xml" method="POST" action="exportarxml.php">
		<label> Menor: <input type="number" id="txt_menor" required name="txt_menor"></label>
		<label>Mayor: <input type="number" id="txt_mayor" required name="txt_mayor"></label>

		<button>Generar Xml</button>
		<p></p>
	</form>

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
		function buscar_json_list($json,$cad){
			echo "<table  id='list_emp'>";
			echo "<tr><td>Id</td><td>Nombre</td><td>Mail</td><td>Correo</td><td>Salary</td><td></td></tr>";
			$i=0;
			foreach ($json as $key => $value) {
				$i=$i+1;
				if(strpos($value->email, $cad)){
					echo "<tr><td>".$i."</td><td>".$value->name."</td><td>".$value->email."</td><td>".$value->position."</td><td>".$value->salary."</td><td><a href='detalle_empleado/".$value->id."'>Detalle</a></td></tr>";
				}
			}
			echo "</table>";
			
		}

		function listar_json_list($json){
			echo "<table id='list_emp'>";
			echo "<tr><td>Id</td><td>Nombre</td><td>Mail</td><td>Correo</td><td>Salary</td><td></td></tr>";
			$i=0;
			foreach ($json as $key => $value) {
				$i=$i+1;
				echo "<tr><td>".$i."</td><td>".$value->name."</td><td>".$value->email."</td><td>".$value->position."</td><td>".$value->salary."</td><td><a href='detalle_empleado/".$value->id."'>Detalle</a></td></tr>";
			}
			echo "</table>";
			
		}

		


	 ?>

	<div id="list_gen" class="list_gen">
		<?php
		if(isset($_POST)){
			$json=json_list();
			listar_json_list($json);
		}


		$xml='<?xml version="1.0" encoding="utf-8"?><nodo><datos>Datos</datos></nodo>';

$nombre="archivo.xml";
$archivo=fopen($nombre,"w+");
fwrite($archivo,$xml);
fclose($archivo);

		?>
	</div>

	<div id="vinculo" class="vinculo">
	</div>


	<footer>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script type="text/javascript" src="ajax.js"></script>
	</footer>
</body>
</html>