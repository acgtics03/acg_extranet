<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
		<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
			<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">GESTIÓN</h1>
			<span class="h-20px border-gray-200 border-start mx-4"></span>
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">			
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<li class="breadcrumb-item text-dark">Cliente</li>
			</ul>
		</div>
	</div>
	<!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">								
		<!--INICIO: DATOS DE LA EMPRESA-->
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view" style="display: none;">
			<!--begin::Card header-->
			<div class="card-header cursor-pointer">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">FILTRO</h3>
				</div>
			</div>
			<!--begin::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Details-->
				<div class="flex-wrap">
					<div class="row">
						<div class="col-md-4 col-lg-2">
							<label>RUC: </label>
							<input class="form-control form-control-sm" type="text" name="txtRUC" id="txtRUC">
						</div>
						<div class="col-md-4 col-lg-3">
							<label>Razón Social: </label>
							<input class="form-control form-control-sm" type="text" name="txtRS" id="txtRS">
						</div>
						<div class="col-md-4 col-lg-2">
							<label>Tipo empresa</label>
							<select class="form-control form-control-sm" name="txtTemp" id="txtTemp">
								<option>Seleccione...</option>
								<?php foreach ($tclientes as $tc): ?>
									<option><?php echo $tc->SYSITEM_NOMBRE; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-4 col-lg-2">
							<label>Tipo repositorio</label>
							<select class="form-control form-control-sm" name="txtTrep">
								<option>Seleccione...</option>
								<?php foreach ($tRepositorio as $tr): ?>
									<option><?php echo $tr->SYSITEM_NOMBRE; ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="col-md-4 col-lg-2">
							<label>Estado Cliente</label>
							<select class="form-control form-control-sm" name="txtEstado" id="txtEstado">
								<option>Seleccione...</option>
								<?php foreach ($tEstCliente as $te): ?>
									<option><?php echo $te->SYSITEM_NOMBRE; ?></option>
								<?php endforeach ?>								
							</select>
						</div>
						<div class="col-md-4 col-lg-1">							
							<button class="btn btn-sm btn-icon btn-primary" style="margin-top: 18px;" id="btnBuscar">
								<span class="svg-icon svg-icon-1">
									<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
										<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
										<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black"></path>
									</svg>
								</span>
							</button>
						</div>											
					</div>
				</div>
				<!--end::Details-->
			</div>
			<!--end::Card body-->
		</div>
		<!--FIN: DATOS DE LA EMPRESA-->
		<!--begin::Card-->
		<div class="card card-docs mb-2">
			<!--begin::Card Body-->
			<div class="card-body px-10 text-gray-700">															
				<table id="tbl_cliente" class="table table-striped gy-5 gs-7 border rounded table_api">
					<thead>
						<tr class="fw-bolder fs-6 text-gray-800 px-7">
							<th>EMPRESA</th>
							<th>Razon Social</th>
							<th>Directorios</th>
							<th>Fecha Inicio</th>
							<th>Estado</th>					
						</tr>
					</thead>
					<tbody>
						<?php 
						$emp_activo = '';
						foreach ($clientes as $e) {
							if ($e->EX_EMP_IS_GROUP == '1') { $avatar = 'I'; }elseif($e->EX_EMP_IS_GROUP == '2'){ $avatar = 'G'; }elseif($e->EX_EMP_IS_GROUP == '0'){	$avatar = 'S';}
							if ($e->EX_EMP_ESTADO == 1) {$label = 'Activo'; $color = 'success';}elseif ($e->EX_EMP_ESTADO == 2) {$label = 'Inactivo';$color = 'danger';}

							$uri = base64_encode("+_23_".$e->PK_EX_EMPRESA."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN"); 
							if ($e->EX_EMP_IS_GROUP != '2') {
								if( $cli_activos == 'all' ){ ?>
									<tr>
										<!--begin::User=-->
										<td class="d-flex align-items-center">
											<!--begin:: Avatar -->
											<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
												<a href="<?php echo base_url(); ?>cliente/viewClient/<?php echo $uri; ?>" data-bs-toggle="tooltip" data-bs-html="true">
													<div class="symbol-label fs-3 bg-light-danger text-danger"><?php echo $avatar; ?></div>
												</a>
											</div>
											<!--end::Avatar-->
											<!--begin::User details-->
											<div class="d-flex flex-column">
												<a href="<?php echo base_url(); ?>cliente/viewClient/<?php echo $uri; ?>" class="text-dark fw-bolder text-hover-primary d-block fs-6"><?php echo $e->EX_EMP_RS; ?></a>
												<span><?php echo $e->EX_EMP_RUC; ?></span>
											</div>
											<!--begin::User details-->
										</td>
										<td>
											<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6"><?php echo $e->EX_EMP_DIRECCION; ?></a>
											<span class="text-muted fw-bold text-muted d-block fs-7"><?php echo $e->EX_EMP_UBIGEO; ?></span>
										</td>
										
										<td><span class="badge badge-square badge-primary"><?php echo $e->tanios; ?></span></td>
										<td><?php 
										if (!empty($e->EX_EMP_FEC_INICIO)) {
											echo date("d/m/Y", strtotime($e->EX_EMP_FEC_INICIO));
										}?></td>
										<td><span class="badge <?php echo 'badge-'.$color; ?>"><?php echo $label; ?></span></td>
									</tr>
								<?php } elseif ( in_array($e->PK_EX_EMPRESA, $cli_activos) ){ ?>
									<tr>
										<!--begin::User=-->
										<td class="d-flex align-items-center">
											<!--begin:: Avatar -->
											<div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
												<a href="<?php echo base_url(); ?>cliente/viewClient/<?php echo $uri; ?>" data-bs-toggle="tooltip" data-bs-html="true">
													<div class="symbol-label fs-3 bg-light-danger text-danger"><?php echo $avatar; ?></div>
												</a>
											</div>
											<!--end::Avatar-->
											<!--begin::User details-->
											<div class="d-flex flex-column">
												<a href="<?php echo base_url(); ?>cliente/viewClient/<?php echo $uri; ?>" class="text-dark fw-bolder text-hover-primary d-block fs-6"><?php echo $e->EX_EMP_RS; ?></a>
												<span><?php echo $e->EX_EMP_RUC; ?></span>
											</div>
											<!--begin::User details-->
										</td>
										<td>
											<a href="#" class="text-dark fw-bolder text-hover-primary d-block fs-6"><?php echo $e->EX_EMP_DIRECCION; ?></a>
											<span class="text-muted fw-bold text-muted d-block fs-7"><?php echo $e->EX_EMP_UBIGEO; ?></span>
										</td>
										
										<td><span class="badge badge-square badge-primary"><?php echo $e->tanios; ?></span></td>
										<td><?php 
										if (!empty($e->EX_EMP_FEC_INICIO)) {
											echo date("d/m/Y", strtotime($e->EX_EMP_FEC_INICIO));
										}?></td>
										<td><span class="badge <?php echo 'badge-'.$color; ?>"><?php echo $label; ?></span></td>
									</tr>
								<?php } else {

								} 	
							}							
						} ?>					
						</tbody>
					</table>
				</div>
				<!--end::Card Body-->
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Post-->



	<script>
	/*$(document).ready(function() {
		$('#btnBuscar').click(function () {	
			$('#tbl_cliente tbody').html('');
			var a_ruc = $('#txtRUC').val();
			var a_rs = $('#txtRS').val();
			var a_t_emp = $('#txtTemp').val();
			var a_t_rep = $('#txtTrep').val();
			var a_estado = $('#txtEstado').val();

			alert(a_ruc);
			$.post("<?php echo base_url('cliente/fillClient'); ?>",
				{a_ruc: a_ruc, a_rs: a_rs, a_t_emp: a_t_emp, a_t_rep: a_t_rep, a_estado: a_estado},
				function(data){

					var obj = JSON.parse(data);
					alert(data);
					var output = '';
					$.each(obj, function(i,item){
						output +=
						'<tr>' +
						' 	<td>' + item.codigo_legalizacion+ '</td>'+
						' 	<td>' + item.tipo_legalizacion+ '</td>'+
						'	<td>' + item.sub_tipo_legalizacion+ '</td>'+
						'	<td>' + item.fecha_legalizacion+ '</td>'+
						'	<td>' + item.ape_nom_solicitante+ '</td>'+
						'	<td>' + item.ape_nom_solicitante+ '</td>'+
						'	<td></td>'+								
						'</tr>';
					});
					$('#kt_datatable tbody').append(output);
				});
		});
	});*/
</script>