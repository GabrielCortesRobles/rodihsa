	$(buscar_datos());
	
	function buscar_datos(consulta){

			$.ajax({
				url: "js/Consulta.php",
				type: "POST",
				dataType: 'html',
				data: {"consulta":consulta},
				success: function(respuesta){
					$("#datos").html(respuesta);
				}
			})
	}
	
	$(document).on('keyup', '#caja_busqueda', function()
	{
		var valor = $(this).val();
		if(valor != "")
		{
			buscar_datos(valor);
		}
		else
		{
			buscar_datos();
		}
	});