<?php
	if($_POST){

		$menor=(float)$_POST['menor'];
		$mayor=(float)$_POST['mayor'];


		$finename="employees.json";
		if(!is_file($finename)){
			$json= array();
		}else{
			$cadena=json_decode(@file_get_contents($finename));
			$json= $cadena;	
		}
		$xml="<?xml version='1.0' encoding='utf-8'?>";
		$xml.= "<table  id='list_emp'>";
		$xml.= "<thead id='Id' nombre='Nombre' mail='Mail' correo='Email' salary='Salary' >";
			$i=0;
			foreach ($json as $key => $value) {
				$i=$i+1;
				$sala=str_replace('$','',$value->salary);
				$sala=str_replace(',','',$sala);
				$sala=(float)str_replace('.',',',$sala);


				if( ($menor<=$sala) and ($sala<=$mayor) ){
					$xml.= "<tr number='".$i."' nombre='".$value->name."' email='".$value->email."' position='".$value->position."' salary=".$value->salary." ></tr>";
				}
			}


		$xml.= "</thead></table>";

		$nombre="archivo.xml";
		$archivo=fopen($nombre,"w+");
		fwrite($archivo,$xml);
		fclose($archivo);

		//var_dump($nombre);
		$rt= array('rst' => $xml,'nombre' => $nombre);
		echo json_encode($rt);
		
	}
?>

