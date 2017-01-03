<!DOCTYPE html>
<html>
<head>
	<title>ClearPar</title>
</head>
<body>

	<?php 

		if(isset($_POST)){
			if(isset($_POST['txt_cadena'])){$text=$_POST['txt_cadena'];}else{$text='';}
			$arr=explode('()',$text);
			$result=build($arr);



		}
		function build($arr){
			$rt='';

			foreach ($arr as $key => $value) {
				if($value==""){
					$rt.='()';
				}
			}
			return $rt;
		}


	 ?>

	<form id="frm_ChangeString" method="POST" action="problema3">
		<h1>Clear Par</h1>
		<p></p>
		<label>Ingresar Cadena:</label>
		<input type="text" name="txt_cadena" value="<?php if(isset($text)){ echo $text;}?>">
		<p></p>
		<label>Resultado</label><div id="result" class="result"><?php if(isset($result)){ echo $result;}?></div>
		<p></p>
		<button>Enviar</button>
	</form>
	<p></p>

</body>
</html>