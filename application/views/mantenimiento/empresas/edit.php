<div class="toolbar" id="kt_toolbar">
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
		<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
			<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Editar empresa</h1>
			<span class="h-20px border-gray-200 border-start mx-4"></span>
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<li class="breadcrumb-item text-muted">
					<a href="<?php echo base_url(); ?>empresa" class="text-muted text-hover-primary">Empresa</a>
				</li>			
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<li class="breadcrumb-item text-dark">Agregar nueva empresa</li>
			</ul>
		</div>
		<div class="d-flex align-items-center py-1" >			
			<a style="display: none;" href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEmpresa">Agregar Empresa</a>
		</div>
	</div>
</div>
<?php $rep_custom = unserialize($emp->EX_EMP_REPORT_ASIGNADO); ?>
<div class="post d-flex flex-column-fluid" id="kt_post">
	<div id="kt_content_container" class="container-xxl">								
		<div class="card">
			<form id="edit_empresa" name="edit_empresa" class="form-validation" accept-charset="utf-8" enctype="multipart/form-data" method="post">
				<div class="card-body p-10">
					<h3 class="text-black mb-7">Formulario para ingresar nueva empresa</h3>
					<div class="separator separator-dashed mb-9"></div>
					<div class="row">
						<div class="col-md-6 col-lg-3">
							<label>Tipo cliente</label>
							<select class="form-control" name="txtTCliente" id="txtTCliente" required>
								<?php foreach ($tclientes as $row) {
									if($row->SYSITEM_NREGISTRO == $emp->EX_EMP_IS_GROUP){ $sel="selected";} else {$sel="";} ?>
									<option value="<?php echo $row->SYSITEM_NREGISTRO;?>" <?php echo $sel;?> ><?php echo htmlentities($row->SYSITEM_NOMBRE,ENT_QUOTES);?></option>
								<?php } ?>
							</select>							
						</div>
						<div class="col-md-6 col-lg-3">
							<label>RUC Empresa</label>
							<div class="input-group mb-3">
								<input type="text" class="form-control" placeholder="Ingrese su RUC" aria-describedby="button-addon2" id="txtDocumento" name="txtDocumento" required value="<?php echo $emp->EX_EMP_RUC; ?>">
								<button class="btn btn-primary" type="button" id="btnBuscarRUC" name="btnBuscarRUC">Buscar</button>
								<input type="hidden" name="txtIdEmpresa" id="txtIdEmpresa" value="<?php echo $emp->PK_EX_EMPRESA; ?>">
							</div>
						</div>
						<div class="col-md-6 col-lg-6">
							<label>Razón Social</label>
							<input type="text" class="form-control" name="txtRS" id="txtRS" required value="<?php echo $emp->EX_EMP_RS; ?>">							
						</div>						
						<div class="col-md-6 col-lg-6">
							<label>Dirección</label>
							<input type="text" class="form-control" name="txtDireccion" id="txtDireccion" required value="<?php echo $emp->EX_EMP_DIRECCION; ?>">				
						</div>
						<!--begin::Col-->
						<div class="col-md-6 col-lg-3">
							<label>Departamento / Provincia / Distrito</label>
							<input type="text" class="form-control" name="txtUbigeo" id="txtUbigeo" required value="<?php echo $emp->EX_EMP_UBIGEO; ?>">						
						</div>
						<div class="col-md-6 col-lg-3">
							<label>Estado Empresa</label>
							<input type="text" class="form-control" name="txtEstadoEmpresa" id="txtEstadoEmpresa" required value="<?php echo $emp->EX_EMP_ESTADO_RUC; ?>">
						</div>			
						<div class="col-md-6 col-lg-3">
							<label>Condición Empresa</label>
							<input type="text" class="form-control" name="txtCondEmpresa" id="txtCondEmpresa" required value="<?php echo $emp->EX_EMP_CONDICION_RUC; ?>">							
						</div>
						<div class="col-md-6 col-lg-3">
							<label>Tipo Repositorio</label>
							<select class="form-control" name="txtTRepositorio" id="txtTRepositorio" required>
								<?php foreach ($tRepositorio as $row) {
									if($row->SYSITEM_NREGISTRO == $emp->EX_EMP_TIPO_REPOSITORIO){ $sel="selected";} else {$sel="";} ?>
									<option value="<?php echo $row->SYSITEM_NREGISTRO;?>" <?php echo $sel;?> ><?php echo htmlentities($row->SYSITEM_NOMBRE,ENT_QUOTES);?></option>
								<?php } ?>
							</select>							
						</div>
						<div class="col-md-6 col-lg-3">
							<label>Estado Cliente</label>
							<select class="form-control" id="cboEstadoCliente" name="cboEstadoCliente" required>
								<?php foreach ($tEstCliente as $row) {
									if($row->SYSITEM_NREGISTRO == $emp->EX_EMP_ESTADO){ $sel="selected";} else {$sel="";} ?>
									<option value="<?php echo $row->SYSITEM_NREGISTRO;?>" <?php echo $sel;?> ><?php echo htmlentities($row->SYSITEM_NOMBRE,ENT_QUOTES);?></option>
								<?php } ?>
							</select>					
						</div>
						<div class="col-md-6 col-lg-3">
							<label>Fecha Ingreso</label>
							<input type="date" class="form-control" name="txtFecIngreso" id="txtFecIngreso" required value="<?php echo $emp->EX_EMP_FEC_INICIO; ?>">
						</div>	
						<div class="col-md-6 col-lg-6">
							<label>Contador</label>
							<select class="form-control" name="cboContador" id="cboContador" data-control="select2">
								<option>Seleccione ...</option>
								<?php foreach ($contadores as $cont): 
									if($cont->PK_PER_CODI == $emp->EX_EMP_CONT_RESPONSABLE){$sel = "selected";} else {$sel = "";}?>
									<option value="<?php echo $cont->PK_PER_CODI; ?>" <?php echo $sel; ?>><?php echo $cont->PER_NOMBRE.' '.$cont->PER_APELLIDO; ?></option>
								<?php endforeach ?>
							</select>
						</div>	
						<div class="col-md-6 col-lg-6">
							<label>Supervisor</label>
							<select class="form-control" name="cboSupervisor" id="cboSupervisor" data-control="select2">
								<option>Seleccione ...</option>
								<?php foreach ($supervisores as $sup): 
									if($sup->PK_PER_CODI == $emp->EX_EMP_SUP_RESPONSABLE){$sel = "selected";} else {$sel = "";}?>
									<option value="<?php echo $sup->PK_PER_CODI; ?>" <?php echo $sel; ?>><?php echo  $sup->PER_NOMBRE.' '.$sup->PER_APELLIDO; ?></option>
								<?php endforeach ?>
							</select>
						</div>	
						<div class="col-md-12 col-lg-12">
							<label>Reportes</label>
							<select class="form-control" name="cboReportes[]" id="cboReportes" data-control="select2" data-placeholder="Seleccione ..." data-allow-clear="true" multiple="multiple">
								<?php 
								foreach ($tReportes as $row) {
									$sel = (in_array($row->PK_TIP_CODI, $rep_custom)) ? "selected" : "" ;
									echo '<option value="'.$row->PK_TIP_CODI.'" '.$sel.'>'.$row->TIP_NOMBRE.'</option>';
								}
								?>
							</select>
						</div>					
					</div>
					<br>
					<div class="separator separator-dashed mb-9"></div>
					<div class="text-center">
						<a href="<?php echo base_url();?>empresa" class="btn btn-light me-3">Cancelar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<script>
	$(document).ready(function() {

		$("button[name='btnBuscarRUC']").click(function(){ 
			var ndoc = document.getElementById("txtDocumento").value;

			if(ndoc.length == 11){
				$.ajax({
					url: '<?php echo base_url('Api_consulta/consultaRUC').'/';?>'+ndoc,
					type: "GET",
					dataType: "json",
					success:function(data){
						$("#txtRS").val(data['rs']); 
						$("#txtEstadoEmpresa").val(data['estado']); 
						$("#txtCondEmpresa").val(data['condicion']); 
						$("#txtDireccion").val(data['direccion']); 
						$("#txtUbigeo").val(data['ubigeo']);           
					}
				})
			}else{
				alertError('Verifique el RUC Ingresado y vuelva a intentarlo');
			}
		});

		$("form[name='edit_empresa']").submit(function(e) {
			var ndoc = document.getElementById("txtDocumento").value;
			var nrs = document.getElementById("txtRS").value;
			var formData = new FormData($(this)[0]); 
			if (nrs == null || nrs == '') {
				alertError('Olvido buscar la empresa <br> Ingrese el RUC y preciona el boton buscar');
				return false;
			}            

			if(ndoc.length == 11){
				$.ajax({
					url: "<?php echo base_url('empresa/upd_empresa'); ?>",
					type: "POST",
					data: formData,
					async: false,
					beforeSend: function(){ $('#btnGuardar').attr('disabled', 'disabled'); },
					success: function (msg) {
						var str=msg.split("_");

						if (str[0] == 'si') {
							alertSuccess('La Empresa se guardo satsifactoriamente');
							$("form[name='add_empresa']").find("input[type=text]").val("");
							setTimeout(function () {
								window.location.href="<?php echo base_url('empresa/gestion_overview'); ?>/"+str[1];
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
			}else{
				alertError('Verifique el RUC Ingresado y vuelva a intentarlo');
				return false;
			}
		});
	});
</script>
