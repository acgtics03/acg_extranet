<form id="edit_usuario" name="edit_usuario" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post" autocomplete="off">
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Mantenimiento</h1>
				<span class="h-20px border-gray-200 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted">
						<a href="<?php echo base_url(); ?>" class="text-muted text-hover-primary">Inicio</a>
					</li>
					<li class="breadcrumb-item">
						<span class="bullet bg-gray-200 w-5px h-2px"></span>
					</li>
					<li class="breadcrumb-item text-muted">Usuario</li>
					<li class="breadcrumb-item">
						<span class="bullet bg-gray-200 w-5px h-2px"></span>
					</li>
					<li class="breadcrumb-item text-dark">Editar</li>
				</ul>
			</div>
			<div class="d-flex align-items-center py-1">			
				<button type="submit" class="btn btn-sm btn-primary">Guardar Cambio</button>
			</div>
		</div>
	</div>

	<div class="post d-flex flex-column-fluid" id="kt_post">
		<div id="kt_content_container" class="container-xxl">	
			<div class="py-5">
				<div class="row g-5">
					<div class="col-lg-8">
						<div class="card card-stretch card-bordered mb-5">
							<div class="card-header">
								<h3 class="card-title">Editar datos del usuario:  <?php echo $user->PER_NOMBRE.' '.$user->PER_APELLIDO; ?></h3>
								<?php $rol_custom = unserialize($user->EMP_ROL_PERSONALIZADO); ?></h3>
							</div>
							<div class="card-body">
								<div class="row g-3">
									<div class="col-md-4">
										<label class="form-label">N° Documento</label>
										<input type="hidden" value="<?php echo $user->PK_USU_CODI; ?>" id="perid" name="perid">
										<input type="text" class="form-control" id="txtUpdNDocumento" name="txtUpdNDocumento" required value="<?php echo $user->PER_DOC; ?>">
									</div>
									<div class="col-md-4">
										<label class="form-label">Apellidos</label>
										<input type="text" class="form-control" id="txtUpdApellido" name="txtUpdApellido" required value="<?php echo $user->PER_APELLIDO; ?>">
									</div>
									<div class="col-md-4">
										<label class="form-label">Nombres</label>
										<input type="text" class="form-control" id="txtUpdNombres" name="txtUpdNombres" required value="<?php echo $user->PER_NOMBRE; ?>">
									</div>  
									<div class="col-md-4">
										<label class="form-label">Estado</label>
										<select class="form-select" data-control="select2" data-placeholder="Seleccione ..." name="txtUpdEstado" id="txtUpdEstado">
											<option></option>
											<option value="1" <?php if ($user->USU_ESTADO == 1) { echo 'selected'; } ?>>Activo</option>
											<option value="2" <?php if ($user->USU_ESTADO == 0) { echo 'selected'; } ?>>Inactivo</option>
										</select>
									</div>    
									<div class="col-md-4">
										<div class="fv-row" data-kt-password-meter="true">
											<div class="mb-1">
												<label class="form-label">Contraseña</label>
												<div class="position-relative mb-3">
													<input class="form-control" type="text" name="txtUpdPassword" id="txtUpdPassword" autocomplete="off">
													<span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2"	data-kt-password-meter-control="visibility">
														<i class="bi bi-eye-slash fs-2"></i>
														<i class="bi bi-eye fs-2 d-none"></i>
													</span>
												</div>
												<div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
													<div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
												</div>
											</div>
										</div>
									</div>     
									<div class="col-md-4">
										<label class="form-label">Telefono o celular</label>
										<input type="text" class="form-control" id="txtUpdTelefono" name="txtUpdTelefono" required value="<?php echo $user->PER_TELEF; ?>">
									</div>                 
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="card card-stretch card-bordered mb-5">
							<img class="mw-100 mh-300px card-rounded-bottom" alt="" src="<?php echo base_url(); ?>assets/media/illustrations/dozzy-1/4.png" />
						</div>					
					</div>
				</div>
			</div>							
		</div>
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$("form[name='edit_usuario']").submit(function(e) {
			var formData = new FormData($(this)[0]);          
			$.ajax({
				url: "<?php echo base_url('usuario/edit_usuario'); ?>",
				type: "POST",
				data: formData,
				async: false,
				//beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
				success: function (msg) {
					var str=msg.split("_");

					if (str[0] == 'si') {
						alertSuccess('Los usuario se actualizo satisfactoriamente');
						$("form[name='add_empresa']").find("input[type=text]").val("");
						setTimeout(function () {
							window.location.href="<?php echo base_url('usuario'); ?>";
						}, 2000);
					}else{
						alertError(msg);
					}
				},
				cache: false,
				contentType: false,
				processData: false
			});
			e.preventDefault();
		});
	});
</script>