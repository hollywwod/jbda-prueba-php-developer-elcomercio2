$(document).ready(function(){
	$("#txt_buscar").keyup(function(){
		var cad=$("#txt_buscar").val();

		$.ajax({
			type:'POST',
			dataType: "json",
			//  method: "POST",
			data: {cad:cad},
			/*data: { activitiesArray : activities }*/
			cache:false,
			url:'buscar_empleado'

		})
		.done(function( msg ) {
			//alert( "Data Savedx: " + msg );
			//console.log(msg);

			var rst=msg['rst'];
			//alert(rst);
			$("#list_emp").remove();
			$("#list_gen").append(rst);
			return false;
		});
	});




	$("#txt_menor,#txt_mayor").keyup(function(){
		listar_x_sala();
	});

	$("#txt_menor,#txt_mayor").change(function(){
		listar_x_sala();
	});

	function listar_x_sala(){
		var menor=$("#txt_menor").val();
		var mayor=$("#txt_mayor").val();

		$.ajax({
			type:'POST',
			dataType: "json",
			//  method: "POST",
			data: {menor:menor,mayor:mayor},
			/*data: { activitiesArray : activities }*/
			cache:false,
			url:'buscar_empleado_salario'

		})
		.done(function( msg ) {
			//alert( "Data Savedx: " + msg );
			//console.log(msg);

			var rst=msg['rst'];
			//alert(rst);
			$("#list_emp").remove();
			$("#list_gen").append(rst);
			return false;
		});
	}

	$("#frm_xml").submit(function(){
		listar_x_sala_xml();

		return false;
	});

	function listar_x_sala_xml(){
		var menor=$("#txt_menor").val();
		var mayor=$("#txt_mayor").val();

		$.ajax({
			type:'POST',
			dataType: "json",
			//  method: "POST",
			data: {menor:menor,mayor:mayor},
			/*data: { activitiesArray : activities }*/
			cache:false,
			url:'exportarxml'

		})
		.done(function( msg ) {
			//alert( "Data Savedx: " + msg );
			//console.log(msg);

			var rst=msg['rst'];
			var nombre=msg['nombre'];
			console.log(msg['nombre']);
			//window.location.assign(nombre);
			var vin='<div id="vc"><a href="'+nombre+'" download>Descargar</a></div>';
			$("#vc").remove();
			$("#vinculo").append(vin);

			
			return false;
		});
	}
});