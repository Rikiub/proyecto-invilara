<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
	<h1>
		Solicitudes: <small class="text-muted fs-3"><?php echo $tipo_solicitud_nombre; ?></small>
	</h1>

	<div class="row">
		<label>
			<select class="form-select my-2" id="tipo-solicitud">
				<option disabled hidden selected>Tipo de solicitud</option>

				<option value="1">General</option>
				<option value="2">1x10</option>
				<option value="3">Institucional</option>
			</select>
		</label>
	</div>

	<hr>

	<button class="btn btn-outline-primary my-3 me-3" value="insertar">Registrar</button>

	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Nº Control</th>

					<?php if ($tipo_solicitud == "1" || $tipo_solicitud == "2"): ?>
						<th>Cedula solicitante</th>
					<?php elseif ($tipo_solicitud == "3"): ?>
						<th>Institución</th>
					<?php endif ?>

					<th>Comunidad</th>
					<th>Municipio</th>
					<th>Parroquia</th>
					<th>Gerencia</th>
					<th>Fecha</th>
					<th>Estatus</th>
					<th>Remitente</th>
					<th>Observación</th>
					<th>Problematica</th>
					<th>Acciones</th>
				</tr>
			</thead>

			<tbody class="table-group-divider">
				<?php foreach ($datos as $d): ?>
					<tr>
						<td><?php echo $d["id"]; ?></td>

						<?php if ($tipo_solicitud == "1" || $tipo_solicitud == "2"): ?>
							<td><?php echo $d["cedula_solicitante"]; ?></td>
						<?php elseif ($tipo_solicitud == "3"): ?>
							<td><?php echo $d["nombre_institucion"]; ?></td>
						<?php endif ?>

						<td><?php echo $d["nombre_comunidad"]; ?></td>
						<td><?php echo $d["nombre_municipio"]; ?></td>
						<td><?php echo $d["nombre_parroquia"]; ?></td>
						<td><?php echo $d["nombre_gerencia"]; ?></td>
						<td><?php echo date("d/m/Y", strtotime($d["fecha"])); ?></td>
						<td><?php echo $d["estatus"]; ?></td>
						<td><?php echo $d["remitente"]; ?></td>
						<td><?php echo $d["observacion"]; ?></td>
						<td><?php echo $d["problematica"]; ?></td>

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
					<label class="form-label col">Nº Control
						<input data-id class="form-control" type="text" name="id" title="Solo se permiten numeros"
							required />
					</label>
				</div>

				<div class="row">
					<?php if ($tipo_solicitud == "1" || $tipo_solicitud == "2"): ?>

						<label class="form-label col">Cedula solicitante
							<select class="form-select" name="cedula_solicitante" required>
								<?php foreach ($solicitantes as $d): ?>
									<option value=<?php echo $d["cedula"] ?>>
										<?php echo $d["cedula"] . " - " . $d["nombre"] ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>

					<?php elseif ($tipo_solicitud == "3"): ?>

						<label class="form-label col">Institución
							<select class="form-select" name="id_institucion" required>
								<?php foreach ($instituciones as $d): ?>
									<option value=<?php echo $d["id"] ?>>
										<?php echo $d["nombre"] ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>

					<?php endif ?>
				</div>

				<div class="row">
					<label class="form-label col">Comunidad
						<select class="form-select" name="id_comunidad" required>
							<?php foreach ($comunidades as $d): ?>
								<option value=<?php echo $d["id"] ?>>
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>

					<input type="hidden">

					<label class="form-label col">Parroquia
						<select class="form-select" name="id_parroquia" required>
							<?php foreach ($parroquias as $d): ?>
								<option value=<?php echo $d["id"] ?>>
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Gerencia
						<select class="form-select" name="id_gerencia" required>
							<?php foreach ($gerencias as $d): ?>
								<option value=<?php echo $d["id"] ?>>
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Fecha
						<input class="form-control" type="date" name="fecha" required />
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Estatus
						<select class="form-select" name="estatus">
							<option>Programado</option>
							<option>Ejecutado</option>
							<option>Cerrado</option>
						</select>
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Remitente
						<input class="form-control" type="text" name="remitente" required>
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Observación
						<textarea class="form-control" name="observacion" required></textarea>
					</label>
				</div>

				<div class="row">
					<label class="form-label col">Problematica
						<textarea class="form-control" name="problematica" required></textarea>
					</label>
				</div>

				<div class="modal-footer my-4">
					<input type="hidden" name="accion">
					<input type="hidden" value="<?php echo $tipo_solicitud; ?>">

					<button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="recursos/js/crud.js"></script>
<script src="recursos/js/solicitud.js"></script>