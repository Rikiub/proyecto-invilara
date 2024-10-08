<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
	<h1>Gerentes</h1>

	<button class="btn btn-outline-primary my-3" value="insertar">Registrar</button>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Cedula</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Teléfono</th>
					<th>Dirección</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody class="table-group-divider">
				<?php foreach ($datos as $d): ?>
					<tr>
						<td><?php echo $d["cedula"] ?></td>
						<td><?php echo $d["nombre"] ?></td>
						<td><?php echo $d["correo"] ?></td>
						<td><?php echo $d["telefono"] ?></td>
						<td><?php echo $d["direccion"] ?></td>

						<td class="d-grid d-md-block gap-2">
							<button class="btn btn-outline-warning" value="modificar">Modificar</button>
							<button class="btn btn-outline-danger" value="eliminar" data-bs-toggle="modal"
								data-bs-target="#modal-eliminacion">Eliminar</button>
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
				<h5 class="modal-title">Edición</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<form id="form-edicion" class="modal-body">
				<div class="row">
					<label class="form-label col">
						Cedula
						<input data-id class="form-control" type="text" pattern="\d*" inputmode="numeric" minlength="7"
							maxlength="8" name="cedula" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">
						Nombre
						<input class="form-control" type="text" name="nombre" maxlength="50" required />
					</label>

					<label class="form-label col">
						Correo
						<input class="form-control" type="email" name="correo" required />
					</label>

					<label class="form-label col">
						Teléfono
						<input class="form-control" type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"
							title="Ejemplo: 412-337-1891" name="telefono" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">
						Dirección
						<input class="form-control" type="text" name="direccion" required />
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