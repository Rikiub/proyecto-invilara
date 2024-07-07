<?php include "vista/componentes/encabezado.php"; ?>
<?php include "vista/componentes/barra.php"; ?>

<div class="container text-center h2 text-primary">
	Datos Regitrados
	<hr />
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
	<div class="container">
		<div class="row mt-3 justify-content-center">
			<div class="col-md-2">
				<button type="button" class="btn btn-primary" id="incluir">INCLUIR</button>
			</div>

			<div class="col-md-2">
				<a href="." class="btn btn-primary">REGRESAR</a>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="table-responsive">
			<table class="table table-striped table-hover" id="tablapersona">
				<thead>
					<tr>
						<th>Acciones</th>
						<th>Numero de control</th>
						<th>Fecha de solicitud</th>
						<th>Numero de oficio</th>
						<th>Asunto</th>
						<th>Telefono</th>
						<th>observaciòn</th>
						<th>Gerencia Referida</th>
						<th>direccion_comunidad</th>
						<th>instrucciones_presidenciales</th>

					</tr>
				</thead>
				<tbody id="resultadoconsulta">


				</tbody>
			</table>
		</div>
	</div>
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-header text-light bg-info">
			<h5 class="modal-title">Ingrese los datos</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-content">
			<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
				<form method="post" id="f" autocomplete="off">
					<input autocomplete="off" type="text" class="form-control" name="accion" id="accion"
						style="display: none;">
					<div class="container">
						<div class="row mb-3">
							<div class="col-md-4">
								<label for="control">Nro_control</label>
								<input class="form-control" type="number" id="control" />
								<span id="scontrol"></span>
							</div>
							<div class="col-md-4">
								<label for="fecha">Fecha_solicitud</label>
								<input class="form-control" type="date" id="fecha" />
								<span id="sfecha"></span>
							</div>


							<div class="row mb-3">
								<div class="col-md-12">
									<label for="oficio">Nro_oficio</label>
									<input class="form-control" type="text" id="oficio" />
									<span id="soficio"></span>
								</div>
							</div>
							<div class="container">
								<div class="col-md-4">
									<label for="asunto">Asunto</label>
									<input class="form-control" type="text" id="asunto" name="asunto" />
									<span id="sasunto"></span>
								</div>
							</div>
							<div class="col-md-4">
								<label for="telefono">Telefono</label>
								<input class="form-control" type="text" id="telefono" name="telefono" />
								<span id="stelefono"></span>
							</div>
						</div>

						<div class="col-md-8">
							<label for="observacion">observaciòn</label>
							<input class="form-control" type="text" id="observacion" />
							<span id="sobservacion"></span>
						</div>
					</div>

					<div class="row mb-3">
						<div class="col-md-8">
							<label for="gerencia">Gerencia Referida</label>
							<input class="form-control" type="text" id="gerencia" />
							<span id="sgerencia"></span>
						</div>
						<div class="col-md-4">
							<label for="direccion">Direccion de la comunidad</label>
							<input class="form-control" type="text" id="direccion" name="direccion" />
							<span id="sdireccion"></span>
						</div>
					</div>
					<div class="col-md-4">
						<label for="instrucciones">instrucciones_presidenciales</label>
						<input class="form-control" type="text" id="instrucciones" name="instrucciones" />
						<span id="sinstrucciones"></span>
					</div>
			</div>


			<div class="row">
				<div class="col-md-12">
					<hr />
				</div>
			</div>

			<div class="row mt-3 justify-content-center">
				<div class="col-md-2">
					<button type="button" class="btn btn-primary" id="proceso"></button>
				</div>
			</div>
		</div>
		</form>
	</div> <!-- fin de container -->
	<!--
		
		-->
</div>
<div class="modal-footer bg-light">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
</div>
</div>
</div>
<!--fin de seccion modal-->
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once ("comunes/modal.php"); ?>
<script type="text/javascript" src="js/institucionales.js"></script>

</body>

</html>