<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once 'vista/componentes/barra.php'; ?>

<main class="container">
	<h1>Institucionales</h1>

	<div class="py-3">
		<button type="button" class="btn btn-primary" id="incluir">INCLUIR</button>
	</div>

	<table class="table" id="tablapersona">
		<thead>
			<tr>
				<th>Acciones</th>
				<th>NRO. Control</th>
				<th>NRO. Oficio</th>
				<th>Fecha</th>
				<th>Asunto</th>
				<th>Telefono</th>
				<th>Observación</th>
				<th>Gerencia Referida</th>
				<th>Direccion Comunidad</th>
				<th>Instrucciones Presidenciales</th>
			</tr>
		</thead>

		<tbody id="resultadoconsulta"></tbody>
	</table>
</main>



<!-- MODAL -->
<div class="modal modal-lg fade" tabindex="-1" id="modal1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ingrese los datos</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<form class="modal-body container" method="post" id="f">
				<input type="hidden" name="accion" id="accion">

				<div class="row mb-3">
					<div class="col-md-4">
						<label for="nro_control">NRO. Control</label>
						<input class="form-control" type="text" id="nro_control" required />
						<span id="snro_control"></span>
					</div>

					<div class="col-md-4">
						<label for="nro_oficio">NRO. Oficio</label>
						<input class="form-control" type="text" id="nro_oficio" required />
						<span id="snro_oficio"></span>
					</div>

					<div class="col-md-12">
						<label for="fecha">Fecha</label>
						<input class="form-control" type="date" id="fecha" required />
						<span id="sfecha"></span>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-md-4">
						<label for="asunto">Asunto</label>
						<input class="form-control" type="text" id="asunto" name="asunto" required />
						<span id="sasunto"></span>
					</div>

					<div class="col-md-4">
						<label for="telefono">Teléfono</label>
						<input class="form-control" type="number" id="telefono" name="telefono" required />
						<span id="stelefono"></span>
					</div>

					<div class="col-md-8">
						<label for="observacion">Observación</label>
						<input class="form-control" type="text" id="observacion" required />
						<span id="sobservacion"></span>
					</div>

					<div class="col-md-8">
						<label for="gerencia_referida">Gerencia Referida</label>
						<input class="form-control" type="text" id="gerencia_referida" required />
						<span id="sgerencia_referida"></span>
					</div>

					<div class="col-md-4">
						<label for="direccion_comunidad">Direccion de la comunidad</label>
						<input class="form-control" type="text" id="direccion_comunidad" name="direccion" required />
						<span id="sdireccion_comunidad"></span>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-md-4">
						<label for="instrucciones_presidenciales">Instrucciones presidenciales</label>
						<input class="form-control" type="text" id="instrucciones_presidenciales" name="instrucciones"
							required />
						<span id="sinstrucciones_presidenciales"></span>
					</div>

					<div class="col-md-4">
						<label for="estatus">Estatus</label>
						<input class="form-control" type="text" id="estatus" name="estatus" required />
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="proceso"></button>
				</div>
			</form>
		</div>
	</div>
</div>

<?php require_once "vista/componentes/modal.php"; ?>

<script src="recursos/js/registro_institucional.js"></script>