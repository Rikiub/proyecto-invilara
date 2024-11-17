<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
	<h1>Instituciones</h1>

	<button class="btn btn-primary my-3" value="insertar">Registrar</button>

	<div class="table-responsive" id="tabla-contenedor">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Nombre del director</th>
					<th>Cedula del director</th>
					<th>Dirección</th>
					<th>Correo</th>
					<th>Teléfono</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody class="table-group-divider">
				<?php foreach ($datos as $d): ?>
					<tr>
						<td class="d-none"><?php echo $d["id"] ?></td>
						<td><?php echo $d["nombre"] ?></td>
						<td><?php echo $d["nombre_director"] ?></td>
						<td><?php echo $d["cedula_director"] ?></td>
						<td><?php echo $d["direccion"] ?></td>
						<td><?php echo $d["correo"] ?></td>
						<td><?php echo $d["telefono"] ?></td>

						<td>
							<div class="btn-group-vertical">
								<button class="btn btn-warning" value="modificar">Modificar</button>
								<button class="btn btn-danger" value="eliminar" data-bs-toggle="modal"
									data-bs-target="#modal-eliminacion">Eliminar</button>
							</div>
						</td>
					</tr>
				<?php endforeach ?>
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
				<h5 id="modal-title" class="modal-title">Edición</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<form id="form-edicion" class="modal-body">
				<input type="hidden" name="id" />

				<div class="row">
					<label class="form-label col fw-semibold">Nombre
						<input id="nombre" class="form-control" type="text" name="nombre" minlength="3" maxlength="50"
							pattern="[A-Za-zÀ-ý ]+" title="Solo se aceptan letras" required />
					</label>

					<input type="hidden">

					<label class="form-label col fw-semibold">Cedula del director
						<select class="form-select" name="cedula_director" required>
							<?php foreach ($directores as $d): ?>
								<option value=<?php echo $d["cedula"] ?>>
									<?php echo $d["cedula"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<div class="row">
					<label class="form-label col fw-semibold">Direccion
						<input id="direccion" class="form-control" type="text" name="direccion" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col fw-semibold">Correo
						<input id="correo" class="form-control" type="email" name="correo" required />
					</label>

					<label class="form-label col fw-semibold">Teléfono
						<input id="telefono" class="form-control" type="tel" name="telefono"
							placeholder="Ej: 0412, 0416 o 0426" minlength="12" maxlength="12"
							title=" Debe ser un número válido" required />
					</label>
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
<script src="recursos/js/institucion.js"></script>