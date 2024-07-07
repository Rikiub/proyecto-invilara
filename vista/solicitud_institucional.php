<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
	<h1>Solicitudes Institucionales</h1>

	<button class="btn btn-outline-primary my-3" value="insertar">Registrar</button>

	<table class="table table-hover table-responsive">
		<thead>
			<tr>
				<th>Nº Control</th>
				<th>Nº Oficio</th>
				<th>ID Institucion</th>
				<th>ID Comunidad</th>
				<th>ID Gerencia</th>
				<th>Fecha</th>
				<th>Problematica</th>
				<th>Instrucciones</th>
				<th>Observaciones</th>
				<th>Estatus</th>
			</tr>
		</thead>

		<tbody class="table-group-divider">
			<?php foreach ($datos as $d): ?>
				<tr>
					<td><?php echo $d["nro_control"] ?></td>
					<td><?php echo $d["nro_oficio"] ?></td>
					<td><?php echo $d["id_institucion"] ?></td>
					<td><?php echo $d["id_comunidad"] ?></td>
					<td><?php echo $d["id_gerencia"] ?></td>
					<td><?php echo $d["fecha"] ?></td>
					<td><?php echo $d["problematica"] ?></td>
					<td><?php echo $d["instrucciones"] ?></td>
					<td><?php echo $d["observacion"] ?></td>
					<td><?php echo $d["estatus"] ?></td>

					<td>
						<button class="btn btn-outline-warning" value="modificar">Modificar</button>
						<button class="btn btn-outline-danger" value="eliminar">Eliminar</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</main>



<!-- MODAL EDITOR -->
<div class="modal modal-lg fade" id="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h5 class="modal-title">Edición</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<form id="formulario" class="modal-body">
				<div class="row">
					<label class="form-label col">Nº Control
						<input class="form-control" type="text" name="nro_control" required />
					</label>

					<label class="form-label col">Nº Oficio
						<input class="form-control" type="text" name="nro_oficio" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">ID Institucion
						<input class="form-control" type="text" name="id_institucion" required />
					</label>

					<label class="form-label col">ID Comunidad
						<input class="form-control" type="text" name="id_comunidad" required />
					</label>

					<label class="form-label col">ID Gerencia
						<input class="form-control" type="text" name="id_gerencia" required />
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
					<label class="form-label col">Instrucciones
						<textarea class="form-control" name="instrucciones" required></textarea>
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Observación
						<textarea class="form-control" name="observacion"></textarea>
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