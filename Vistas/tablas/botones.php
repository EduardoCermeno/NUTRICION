
 <div class="row  justify-conten-center">
      <div class="col-sm-3">
</div>
		    	<div class="col-sm-6">
        <div   class="alert alert-primary" role="alert" >
<H3 style="text-align:center; font-family: Serif;">REPORTES</H3>
</div>
</div></div>

<!-- <a href="MostrarTablaCitas.php"><input type="button" class="btn btn-primary" value="Citas Disponibles"></a> -->

<a href="MostrarTablaMedicamentos.php"><input type="button" class="btn btn-success" value="MEDICAMENTOS"></a>
<a href="MostrarTablaPaciente.php"><input type="button" class="btn btn btn-danger" value="PACIENTES"></a>
<a href="MostrarTablaEncargadoPaciente.php"><input type="button" class="btn btn-warning" value="ENCARGADOS "></a>
<?php if($_SESSION['ROLUSUARIO']=="SuperUsuario"){?>
<a href="MostrarTablaUsuarios.php"><input type="button" class="btn btn-info" value="USUARIOS"></a>
<?php }?>