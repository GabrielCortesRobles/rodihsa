$(document).ready(function()
{
	$("#cuenta").click(function()
	{
				if(permisos.hidden ==true)
				{
					$("#permisos").removeAttr('hidden');
					$("#contrasena").attr('required',true);
				}
				else
				{
					$("#permisos").attr('hidden',true);
					$("#contrasena").attr('required',false);
				}
	});
});