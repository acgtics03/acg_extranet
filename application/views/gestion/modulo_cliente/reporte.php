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
				<li class="breadcrumb-item text-dark">Reporte</li>
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
		<!--begin::Form-->
		<form class='form' id='formReporte' action="<?=base_url('cliente/resultado')?>" method="post" target="_parent" autocomplete='off'>
			<!--begin::Card-->
			<div class="card mb-7">
				<!--begin::Card body-->
				<div class="card-body">					
					<!--begin::Row-->
					<div class="row g-8 mb-8">
						<!--begin::Col-->
						<div class="col-xxl-6">
							<label class="fs-6 form-label fw-bolder text-dark">Empresa</label>							
							<select class="form-select form-select-solid" data-control="select2" data-placeholder="Seleccione la empresa" name="cboEmpresa" id="cboEmpresa">
								<option></option>
								<?php foreach ($clientes as $e) {
									if( $cli_activos == 'all' ){
										echo '<option value="'.$e->PK_EX_EMPRESA.'">'.$e->EX_EMP_RS.'</option>';
									} elseif ( in_array($e->PK_EX_EMPRESA, $cli_activos) ){
										echo '<option value="'.$e->PK_EX_EMPRESA.'">'.$e->EX_EMP_RS.'</option>';
									} else {

									}
								}
								?>
							</select>
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-xxl-6">
							<!--begin::Row-->
							<div class="row g-8">
								<!--begin::Col-->
								<div class="col-lg-6">
									<label class="fs-6 form-label fw-bolder text-dark">Año Inicial</label>
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="Seleccione Año Inicio" name="cboYearIni" id="cboYearIni">
										<option value=""></option>
										<?php foreach ($anio as $an): ?>
											<option value="<?php echo $an->SYSITEM_NOMBRE; ?>"><?php echo $an->SYSITEM_NOMBRE; ?></option>
										<?php endforeach ?>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-6">
									<label class="fs-6 form-label fw-bolder text-dark">Año Final</label>
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="Seleccione Año Fin" name="cboYearFin" id="cboYearFin">
										<option value=""></option>
										<?php foreach ($anio as $an): ?>
											<option value="<?php echo $an->SYSITEM_NOMBRE; ?>"><?php echo $an->SYSITEM_NOMBRE; ?></option>
										<?php endforeach ?>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
					<!--begin::Row-->
					<div class="row g-8">
						<!--begin::Col-->
						<div class="col-xxl-6">
							<!--begin::Row-->
							<div class="row g-8">
								<!--begin::Col-->
								<div class="col-lg-6">
									<label class="fs-6 form-label fw-bolder text-dark">Mes Inicial</label>
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="Seleccione Año Fin" name="cboMesIni" id="cboMesIni">
										<option value=""></option>
										<option value="Enero">Enero</option>
										<option value="Febrero">Febrero</option>
										<option value="Marzo">Marzo</option>
										<option value="Abril">Abril</option>
										<option value="Mayo">Mayo</option>
										<option value="Junio">Junio</option>
										<option value="Julio">Julio</option>
										<option value="Agosto">Agosto</option>
										<option value="Setiembre">Setiembre</option>
										<option value="Octubre">Octubre</option>
										<option value="Noviembre">Noviembre</option>
										<option value="Diciembre">Diciembre</option>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Col-->
								<!--begin::Col-->
								<div class="col-lg-6">
									<label class="fs-6 form-label fw-bolder text-dark">Mes Final</label>
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="Seleccione Año Fin" name="cboMesFin" id="cboMesFin">
										<option value=""></option>
										<option value="Enero">Enero</option>
										<option value="Febrero">Febrero</option>
										<option value="Marzo">Marzo</option>
										<option value="Abril">Abril</option>
										<option value="Mayo">Mayo</option>
										<option value="Junio">Junio</option>
										<option value="Julio">Julio</option>
										<option value="Agosto">Agosto</option>
										<option value="Setiembre">Setiembre</option>
										<option value="Octubre">Octubre</option>
										<option value="Noviembre">Noviembre</option>
										<option value="Diciembre">Diciembre</option>
									</select>
									<!--end::Select-->
								</div>
								<!--end::Col-->
							</div>
							<!--end::Row-->
						</div>
						<!--end::Col-->
						<!--begin::Col-->
						<div class="col-xxl-6">
							<!--begin::Row-->
							<div class="row g-8">
								<!--begin::Col-->
								<div class="col-lg-6">
									<label class="fs-6 form-label fw-bolder text-dark">Carpeta</label>
									<!--begin::Select-->
									<select class="form-select form-select-solid" data-control="select2" data-placeholder="Seleccione la carpeta" name="cboCarpeta" id="cboCarpeta">
										<option value=""></option>
										<?php foreach ($entregable as $ent): ?>
											<option value="<?php echo $ent->SYSITEM_NOMBRE ?>"><?php echo $ent->SYSITEM_NOMBRE; ?></option>
										<?php endforeach ?>	
									</select>
									<!--end::Select-->
								</div>
								<!--end::Col-->
								<!--begin:Action-->
								<div class="col-lg-4">
									<div class="d-flex align-items-center">
										<button style="margin-top: 25px;" type="submit" id="btnBuscar" class="btn btn-primary me-5">BUSCAR</button>
									</div>
								</div>
								<!--end:Action-->

							</div>
							<!--end::Row-->
						</div>
						<!--end::Col-->
					</div>
					<!--end::Row-->
				</div>
				<!--end::Card body-->
			</div>
			<!--end::Card-->
		</form>
		<!--begin::Tab Content-->
		<div class="tab-content">			
			<!--begin::Tab pane-->
			<div id="" class="">
				<!--begin::Card-->
				<div class="card card-flush">
					<!--begin::Card body-->
					<div class="card-body pt-0">
						<!--begin::Table container-->
						<div class="table-responsive">
							<br>
							<table class="table table_api">
							  <thead class="table-dark">
							    <tr>
							      <th scope="col">EMPRESA</th>
							      <th scope="col">AÑO</th>
							      <th scope="col">MES</th>
							      <th scope="col">CARPETA</th>
							      <th scope="col">ARCHIVO</th>
							    </tr>
							  </thead>
							  <tbody>
							  	<?php 
									$emp_activo = '';
									foreach ($reults as $e) {
										if ($e->EX_EMP_IS_GROUP == '1') { $avatar = 'I'; }elseif($e->EX_EMP_IS_GROUP == '2'){ $avatar = 'G'; }elseif($e->EX_EMP_IS_GROUP == '0'){	$avatar = 'S';}
										if ($e->EX_EMP_ESTADO == 1) {$label = 'Activo'; $color = 'success';}elseif ($e->EX_EMP_ESTADO == 2) {$label = 'Inactivo';$color = 'danger';}

										$uri = base64_encode("+_23_".$e->PK_EX_EMPRESA."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN"); 
										if( $cli_activos == 'all' ){ ?>
											<tr>
												<!--begin::User=-->
												<td><?php echo $e->EX_EMP_RS; ?></td>
												<td><?php echo $e->EX_ANIO_NOMBRE; ?></td>												
												<td><?php echo $e->EX_MES_NOMBRE; ?></td>
												<td><?php echo $e->EX_CARPETA_NOMBRE; ?></td>
												<td><a href="<?php echo $e->ARC_RUTA_DRIVE; ?>" target="_blank" class="text-gray-800 text-hover-primary"><?php echo $e->ARC_NOMBRE; ?></a></td>
										<?php } elseif ( in_array($e->PK_EX_EMPRESA, $cli_activos) ){ ?>
											<tr>
												<td><?php echo $e->EX_EMP_RS; ?></td>
												<td><?php echo $e->EX_ANIO_NOMBRE; ?></td>												
												<td><?php echo $e->EX_MES_NOMBRE; ?></td>
												<td><?php echo $e->EX_CARPETA_NOMBRE; ?></td>
												<td><a href="<?php echo $e->ARC_RUTA_DRIVE; ?>" target="_blank" class="text-gray-800 text-hover-primary"><?php echo $e->ARC_NOMBRE; ?></a></td>
											</tr>
										<?php } else {

										} 
									} ?>	
							  </tbody>
							</table>
						</div>
						<!--end::Table container-->
					</div>
					<!--end::Card body-->
				</div>
				<!--end::Card-->
			</div>
			<!--end::Tab pane-->
		</div>
		<!--end::Tab Content-->
	</div>
	<!--end::Container-->
</div>
<!--end::Post-->
