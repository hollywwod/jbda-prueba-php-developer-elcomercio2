<!DOCTYPE html>
<html>
<head>
	<title>ChangeString</title>
</head>
<body>

	<?php 

		if(isset($_POST)){
			if(isset($_POST['txt_cadena'])){$text=$_POST['txt_cadena'];}else{$text='';}
			$result=build($text);
		}

		
		function build($text){
			$cnt_text=strlen($text);
			$rt='';

			for($i=0;$i<=$cnt_text;$i++){
				$n_c=next_char(substr($text,$i));
				$rt.=$n_c;
			}
			return $rt;
		}

		function next_char($cad){
			$n_ascii=0;
			$ascii=ord($cad);
			/* rangos ascii A(65)-Z(90) a(97)-z(122) */

			if(($ascii>=65 and $ascii<90) or ($ascii>=97 and $ascii<122)){
				$n_ascii=$ascii+1;
			}elseif($ascii==90){
				$n_ascii=65;
			}elseif($ascii==122){
				$n_ascii=97;
			}else{
				$n_ascii=$ascii;
			}

			return chr($n_ascii);

		}

	 ?>

	<form id="frm_ChangeString" method="POST" action="problema1">
		<h1>Change String</h1>
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