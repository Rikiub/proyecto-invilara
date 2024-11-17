<?php require_once "vista/componentes/encabezado.php"; ?>
<?php require_once "vista/componentes/barra.php"; ?>

<div id="titulo-solicitud" class="d-none"><?php echo $titulo_solicitud ?></div>

<main class="container">
	<h1>
		<span class="text-muted">Solicitudes</span>
		<span>></span>
		<span><?php echo $titulo_solicitud; ?></span>
		<span>></span>
		<span class="fw-bold text-nowrap"><?php echo $titulo_vista; ?></span>
	</h1>

	<hr>

	<div class="d-flex justify-content-between" id="crud-botones">
		<div class="btn-group" role="group">
			<button id="boton-insertar" value="insertar" class="btn btn-success my-3">Registrar</button>
			<button id="boton-modificar" value="modificar" class="btn btn-warning my-3 desactivable">Modificar</button>
			<button id="boton-eliminar" value="eliminar" class="btn btn-danger my-3 desactivable">Eliminar</button>
		</div>

		<div>
			<label>
				<select class="form-select my-2 fw-medium" id="tipo-solicitud">
					<option disabled hidden selected>Tipo de solicitud</option>

					<option value="1">General</option>
					<option value="2">1x10</option>
					<option value="3">Institucional</option>
				</select>
			</label>
		</div>
	</div>

	<div class="my-3">
		<table class="table table-hover" id="tabla-contenedor">
			<thead></thead>
			<tbody class="table-group-divider"></tbody>
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
				<div class="row">
					<label class="form-label col fw-semibold">Nº Control
						<input data-id class="form-control" type="text" name="id" required />
					</label>

					<?php if ($tipo_vista != "programado"): ?>
						<label class="form-label col fw-semibold">Gerencia
							<select
								class="form-select <?php echo ($tipo_vista == "cerrado" ? "bg-secondary-subtle" : "") ?>"
								name="id_gerencia" required>
								<?php foreach ($gerencias as $d): ?>
									<option value="<?php echo $d["id"] ?>" <?php echo ($tipo_vista == "cerrado" ? "disabled" : "") ?>>
										<?php echo $d["nombre"] ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>
					<?php endif ?>
				</div>

				<div class="row">
					<?php if ($tipo_solicitud == "1" || $tipo_solicitud == "2"): ?>
						<label class="form-label col fw-semibold">Cedula solicitante
							<select
								class="form-select <?php echo ($tipo_vista != "programado" ? "bg-secondary-subtle" : "") ?>"
								name="cedula_solicitante" required>
								<?php foreach ($solicitantes as $d): ?>
									<option value="<?php echo $d["cedula"] ?>" <?php echo ($tipo_vista != "programado" ? "disabled" : "") ?>>
										<?php echo $d["cedula"]; ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>

					<?php elseif ($tipo_solicitud == "3"): ?>
						<label class="form-label col fw-semibold">Institución
							<select
								class="form-select <?php echo ($tipo_vista != "programado" ? "bg-secondary-subtle" : "") ?>"
								name="id_institucion" required>
								<?php foreach ($instituciones as $d): ?>
									<option value="<?php echo $d["id"] ?>" <?php echo ($tipo_vista != "programado" ? "disabled" : "") ?>>
										<?php echo $d["nombre"] ?>
									</option>
								<?php endforeach ?>
							</select>
						</label>

					<?php endif ?>

					<label class="form-label col fw-semibold">Comunidad
						<select
							class="form-select <?php echo ($tipo_vista != "programado" ? "bg-secondary-subtle" : "") ?>"
							name="id_comunidad" required>
							<?php foreach ($comunidades as $d): ?>
								<option value="<?php echo $d["id"] ?>" <?php echo ($tipo_vista != "programado" ? "disabled" : "") ?>>
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<div class="row">
					<label class="form-label col fw-semibold">Fecha actual
						<input class="form-control bg-secondary-subtle" type="date" name="fecha" readonly required />
					</label>

					<label class="form-label col fw-semibold">Estado
						<select class="form-select bg-secondary-subtle" name="estado" required>
							<?php foreach ($estados as $d): ?>
								<option value="<?php echo $d["id"] ?>" <?php echo ($id_estado != $d["id"] ? "disabled" : "") ?>>
									<?php echo $d["nombre"] ?>
								</option>
							<?php endforeach ?>
						</select>
					</label>
				</div>

				<div class="row">
					<label class="form-label col fw-semibold">Problematica
						<textarea
							class="form-control <?php echo ($tipo_vista != "programado" ? "bg-secondary-subtle" : "") ?>"
							name="problematica" required <?php echo ($tipo_vista != "programado" ? "readonly" : "") ?>></textarea>
					</label>
				</div>

				<div class="modal-footer my-4">
					<input type="hidden" value="<?php echo $tipo_solicitud; ?>">
					<input type="hidden" name="estado" value="<?php echo $id_estado; ?>">

					<button class="btn btn-primary px-5 py-2" type="submit">Procesar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script type="module" src="recursos/js/solicitud.js"></script>