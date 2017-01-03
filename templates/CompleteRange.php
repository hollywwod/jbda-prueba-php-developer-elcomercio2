<!DOCTYPE html>
<html>
<head>
	<title>CompleteRange</title>
</head>
<body>

	<?php 

		if(isset($_POST)){
			if(isset($_POST['txt_cadena'])){$text=$_POST['txt_cadena'];}else{$text='';}
			$arr=explode(',',$text);
			$val_inf=$arr[0];
			$val_sup=array_pop($arr);
			$result=build($arr,$val_inf,$val_sup);



		}
		function build($arr,$inf,$sup){
			$rt='';

			for($inf;$inf<=$sup;$inf++){
				if($inf==$sup){
					$rt.=$inf;
				}else{
					$rt.=$inf.',';
				}
			}
			return $rt;
		}


	 ?>

	<form id="frm_ChangeString" method="POST" action="problema2">
		<h1>Complete Range</h1>
		<p></p>
		<label>Ingresar Cadena:</label>
		<input type="text" name="txt_cadena" value="<?php if(isset($text)){ echo $text;}?>">
		<p></p>
		<label>Resultado</label><div id="result" class="result"><?php if(isset($result)){ echo $result;}?></div>
		<p></p>
		<button>Enviar</button>
	</form>
</body>
</html>