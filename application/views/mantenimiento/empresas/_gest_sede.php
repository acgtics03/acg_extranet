<div class="toolbar" id="kt_toolbar">
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
				<li class="breadcrumb-item text-dark">Empresa</li>
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<li class="breadcrumb-item text-dark">Gestion </li>
			</ul>
		</div>
		<div  class="d-flex align-items-center py-1">			
			<a style="display: none;" href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addEmpresa">Agregar Empresa</a>
		</div>
	</div>
</div>
<div class="post d-flex flex-column-fluid" id="kt_post">
	<div id="kt_content_container" class="container-xxl">								
		<!--begin::Card-->
		<div class="card card-flush pb-0 bgi-position-y-center bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('<?php echo base_url(); ?>assets/media/illustrations/sketchy-1/4.png')">
			<!--begin::Card header-->
			<div class="card-header pt-10">
				<div class="d-flex align-items-center">
					<!--begin::Icon-->
					<div class="symbol symbol-circle me-5">
						<div class="symbol-label bg-transparent text-primary border border-secondary border-dashed">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs020.svg-->
							<span class="svg-icon svg-icon-2x svg-icon-primary">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path d="M17.302 11.35L12.002 20.55H21.202C21.802 20.55 22.202 19.85 21.902 19.35L17.302 11.35Z" fill="black" />
									<path opacity="0.3" d="M12.002 20.55H2.802C2.202 20.55 1.80202 19.85 2.10202 19.35L6.70203 11.45L12.002 20.55ZM11.302 3.45L6.70203 11.35H17.302L12.702 3.45C12.402 2.85 11.602 2.85 11.302 3.45Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
						</div>
					</div>
					<!--end::Icon-->
					<!--begin::Title-->
					<div class="d-flex flex-column">
						<h2 class="mb-1"><?php echo $emp->EX_EMP_RS; ?></h2>
						<div class="text-muted fw-bolder">
							<a href="#"><?php echo 'RUC: '.$emp->EX_EMP_RUC; ?></a>
							<span class="mx-3">|</span>
							<a href="#"><?php echo 'DIRECCIÓN: '.$emp->EX_EMP_DIRECCION; ?></a>

						</div>
					</div>
					<!--end::Title-->
				</div>
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body pb-0">
				<!--begin::Navs-->
				<div class="d-flex overflow-auto h-55px">
					<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold flex-nowrap">
						<li class="nav-item">
							<a class="nav-link text-active-primary me-6 " href="<?php echo base_url(); ?>empresa/gestion_overview/<?php echo $id; ?>">Descripción general</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-active-primary me-6 active" href="<?php echo base_url(); ?>empresa/gestion_sede/<?php echo $id;?>">Sedes</a>
						</li>
					</ul>
				</div>
				<!--begin::Navs-->
			</div>
			<!--end::Card body-->
		</div>
		<!--end::Card-->
		<!--begin::Login sessions-->
		<div class="card mb-5 mb-xl-10">
			<!--begin::Card header-->
			<div class="card-header">
				<!--begin::Heading-->
				<div class="card-title">
					<h3>Listado de Sedes</h3>
				</div>
				<!--end::Heading-->
				<!--begin::Toolbar-->
				<div class="card-toolbar">
					<a href="#" class="btn btn-sm btn-primary my-1" data-bs-toggle="modal" data-bs-target="#maddSede">Agregar Sede</a>
				</div>
				<!--end::Toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body p-0">
				<!--begin::Table wrapper-->
				<div class="table-responsive">
					<!--begin::Table-->
					<table class="table table-flush align-middle table-row-bordered table-row-solid gy-4 gs-9">
						<!--begin::Thead-->
						<thead class="border-gray-200 fs-5 fw-bold bg-lighten">
							<tr>
								<th class="min-w-250px">Nombre Local</th>
								<th class="min-w-100px">Estado</th>
								<th class="min-w-150px">Dirección</th>
								<th class="min-w-150px">Contacto</th>
								<th class="min-w-150px"></th>
							</tr>
						</thead>
						<!--end::Thead-->
						<!--begin::Tbody-->
						<tbody class="fw-6 fw-bold text-gray-600">							
							<?php foreach ($sedes as $sed): 
								if ($sed->EX_SEDE_ESTADO == 1) { $label = 'Activo'; $color = 'badge-success';
									}elseif ($sed->EX_SEDE_ESTADO == 2) { $label = 'Inactivo'; $color = 'badge-danger';	
								}
								?>
								<tr>
									<td>
										<a href="#" class="text-hover-primary text-gray-600"><?php echo $sed->EX_SEDE_NOMBRE; ?></a>
									</td>
									<td>
										<span class="badge <?php echo $color; ?>"><?php echo $label; ?></span>
									</td>
									<td><?php echo $sed->EX_SEDE_DIRECCION; ?></td>
									<td><?php echo $sed->EX_SEDE_NOM_CONTACTO; ?></td>
									<?php 
										$uri = base64_encode("+_23_".$sed->PK_SEDE_EMPRESA."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN"); 
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
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="<?php echo base_url(); ?>empresa/gestion_sede_detail/<?php echo $uri; ?>" class="menu-link px-3">Gestionar</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link px-3" onclick="UpdSede(<?php echo "'".$sed->PK_SEDE_EMPRESA."|".$sed->FK_EMPRESA."|".$sed->FK_EX_EMP_REG."|".$sed->EX_SEDE_NOMBRE."|".$sed->EX_SEDE_DIRECCION."|".$sed->EX_SEDE_NOM_CONTACTO."|".$sed->EX_SEDE_EMAIL_CONTACTO."|".$sed->EX_SEDE_CEL_CONTACTO."|".$sed->EX_SEDE_ESTADO."|".$sed->EX_SEDE_DELETED."'"?>)">Editar</a>
													</div>
													<!--end::Menu item-->
													<!--begin::Menu item-->
													<?php if ($sed->EX_SEDE_ESTADO == 1) {?>
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3"onclick="Desactivar(<?php echo "'".$sed->PK_SEDE_EMPRESA."'"?>)">Desactivar</a>
														</div>
													<?php }elseif($sed->EX_SEDE_ESTADO == 2){ ?>
														<div class="menu-item px-3">
															<a href="#" class="menu-link px-3"onclick="Activar(<?php echo "'".$sed->PK_SEDE_EMPRESA."'"?>)">Activar</a>
														</div>
													<?php } ?>											

													

													<!--end::Menu item-->
													<!--begin::Menu item-->
													<div class="menu-item px-3">
														<a href="#" class="menu-link text-danger px-3" data-kt-filemanager-table-filter="delete_row">Delete</a>
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
						<!--end::Tbody-->
					</table>
					<!--end::Table-->
				</div>
				<!--end::Table wrapper-->
			</div>
			<!--end::Card body-->
		</div>
		<!--end::Login sessions-->						
	</div>
</div>

<?php 
	$this->load->view('mantenimiento/empresas/modal/maddSede');
	$this->load->view('mantenimiento/empresas/modal/mupdSede');
?>


<script>
	function UpdSede(data) {
		var r = data.split("|");
		
		document.getElementById("mtxtUpdIdSede").value = r[0];
		document.getElementById("mtxtUpdNomSede").value = r[3];
		document.getElementById("mtxtUpdDirSede").value = r[4];
		document.getElementById("mtxtUpdNomContacto").value = r[5];
		document.getElementById("mtxtUpdEmailContacto").value = r[6];
		document.getElementById("mtxtUpdCelContacto").value = r[7];

		$('#mUpdSede').modal('show');
	}

	function Desactivar(data) {
		//var r = data.split("|");
		Swal.fire({
		  title: '¿Está seguro?	',
		  text: "¡No podrás revertir esto!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '¡Si, desactivar!'
		}).then((result) => {
		  if (result.isConfirmed) {
		  	window.location.href="<?php echo base_url('empresa/bajaSede'); ?>/"+data+""
		    Swal.fire(
		      '¡Desactivado!',
		      'La sede se dasactivo satisfactoriamente.',
		      'success'
		    )
		  }
		})
	}

	function Activar(data) {
		//var r = data.split("|");
		Swal.fire({
		  title: '¿Está seguro?	',
		  text: "¡No podrás revertir esto!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: '¡Si, activar!'
		}).then((result) => {
		  if (result.isConfirmed) {
		  	window.location.href="<?php echo base_url('empresa/altaSede'); ?>/"+data+""
		    Swal.fire(
		      '¡Desactivado!',
		      'La sede se dasactivo satisfactoriamente.',
		      'success'
		    )
		  }
		})
	}
</script>