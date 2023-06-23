<?php
include("bd/conecciond.php");
        $lineas = array();
		$cons = new conectarpg;
      
		$sql = "select * from alumnos order by id asc";
		$res = pg_query(conectarpg::connect(),$sql);
		//$res = pg_query(conectarpg::connect(),$sql);
		while($items = pg_fetch_array($res))	{
			$lineas[] = $items;
		}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tabla dinamica</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>

<script src="funciones.js"></script>


</head>

<body>


<table width="200" border="1">
  <tr>
    <td colspan="2">
    			<button class="btn btn-primary add" data-toggle="modal" name="add" data-target="#RegistrarClienteModal	" id="Agregar">AGREGAR</button> 
    </td>
   </tr>
  <tr>
    <td>Nombre</td>
    <td>Accion</td>
  </tr>
  <?php foreach($lineas as $lin){ 
  
  $datos = $lin['id']."||".$lin['name'];
  
  ?>
  <tr>
    <td data_id="<?php echo $lin['name']?>"><?php echo $lin["name"];?></td>
    <td>
    <button  data-toggle="modal" data-target="#EditarClienteModal" onclick="agregardatos('<?php echo $datos; ?>')" name="edit" class="btn btn-primary btn-xs edit">Editar</button> 
    -
<button  data-toggle="modal" data-target="#EliminarClienteModal" id="<?php echo $lin['id']?>" name="drop" class="btn btn-primary btn-xs drop">Eliminar</button> 
    </td>
  </tr>
 <?php } ?>
</table>
</body>
</html>

<div id="RegistrarClienteModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Agregar Persona</h4>
 </div>
 <div class="modal-body">

		 <div class="form-group">
			   <label class="control-label" for="inputPatient">Nombre</label>
			   <div class="field desc">
			  	 <input class="form-control" id="Nombre" name="Nombre" placeholder="Nombre" type="text" value="" required>
                 
                 	 <input class="form-control" id="Nombre" name="id" id="id" type="hidden">
			  </div>
     	 </div>

   

 
		
		 
 </div>
 <div class="modal-footer">
 <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
 <button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Registrar">Registrar</button>
  
 </div>
 </div>
 </div>
 </div>
 
 
 
<div id="EditarClienteModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Editar Persona</h4>
 </div>
 <div class="modal-body">

		 <div class="form-group">
			   <label class="control-label" for="inputPatient">Nombre</label>
			   <div class="field desc">
			 <input class="form-control" id="Nombreu" name="Nombreu"  type="text"> 
                             <input class="form-control" id="idu" name="idu"  type="hidden">
			  </div>
     	 </div>

   

		 <div class="form-group">
			 
			   <div class="field desc">
			  <input class="form-control" id="id" name="id"  type="hidden">
			  </div>
     	 </div>
 
		
		 
 </div>
 <div class="modal-footer">
 <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
 <button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Editar">Editar</button>
  
 </div>
 </div>
 </div>
 </div>
 
 
 <div id="EliminarClienteModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Eliminar Persona</h4>
 </div>
 <div class="modal-body">

		 seguro de eliminar?

   

 
		
		 
 </div>
 <div class="modal-footer">
 <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
 <button type="submit" class="btn btn-primary Registrar"  data-dismiss="modal" id="Eliminar">Eliminar</button>
  
 </div>
 </div>
 </div>
 </div>
<script>  
$(document).ready(function(){  

	
  $(document).on('click', '.add', function(){  
	$('#Registrar').click(function(){

			var nombre=$('#Nombre').val();
		

			$.ajax({
							type: "POST",
							method:"post",
							url: 'nuevo.php',
							data: 'nombre='+nombre,
							success: function(data)
							{
									
		                     alert(data);

							}


			});

		});
});
		
		$(document).on('click', '.edit', function(){
			
		  var id = $(this).attr("id");
		  
		  	$('#Editar').click(function(){
			 	
		        $("#Nombreu").val();
				id=$('#idu').val();
	            nombre=$('#Nombreu').val();
	            cadena= "id=" + id + "&nombre=" + nombre ;
	
			    $.ajax({
					      type: 'POST',
						  url: 'edit.php',
						  data: cadena,
							success: function(data)
							{		
						
		                     	alertify.alert('Alert Title', data);
							}

			           });
		  
		    });
     });
	 
	  $(document).on('click', '.drop', function(){
			
		 var id = $(this).attr("id");
		  
	  	  	$('#Eliminar').click(function(){
		
			   $.ajax({
						type: "POST",
						method:"post",
						url: 'eliminar.php',
						data: 'id='+id,
							success: function(data)
							{	
		                     	alertify.success("Eliminado con exito :)");
							}
			        });
		  
		});
});

});
</script>