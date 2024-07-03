<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<div class="container" id="crud">
	<h1>Solicitantes</h1>

	<button class="btn btn-outline-primary" value="insertar">Registrar</button>

	<table class="table">
		<thead>
			<tr>
				<th>Cedula</th>
				<th>Nombre</th>
				<th>Correo</th>
				<th>Teléfono</th>
				<th>Direccion</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			<?php foreach ($datos as $d): ?>
				<tr>
					<td><?php echo $d["cedula"] ?></td>
					<td><?php echo $d["nombre"] ?></td>
					<td><?php echo $d["correo"] ?></td>
					<td><?php echo $d["telefono"] ?></td>
					<td><?php echo $d["direccion"] ?></td>
					<td>
						<button class="btn btn-outline-warning" value="modificar">Modificar</button>
						<button class="btn btn-outline-danger" value="eliminar">Eliminar</button>
					</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
</div>



<!-- MODAL EDITOR -->
<div class="modal modal-lg" id="modal" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content p-3">
			<div class="modal-header">
				<h5 class="modal-title">Edición</h5>
				<button class="btn-close" data-bs-dismiss="modal"></button>
			</div>

			<form id="formulario" class="modal-body">
				<div class="row">
					<label class="form-label col">Cedula
						<input class="form-control" type="text" name="cedula" required />
					</label>

					<label class="form-label col">Nombre
						<input class="form-control" type="text" name="nombre" required />
					</label>

					<label class="form-label col">Correo
						<input class="form-control" type="email" name="correo" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Teléfono
						<input class="form-control" type="tel" maxlength="8" name="telefono" required />
					</label>

					<label class="form-label col">Dirección
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