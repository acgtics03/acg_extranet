<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
		<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
			<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Mantenimeinto</h1>
			<span class="h-20px border-gray-200 border-start mx-4"></span>
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<li class="breadcrumb-item text-muted">
					<a href="<?php echo base_url(); ?>" class="text-muted text-hover-primary">Inicio</a>
				</li>			
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<li class="breadcrumb-item text-dark">Listado de empresas</li>
			</ul>
		</div>
		<!--begin::Actions-->
		<div class="d-flex align-items-center py-1">			
			<a href="<?php echo base_url(); ?>empresa/add" class="btn btn-sm btn-primary">Agregar Empresa</a>
		</div>
		<!--end::Actions-->
	</div>
	<!--end::Container-->
</div>
<!--end::Toolbar-->
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
	<div id="kt_content_container" class="container-xxl">								
		<!--begin::Card-->
		<div class="card card-docs mb-2">
			<!--begin::Card Body-->
			<div class="card-body px-10 text-gray-700">															
				<table id="kt_datatable_example_5" class="table table-striped gy-5 gs-7 border rounded table_api">
					<thead>
						<tr class="fw-bolder fs-6 text-gray-800 px-7">
							<th>Item</th>
							<th>RUC</th>
							<th>Razon Social</th>
							<th>Sucursales</th>
							<th>Fecha Inicio</th>
							<th>Estado</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 1;
						foreach ($empresas as $emp): 
							if ($emp->EX_EMP_ESTADO == 1) {$label = 'Activo'; $color = 'success';}
							elseif ($emp->EX_EMP_ESTADO == 2) {$label = 'Inactivo';$color = 'danger';} ?>
								<tr>
									<td><?php echo $i++; ?></td>
									<td><?php if($emp->EX_EMP_IS_GROUP == 2){
										echo 'GRUPO';
									}else{
										echo $emp->EX_EMP_RUC;	
									} ?></td>
									<td><?php echo $emp->EX_EMP_RS; ?></td>
									<td><?php echo $emp->total; ?></td>
									<td><?php 
											if (!empty($emp->EX_EMP_FEC_INICIO)) {
												echo date("d/m/Y", strtotime($emp->EX_EMP_FEC_INICIO));
											}?></td>
									<td><span class="badge <?php echo 'badge-'.$color; ?>"><?php echo $label; ?></span></td>
									<?php 
										$uri = base64_encode("+_23_".$emp->PK_EX_EMPRESA."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN"); 
									?>
									<td class="text-end" data-kt-filemanager-table="action_dropdown">
										<div class="d-flex justify-content-end">										
											<div class="ms-2">
												<button type="button" class="btn btn-sm btn-icon btn-primary btn-active-success me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
													<!--begin::Svg Icon | path: icons/duotune/general/gen052.svg-->
													<span class="svg-icon svg-icon-5 m-0">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
															<rect x="10" y="10" width="4" height="4" rx="2" fill="black" />
															<rect x="17" y="10" width="4" height="4" rx="2" fill="black" />
															<rect x="3" y="10" width="4" height="4" rx="2" fill="black" />
														</svg>
													</span>
													<!--end::Svg Icon-->
												</button>
												<!--begin::Menu-->
												<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-150px py-4" data-kt-menu="true">
													<div class="menu-item px-3">
														<?php 
															if ($emp->EX_EMP_IS_SUCURSAL == 0) { ?>
																<a href="<?php echo base_url(); ?>empresa/gestion_overview/<?php echo $uri; ?>" class="menu-link px-3">Gestionar</a>
															<?php }elseif ($emp->EX_EMP_IS_SUCURSAL == 1) { ?>
																<a href="<?php echo base_url(); ?>empresa/view_empresa_sucursal/<?php echo $uri; ?>" class="menu-link px-3">Gestionar</a>
															<?php }
														?>
														<!--begin::Menu item-->
													
														
													</div>												
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Eliminar</a>
													</div>
													<!--end::Menu item-->
												</div>
												<!--end::Menu-->
												<!--end::More-->
											</div>
										</div>
									</td>
								</tr>					
						<?php endforeach ?>						
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