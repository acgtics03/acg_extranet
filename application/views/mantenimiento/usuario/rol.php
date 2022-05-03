<form id="proceso_permiso_custom" name="proceso_permiso_custom" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
	<div class="toolbar" id="kt_toolbar">
		<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
			<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
				<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Configuración</h1>
				<span class="h-20px border-gray-200 border-start mx-4"></span>
				<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
					<li class="breadcrumb-item text-muted">
						<a href="<?php echo base_url(); ?>" class="text-muted text-hover-primary">Inicio</a>
					</li>			
					<li class="breadcrumb-item">
						<span class="bullet bg-gray-200 w-5px h-2px"></span>
					</li>
					<li class="breadcrumb-item text-dark">Usuarios</li>
				</ul>
			</div>
			<div class="d-flex align-items-center py-1">			
				<button type="submit" class="btn btn-sm btn-primary">Guardar Cambio</button>
			</div>
		</div>
	</div>
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<div id="kt_content_container" class="container-xxl">								
			<div class="card card-docs mb-2">
				<!--begin::Card header-->
				<div class="card-header cursor-pointer">
					<!--begin::Card title-->
					<div class="card-title m-0">
						<h3 class="fw-bolder m-0">Añadir Rol: <?php echo $user->PER_NOMBRE.' '.$user->PER_APELLIDO;?></h3>
						<?php $rol_custom = unserialize($user->EMP_ROL_PERSONALIZADO); ?>
					</div>
					<input type="hidden" value="<?php echo $user->PK_USU_CODI; ?>" id="perid" name="perid">
				</div>
				<!--begin::Card header-->
				<div class="card-body fs-6 py-15 px-10 py-lg-15 px-lg-15 text-gray-700">
					<div class="accordion accordion-flush accordion-icon-toggle" id="kt_accordion">					
						<!--begin::Item-->
						<div class="accordion-item mb-5">						
							<!--begin::Body-->
							<div class="fs-6 mt-1 mb-1 py-0 ps-10 collapse show" data-bs-parent="#kt_accordion">
								<div class="accordion-body ps-0 pt-0">
									<div class="mb-5">
										<h3 class="fs-6 fw-bolder mb-1">EXTRANET ACG: <input type="text" name="exlog_menu" id="exlog_menu"  value="<?php $chk = ( isset($rol_custom['exlog_menu']) && $rol_custom['exlog_menu']=='yes' ) ? "yes" : null; echo $chk; ?>" readonly></h3>
										<div class="form-check"><label class="form-check-label"><input class="form-check-input" name="exlog_gerencia" id="exlog_gerencia" type="checkbox" value="all" <?php $chk = ( isset($rol_custom['exlog_gerencia']) && $rol_custom['exlog_gerencia']=='all' ) ? "checked" : null; echo $chk; ?> >Gerencia</label></div>
										<div class="form-check"><label class="form-check-label"><input class="form-check-input" name="exlog_jefatura" id="exlog_jefatura" type="checkbox" value="all" <?php $chk = ( isset($rol_custom['exlog_jefatura']) && $rol_custom['exlog_jefatura']=='all' ) ? "checked" : null; echo $chk; ?> >Jefatura (Jefe de área coorporativa)</label></div>
										<div class="form-check"><label class="form-check-label"><input class="form-check-input" name="exlog_controller" id="exlog_controller" type="checkbox" value="all" <?php $chk = ( isset($rol_custom['exlog_controller']) && $rol_custom['exlog_controller']=='all' ) ? "checked" : null; echo $chk; ?> >Controller ()</label></div>									
										<div class="form-check"><label class="form-check-label"><input class="form-check-input" name="exlog_supervisor" id="exlog_supervisor" type="checkbox" value="all" <?php $chk = ( isset($rol_custom['exlog_supervisor']) && $rol_custom['exlog_supervisor']=='all' ) ? "checked" : null; echo $chk; ?> >Supervidor (Coordinador de grupos)</label></div>
										<div class="form-check"><label class="form-check-label"><input class="form-check-input" name="exlog_colaborador" id="exlog_colaborador" type="checkbox" value="all" <?php $chk = ( isset($rol_custom['exlog_colaborador']) && $rol_custom['exlog_colaborador']=='all' ) ? "checked" : null; echo $chk; ?> >Colaborador (Asistente de supervisor)</label></div>
										<div class="form-check"><label class="form-check-label"><input class="form-check-input" name="exlog_cliente" id="exlog_cliente" type="checkbox" value="all" <?php $chk = ( isset($rol_custom['exlog_cliente']) && $rol_custom['exlog_cliente']=='all' ) ? "checked" : null; echo $chk; ?> >Cliente - Cuenta para clientes y personalización de información.</label></div>
										<div class="row align-items-center">
											<div class="col-3"><label class="col-form-label">Cliente: Todos o Personalizado:</label></div>
											<div class="col-9">
												<select class="form-select form-select-sm form-select-solid" data-control="select2" data-placeholder="Select an option" id="ex_cliente_modo" name="ex_cliente_modo">
													<option value="off" <?php echo ( isset($rol_custom['ex_cliente_modo']) && $rol_custom['ex_cliente_modo']=='off' ) ? 'selected' : ''; ?> >Sin Permisos</option>
													<option value="all" <?php echo ( isset($rol_custom['ex_cliente_modo']) && $rol_custom['ex_cliente_modo']=='all' ) ? 'selected' : ''; ?> >Todos los Clientes</option>
													<option value="custom" <?php echo ( isset($rol_custom['ex_cliente_modo']) && $rol_custom['ex_cliente_modo']=='custom' ) ? 'selected' : ''; ?> >Personalizado - Solo los seleccionados</option>
												</select>
											</div>
										</div>
										<div class="row align-items-center">
											<div class="col-3"><label class="col-form-label">Clientes:</label></div>
											<div class="col-9">
												<select class="form-select form-select-sm form-select-solid" data-control="select2" data-placeholder="Seleccione ..." data-allow-clear="true" multiple="multiple" id="ex_clientes" name="ex_clientes[]">
													<?php foreach ($empresas as $row) {
														$array_clientes = $rol_custom['ex_clientes'];
														$sel = (in_array($row->PK_EX_EMPRESA, $array_clientes)) ? "selected" : "" ;
														if ($row->EX_EMP_IS_GROUP != 2) {
															echo '<option value="'.$row->PK_EX_EMPRESA.'" '.$sel.' >'.$row->EX_EMP_RS.'</option>';
														}																																										
													}
													?>
												</select>
											</div>
										</div>
										<!--
										<div class="row align-items-center">
											<div class="col-3"><label class="col-form-label">Sedes: Todos o Personalizado:</label></div>
											<div class="col-9">
												<select class="form-select form-select-sm form-select-solid" data-control="select2" data-placeholder="Select an option" name="ex_sede_modo" id="ex_sede_modo">
													<option value="off" <?php echo ( isset($rol_custom['ex_sede_modo']) && $rol_custom['ex_sede_modo']=='off' ) ? 'selected' : ''; ?> >Sin Permisos</option>
													<option value="all" <?php echo ( isset($rol_custom['ex_sede_modo']) && $rol_custom['ex_sede_modo']=='all' ) ? 'selected' : ''; ?> >Todas las sedes</option>
													<option value="custom" <?php echo ( isset($rol_custom['ex_sede_modo']) && $rol_custom['ex_sede_modo']=='custom' ) ? 'selected' : ''; ?> >Personalizado - Solo los seleccionados</option>
												</select>
											</div>
										</div>
										<div class="row align-items-center">
											<div class="col-3"><label class="col-form-label">Clientes:</label></div>
											<div class="col-9">
												<select class="form-select form-select-sm form-select-solid" data-control="select2" data-placeholder="Seleccione ..." data-allow-clear="true" multiple="multiple" id="ex_sedes" name="ex_sedes[]">
													<option></option>
													<?php foreach ($sucursales as $suc) {

														$array_clientes = $rol_custom['ex_sedes'];
														$sel = (in_array($suc->PK_EX_EMPRESA, $array_clientes)) ? "selected" : "" ;
														echo '<option value="'.$suc->PK_EX_EMPRESA.'" '.$sel.' >'.$suc->empresaC.' - '.$suc->EX_EMP_RS.'</option>';

													}
													?>
												</select>
											</div>
										</div>-->
									</div>

									<div class="mb-5">
										<h3 class="fs-6 fw-bolder mb-1">ACG GEDOC: <input type="text" name="exlog_menu_gedoc" id="exlog_menu_gedoc" value="<?php $chk = ( isset($rol_custom['exlog_menu_gedoc']) && $rol_custom['exlog_menu_gedoc']=='yes' ) ? "yes" : null; echo $chk; ?>" readonly></h3>
										<div class="form-check"><label class="form-check-label"><input class="form-check-input" name="exlog_gedoc" id="exlog_gedoc" type="checkbox" value="all_gedoc" <?php $chk = ( isset($rol_custom['exlog_gedoc']) && $rol_custom['exlog_gedoc']=='all_gedoc' ) ? "checked" : null; echo $chk; ?> >Acceso al módulo</label></div>		
										<div class="row align-items-center">
											<div class="col-3"><label class="col-form-label">Cargo Usuario:</label></div>
											<div class="col-9">
												<select class="form-select form-select-sm form-select-solid" data-placeholder="Seleccione" id="ex_ge_doc" name="ex_ge_doc">
													<option value="sistemas" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='sistemas' ) ? 'selected' : ''; ?> >SISTEMAS</option>
													<option value="contabilidad" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='contabilidad' ) ? 'selected' : ''; ?> >CONTABILIDAD</option>
													<option value="legal" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='legal' ) ? 'selected' : ''; ?> >LEGAL</option>
													<option value="comercial" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='comercial' ) ? 'selected' : ''; ?> >COMERCIAL</option>
													<option value="administracion" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='administracion' ) ? 'selected' : ''; ?> >ADMINISTRACION</option>
													<option value="rrhh" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='rrhh' ) ? 'selected' : ''; ?> >RRHH</option>
													<option value="costos" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='costos' ) ? 'selected' : ''; ?> >COSTOS</option>
													<option value="cobranza" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='cobranza' ) ? 'selected' : ''; ?> >COBRANZA</option>
													<option value="gerencia" <?php echo ( isset($rol_custom['ex_ge_doc']) && $rol_custom['ex_ge_doc']=='gerencia' ) ? 'selected' : ''; ?> >GERENCIA</option>
												</select>
											</div>
										</div>								
									</div>
								</div>
							</div>
							<!--end::Body-->
						</div>
						<!--end::Item-->
					</div>
					<!--end::Changelog-->
				</div>
				<!--end::Card Body-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->
</form>

<script type="text/javascript">
	$(document).ready(function() {
		$("form[name='proceso_permiso_custom']").submit(function(e) {
			var formData = new FormData($(this)[0]);          
			$.ajax({
				url: "<?php echo base_url('usuario/proceso_permiso_custom'); ?>",
				type: "POST",
				data: formData,
				async: false,
				//beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
				success: function (msg) {
					var str=msg.split("_");

					if (str[0] == 'si') {
						alertSuccess('Los permisos se guardaron satisfactoriamente');
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

	$(document).ready(function(){
		$('input[type="checkbox"]').click(function(){

			var ch0 = $("#ninguno").is(':checked');

			var chrl01 = $("#exlog_gerencia").is(':checked');
			var chrl02 = $("#exlog_jefatura").is(':checked');
			var chrl03 = $("#exlog_supervisor").is(':checked');
			var chrl04 = $("#exlog_colaborador").is(':checked');
			var chrl05 = $("#exlog_cliente").is(':checked');

			var chrl06 = $("#exlog_gedoc").is(':checked');

			if($(this).is(":checked")){
				var val = $(this).attr('name');
				//alert(val);
				if(val == 'exlog_gerencia' || val== 'exlog_jefatura' || val =='exlog_supervisor' || val=='exlog_colaborador' || val=='exlog_cliente'){
					$('#exlog_menu').val('yes');
				}

				if(val == 'exlog_gedoc'){
					$('#exlog_menu_gedoc').val('yes');
				}
				
				if(val == 'ninguno'){
					//alert('nin');
					$("input:checkbox[class=form-check-input]").prop('checked', false);
					//$("input:checkbox[name=ninguno]").prop('checked', true);
					$('#reqlog_menu').val('');
					$('#reqgth_menu').val('');
					$('#adq_menu').val('');
					$('#cc_menu').val('');
					$('#perm_menu').val('');
				}
				/*if( ch1 || ch2 || ch3 ){
					//alert('ok');
				} else {
					$('#reqlog_menu').val('no');
				}*/

			} else if($(this).is(":not(:checked)")){
				//alert("Checkbox is unchecked.");				
				if( chrl01 || chrl02 || chrl03 || chrl04 || chrl05){
					//alert('ok');
				} else {
					$('#exlog_menu').val('');
				}

			}
		});
	});
</script>