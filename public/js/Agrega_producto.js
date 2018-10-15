$(document).ready(function(){
	var tot=0;
	//AGREGA EL PRODUCTO A LA TABLA DEL MODULO DE VANTA 
    $("#agregar").on("click",function(){
		var id_producto=$("[name=id_producto]").val();
		var nom_producto=$("#nom_producto").val();
		var desc=$("[name=desc]").val();
		var prec=$("[name=prec]").val();
		var cod =$("[name=cod]").val();
		var cod_int=$("[name=cod_int]").val();
		var cant=$("[name=cant]").val();
		var subt= prec*cant;
		$("#mitabla").append("<tr align='center'><td>"+id_producto+"</td><td>"+cod_int+"</td><td>"+nom_producto+"</td><td>"+cod+"</td><td>"+desc+"</td><td>"+prec+"</td><td>"+cant+"</td><td>"
		+subt+"</td>"+"<td><input type='button' value='Eliminar' name='eliminar' class='eli'/></td></tr>");
			tot = tot+subt;
			$("#total").val(tot);
			$("#id_producto").val("");
			$("#cod").val("");
			$("#nom_producto").val("");
			$("#cod_int").val("");
			$("#desc").val("");
			$("#prec").val("");
			$("#cant").val("");
	});
	
	//ELIMINNA LAS FILAS DE LA TABLA 
	$(document).on("click",".eli", function(){
		   $(this).parents("tr").remove();
		   var sb = $(this).parents("tr").find("td").eq(7).html();
		   tot = tot-sb;
		   $("#total").val(tot);
	});
	
	//REFRESCA LA PAGINA
	$("#cancelar").click(function(){
        location.reload();
    });
	
	//PERMITE COBRAR EN EL MODULO DE VETAS SI SE TIENE EL USUARIO CAJA ACTIVADO
	$("[name = cobrar]").one("click", function()
	{
		$("#cobro").removeAttr("hidden")
	});
	
	//REALIZA LA OPERACION PARA DETERMINAR EL TOTAL DE LA VENTA
    $("[name=recibido_venta]").focusout(function(){
		var recibido_venta=$("[name=recibido_venta]").val();
		var total=$("[name=total]").val();
		
		if(recibido_venta < total)
		{
			alert("cantidad incorrecta");
			$("[name=cambio_venta]").val("0.00");
			$("[name=recibido_venta]").val("");
		}
		else
		{
			var cambio_venta = recibido_venta - total;
			$("[name=cambio_venta]").val(cambio_venta);
		}
    });
	
});