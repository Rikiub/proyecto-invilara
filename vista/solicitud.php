<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<main class="container" id="crud">
	<h1>
		<span class="text-muted">Solicitudes</span>
		>
		<span><?php echo $nombre_solicitud; ?></span>
		>
		<span class="fw-bold"><?php echo $titulo_vista; ?></span>
	</h1>

	<hr>

	<div class="d-flex justify-content-between">
		<div>
			<?php if ($tipo_vista == "programado"): ?>
				<button class="btn btn-primary my-3 me-3" value="insertar">Registrar</button>
			<?php endif ?>

			<label>
				<select class="form-select my-2 fw-medium" id="tipo-solicitud">
					<option disabled hidden selected>Tipo de solicitud</option>

					<option value="1">General</option>
					<option value="2">1x10</option>
					<option value="3">Institucional</option>
				</select>
			</label>
		</div>

		<form method="POST">
			<button class="btn btn-danger my-3 me-3" name="accion" value="reportar" type="submit">Generar
				Reporte</button>
		</form>
	</div>

	<?php require_once "vista/componentes/tabla_solicitud.php"; ?>
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
					<label class="form-label col fw-semibold">Nº Control
						<input data-id class="form-control" type="text" name="id" required />
					</label>
				</div>

				<div class="row">
					<?php if ($tipo_solicitud == "1" || $tipo_solicitud == "2"): ?>
						<label class="form-label col fw-semibold">Cedula solicitante
							<select class="form-select" name="cedula_solicitante" required <?php echo ($tipo_vista != "programado" ? "readonly" : "") ?>>
								<?php foreach ($solicitantes as $d): ?>
									<option value=<?php echo $d["cedula"] ?>>
										<?php echo $d["cedula"]; ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>

					<?php elseif ($tipo_solicitud == "3"): ?>
						<label class="form-label col fw-semibold">Institución
							<select class="form-select" name="id_institucion" required <?php echo ($tipo_vista != "programado" ? "readonly" : "") ?>>
								<?php foreach ($instituciones as $d): ?>
									<option value=<?php echo $d["id"] ?>>
										<?php echo $d["nombre"] ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>

					<?php endif ?>

					<label class="form-label col fw-semibold">Remitente
						<select class="form-select" name="id_remitente" required>
							<?php foreach ($instituciones as $d): ?>
								<option value="<?php echo $d["id"] ?>">
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>

					<label class="form-label col fw-semibold">Comunidad
						<select class="form-select" name="id_comunidad" required>
							<?php foreach ($comunidades as $d): ?>
								<option value="<?php echo $d["id"] ?>">
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<input type="hidden">
				<input type="hidden">

				<?php if ($tipo_vista != "programado"): ?>
					<div class="row">
						<label class="form-label col fw-semibold">Gerencia
							<select class="form-select" name="id_gerencia" required>
								<?php foreach ($gerencias as $d): ?>
									<option value=<?php echo $d["id"] ?>>
										<?php echo $d["nombre"] ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>
					</div>
				<?php endif ?>

				<div class="row">
					<label class="form-label col fw-semibold">Fecha actual
						<input data-actualizar-fecha class="form-control bg-secondary-subtle" type="date" name="fecha"
							readonly required />
					</label>

					<label class="form-label col fw-semibold">Estado
						<select class="form-select bg-secondary-subtle" name="estado" required <?php echo ($tipo_vista != "programado" ? "readonly" : "") ?>>
							<?php foreach ($estados as $d): ?>
								<option value=<?php echo $d["id"] ?> 	<?php echo ($id_estado != $d["id"] ? "disabled" : "") ?>>
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<div class="row">
					<label class="form-label col fw-semibold">Problematica
						<textarea class="form-control" name="problematica" required <?php echo ($tipo_vista != "programado" ? "readonly" : "") ?>></textarea>
					</label>
				</div>

				<div class="modal-footer my-4">
					<input type="hidden" name="accion">
					<input type="hidden" value="<?php echo $tipo_solicitud; ?>">
					<input type="hidden" name="estado" value="<?php echo $id_estado; ?>">

					<button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="recursos/js/crud.js"></script>
<script src="recursos/js/solicitud.js"></script>