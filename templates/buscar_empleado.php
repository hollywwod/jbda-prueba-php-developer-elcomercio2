<?php
	if($_POST){

		$cad=$_POST['cad'];
		$finename="employees.json";
		if(!is_file($finename)){
			$json= array();
		}else{
			$cadena=json_decode(@file_get_contents($finename));
			$json= $cadena;	
		}
		$result="";
		$result.= "<table  id='list_emp'>";
		$result.= "<tr><td>Id</td><td>Nombre</td><td>Mail</td><td>Correo</td><td>Salary</td><td></td></tr>";
			$i=0;
			foreach ($json as $key => $value) {
				$i=$i+1;
				if($cad==''){
					$result.= "<tr><td>".$i."</td><td>".$value->name."</td><td>".$value->email."</td><td>".$value->position."</td><td>".$value->salary."</td><td><a href='detalle_empleado/".$value->id."'>Detalle</a></td></tr>";
				}elseif(strstr($value->email, $cad)){
					$result.= "<tr><td>".$i."</td><td>".$value->name."</td><td>".$value->email."</td><td>".$value->position."</td><td>".$value->salary."</td><td><a href='detalle_empleado/".$value->id."'>Detalle</a></td></tr>";
				}
			}

		$result.= "</table>";
		//var_dump($result);
		$rt= array('rst' => $result);
		echo json_encode($rt);
		
	}
?>