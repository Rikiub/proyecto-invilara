<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
	<h1>Solicitudes 1x10</h1>

	<button class="btn btn-outline-primary my-3" value="insertar">Registrar</button>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nº Control</th>
					<th>Gerencia</th>
					<th>Comunidad</th>
					<th>Cedula solicitante</th>
					<th>Fecha</th>
					<th>Problematica</th>
					<th>Estatus</th>
				</tr>
			</thead>

			<tbody class="table-group-divider">
				<td>1</td>
				<td>1</td>
				<td>1</td>
				<td>1168576</td>
				<td>04/01/2024</td>
				<td>Asfalto</td>
				<td>Culminado</td>

				<td class="d-grid d-md-block gap-2">
					<button class="btn btn-outline-warning" value="modificar">Modificar</button>
					<button class="btn btn-outline-danger" value="eliminar" data-bs-toggle="modal"
						data-bs-target="#modal-eliminacion">Eliminar</button>
				</td>
			</tbody>
		</table>
	</div>
</main>

<?php require_once "vista/componentes/modal_eliminar.php"; ?>

<!-- MODAL EDITOR -->
<div class="modal modal-lg fade" id="modal-edicion" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h5 class="modal-title">Edición</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<form id="form-edicion" class="modal-body">
				<div class="row">
					<label class="form-label col">Nº Control
						<input data-id class="form-control" type="text" name="nro_control" required />
					</label>

					<label class="form-label col">Gerencia
						<input class="form-control" type="text" name="id_gerencia" required />
					</label>

					<label class="form-label col">Comunidad
						<input class="form-control" type="text" name="id_comunidad" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Cedula solicitante
						<input class="form-control" type="text" name="cedula_solicitante" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Fecha
						<input class="form-control" type="date" name="fecha" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Problematica
						<textarea class="form-control" name="problematica" required></textarea>
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Estatus
						<select class="form-select" name="estatus">
							<option value="En programación">En programación</option>
							<option value="En ejecución">En ejecución</option>
							<option value="Cerrado">Cerrado</option>
						</select>
					</label>
				</div>

				<div class="modal-footer my-4">
					<input type="hidden" name="accion">
					<button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="recursos/js/crud.js"></script>