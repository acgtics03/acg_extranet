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
		<!--INICIO:HEADER DE LA PAGINA-->
		<div class="card mb-5 mb-xl-10 card-flush  bgi-no-repeat mb-10" style="background-size: auto calc(100% + 10rem); background-position-x: 100%; background-image: url('<?php echo base_url(); ?>assets/media/illustrations/sketchy-1/4.png')">
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
			<!--begin::Card body-->
			<div class="card-body pb-0">
				<!--begin::Navs-->
				<div class="d-flex overflow-auto h-55px">
					<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold flex-nowrap">
						<!--begin::Nav item-->
						<li class="nav-item">
							<a class="nav-link text-active-primary me-6 active" href="<?php echo base_url(); ?>empresa/gestion_overview/<?php echo $id; ?>">Descripción general</a>
						</li>
						<!--end::Nav item-->
					</ul>
				</div>
				<!--begin::Navs-->
			</div>
			<!--end::Card body-->
		</div>
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
			<!--begin::Card header-->
			<div class="card-header cursor-pointer">
				<!--begin::Card title-->
				<div class="card-title m-0">
					<h3 class="fw-bolder m-0">Detalles de la empresa</h3>
				</div>
				<!--end::Card title-->
				<a href="<?php $id = base64_encode("+_23_".$emp->PK_EX_EMPRESA."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
				echo base_url(); ?>empresa/edit_sucursal/<?php echo  $id;?>"  class="btn btn-light-primary me-3 align-self-center"><span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path opacity="0.3" d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="black"/><path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z" fill="black"/></svg></span>Editar</a>
				<!--end::Action-->
			</div>
			<!--begin::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Details-->
				<div class="d-flex flex-wrap">
					<!--begin::Col-->
					<div class="flex-equal me-5">
						<table class="table table-flush fw-bold gy-1">
							<tr>
								<td class="text-muted min-w-125px w-125px">EMPRESA GRUPO: </td>
								<td class="text-gray-800"><?php echo $emp->empContenedor; ?></td>
							</tr>
							<tr>
								<td class="text-muted min-w-125px w-125px">DIRECCIÓN:</td>
								<td class="text-gray-800"><?php echo $emp->EX_EMP_DIRECCION; ?></td>
							</tr>
							<tr>
								<td class="text-muted min-w-125px w-125px">DTO/PROV/DIS:</td>
								<td class="text-gray-800"><?php echo $emp->EX_EMP_UBIGEO; ?></td>
							</tr>
							<tr>
								<td class="text-muted min-w-125px w-125px">ESTADO RUC:</td>
								<td class="text-gray-800"><?php echo $emp->EX_EMP_ESTADO_RUC; ?></td>
							</tr>
							<tr>
								<td class="text-muted min-w-125px w-125px">CONDICIÓN RUC:</td>
								<td class="text-gray-800"><?php echo $emp->EX_EMP_CONDICION_RUC; ?></td>
							</tr>
						</table>
					</div>
					<!--end::Col-->
					<!--begin::Col-->
					<div class="flex-equal">
						<table class="table table-flush fw-bold gy-1">
							<tr>
								<td class="text-muted min-w-125px w-125px">TIPO REPOSITORIO:</td>
								<td class="text-gray-800"><?php echo $emp->TREPOSITORIO; ?></td>
							</tr>
							<tr>
								<td class="text-muted min-w-125px w-125px">FECHA INICIO:</td>
								<td class="text-gray-800"><?php echo $emp->EX_EMP_FEC_INICIO; ?></td>
							</tr>
							<tr>
								<td class="text-muted min-w-125px w-125px">LOG:</td>
								<td class="text-gray-800"><?php echo (count(json_decode($emp->EX_EMP_LOG, TRUE)))-1; ?></td>
							</tr>
							<tr>
								<td class="text-muted min-w-125px w-125px">ESTADO EMPRESA:</td>
								<td class="text-gray-800"><?php echo $emp->TESTADO; ?></td>
							</tr>									
						</table>
					</div>
					<!--end::Col-->
				</div>
				<!--end::Details-->



				<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">								
					<!--end::Icon-->
					<!--begin::Wrapper-->
					<div class="d-flex flex-stack flex-grow-1">
						<!--begin::Content-->
						<div class="fw-bold">
							<h4 class="text-gray-900 fw-bolder">¡Atención!</h4>
							<div class="fs-6 text-gray-700">Los datos que se muestran fueon obtenidos desde la SUNAT
								<a class="fw-bolder" href="https://e-consultaruc.sunat.gob.pe/cl-ti-itmrconsruc/FrameCriterioBusquedaWeb.jsp">Verificar</a>.
							</div>
						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Notice-->
			</div>
			<!--end::Card body-->
		</div>
		<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
			<!--begin::Card header-->
			<div class="card-header pt-8">
				<div class="card-title">
					<!--begin::Folder path-->
					<div class="badge badge-lg badge-light-primary">
						<div class="d-flex align-items-center flex-wrap">
							<!--begin::Svg Icon | path: icons/duotune/abstract/abs039.svg-->
							<span class="svg-icon svg-icon-2 svg-icon-primary me-3">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.3" d="M14.1 15.013C14.6 16.313 14.5 17.813 13.7 19.113C12.3 21.513 9.29999 22.313 6.89999 20.913C5.29999 20.013 4.39999 18.313 4.39999 16.613C5.09999 17.013 5.99999 17.313 6.89999 17.313C8.39999 17.313 9.69998 16.613 10.7 15.613C11.1 15.713 11.5 15.813 11.9 15.813C12.7 15.813 13.5 15.513 14.1 15.013ZM8.5 12.913C8.5 12.713 8.39999 12.513 8.39999 12.313C8.39999 11.213 8.89998 10.213 9.69998 9.613C9.19998 8.313 9.30001 6.813 10.1 5.513C10.6 4.713 11.2 4.11299 11.9 3.71299C10.4 2.81299 8.49999 2.71299 6.89999 3.71299C4.49999 5.11299 3.70001 8.113 5.10001 10.513C5.80001 11.813 7.1 12.613 8.5 12.913ZM16.9 7.313C15.4 7.313 14.1 8.013 13.1 9.013C14.3 9.413 15.1 10.513 15.3 11.713C16.7 12.013 17.9 12.813 18.7 14.113C19.2 14.913 19.3 15.713 19.3 16.613C20.8 15.713 21.8 14.113 21.8 12.313C21.9 9.513 19.7 7.313 16.9 7.313Z" fill="black" />
									<path d="M9.69998 9.61307C9.19998 8.31307 9.30001 6.81306 10.1 5.51306C11.5 3.11306 14.5 2.31306 16.9 3.71306C18.5 4.61306 19.4 6.31306 19.4 8.01306C18.7 7.61306 17.8 7.31306 16.9 7.31306C15.4 7.31306 14.1 8.01306 13.1 9.01306C12.7 8.91306 12.3 8.81306 11.9 8.81306C11.1 8.81306 10.3 9.11307 9.69998 9.61307ZM8.5 12.9131C7.1 12.6131 5.90001 11.8131 5.10001 10.5131C4.60001 9.71306 4.5 8.91306 4.5 8.01306C3 8.91306 2 10.5131 2 12.3131C2 15.1131 4.2 17.3131 7 17.3131C8.5 17.3131 9.79999 16.6131 10.8 15.6131C9.49999 15.1131 8.7 14.1131 8.5 12.9131ZM18.7 14.1131C17.9 12.8131 16.7 12.0131 15.3 11.7131C15.3 11.9131 15.4 12.1131 15.4 12.3131C15.4 13.4131 14.9 14.4131 14.1 15.0131C14.6 16.3131 14.5 17.8131 13.7 19.1131C13.2 19.9131 12.6 20.5131 11.9 20.9131C13.4 21.8131 15.3 21.9131 16.9 20.9131C19.3 19.6131 20.1 16.5131 18.7 14.1131Z" fill="black" />
								</svg>
							</span>
							<!--end::Svg Icon-->
							<?php echo $emp->EX_EMP_RS; ?>
						</div>
					</div>
					<!--end::Folder path-->
				</div>
				<!--begin::Card toolbar-->
				<div class="card-toolbar">
					<!--begin::Toolbar-->
					<div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
						<!--begin::Export-->
						<button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#maddAnio">
							<!--begin::Svg Icon | path: icons/duotune/files/fil013.svg-->
							<span class="svg-icon svg-icon-2">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
									<path d="M10.4 3.60001L12 6H21C21.6 6 22 6.4 22 7V19C22 19.6 21.6 20 21 20H3C2.4 20 2 19.6 2 19V4C2 3.4 2.4 3 3 3H9.2C9.7 3 10.2 3.20001 10.4 3.60001ZM16 12H13V9C13 8.4 12.6 8 12 8C11.4 8 11 8.4 11 9V12H8C7.4 12 7 12.4 7 13C7 13.6 7.4 14 8 14H11V17C11 17.6 11.4 18 12 18C12.6 18 13 17.6 13 17V14H16C16.6 14 17 13.6 17 13C17 12.4 16.6 12 16 12Z" fill="black" />
									<path opacity="0.3" d="M11 14H8C7.4 14 7 13.6 7 13C7 12.4 7.4 12 8 12H11V14ZM16 12H13V14H16C16.6 14 17 13.6 17 13C17 12.4 16.6 12 16 12Z" fill="black" />
								</svg>
							</span>
							Nuevo Folder
						</button>
						<!--end::Export-->
					</div>
					<!--end::Toolbar-->
				</div>
				<!--end::Card toolbar-->
			</div>
			<!--end::Card header-->
			<!--begin::Card body-->
			<div class="card-body">
				<!--begin::Table-->
				<table id="kt_file_manager_list" data-kt-filemanager-table="folders" class="table align-middle table-row-dashed fs-6 gy-5">
					<!--begin::Table head-->
					<thead>
						<!--begin::Table row-->
						<tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
							<th class="min-w-250px">NOMBRE</th>
							<th class="min-w-10px">TAMAÑO</th>
							<th class="min-w-125px">FECHA CREACIÓN</th>
							<th class="min-w-125px">ESTADO</th>
							<th class="w-125px"></th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-bold text-gray-600">		
						<?php foreach ($years as $yer): 
							if ($yer->EX_ANIO_ESTADO == 1) {$label = 'Activo'; $color = 'success';}
							elseif ($yer->EX_ANIO_ESTADO == 2) {$label = 'Inactivo';$color = 'danger';}
							$uri = base64_encode("+_23_".$yer->PK_EX_ANIO."_".$emp->PK_EX_EMPRESA."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN"); //CODIFICACION A BASE 64 ?>
							<tr>
								<!--begin::Name=-->
								<td data-order="authentication">
									<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
										<span class="svg-icon svg-icon-2x svg-icon-primary me-4">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
												<path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<a href="<?php echo base_url(); ?>empresa/view_month/<?php echo $uri; ?>" class="text-gray-800 text-hover-primary"><?php echo $yer->EX_ANIO_NOMBRE; ?></a>
									</div>
								</td>
								<!--end::Name=-->
								<!--begin::Size-->
								<td><?php echo $yer->totalMes.' CARPETAS'; ?></td>
								<!--end::Size-->
								<!--begin::Last modified-->
								<td>
									<?php 
									if (!empty($yer->EX_ANIO_FEC_REGISTRO)) {
										echo date("d/m/Y h:m:s", strtotime($yer->EX_ANIO_FEC_REGISTRO));
									}
									?>									
								</td>
								<td><span class="badge <?php echo 'badge-'.$color; ?>"><?php echo $label; ?></span></td>
								<!--end::Last modified-->
								<!--begin::Actions-->
								<td class="text-end" data-kt-filemanager-table="action_dropdown">
									<div class="d-flex justify-content-end">
										<div class="ms-2">
											<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary me-2" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
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
													<a href="<?php echo base_url(); ?>empresa/view_month/<?php echo $uri; ?>" class="menu-link px-3">Ver</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link px-3" onclick="UpdAnio(<?php echo "'".$yer->PK_EX_ANIO.'|'.$yer->EX_ANIO_NOMBRE.'|'.$yer->EX_ANIO_ESTADO."'"; ?>)">Editar</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link text-danger px-3" onclick="Deleted(<?php echo "'".$yer->PK_EX_ANIO.'|'.$yer->EX_ANIO_NOMBRE.'|'.$yer->EX_ANIO_ESTADO.'|'.$yer->totalMes."'"; ?>)">Eliminar</a>
												</div>
												<!--end::Menu item-->
											</div>
											<!--end::Menu-->
											<!--end::More-->
										</div>
									</div>
								</td>
								<!--end::Actions-->
							</tr>				
						<?php endforeach ?>				
					</tbody>
					<!--end::Table body-->
				</table>
				<!--end::Table-->
			</div>
			<!--end::Card body-->
		</div>
	</div>
</div>

<?php 
$this->load->view('mantenimiento/empresas/modal/maddAnio');
$this->load->view('mantenimiento/empresas/modal/meditAnio');
?>

<script>
	function UpdAnio(data) {
		var r = data.split("|");
		
		document.getElementById("mtxtUpdIdAnio").value = r[0];
		document.getElementById("mtxtUpdNomAnio").value = r[1];
		document.getElementById("mcboUpdEstado").value = r[2];

		$('#mUpdAnio').modal('show');
	}

	function Deleted(data) {
		var r = data.split("|");
		if (r[3] != 0) {
			alertError('La carpeta tiene archivos internos, no se puede eliminar.');
			return false;
		}

		Swal.fire({
			title: '¿Está seguro?',
			text: "¡No podrás revertir esto!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, eliminar!'
		}).then((result) => {
			if (result.isConfirmed) {
				Swal.fire(
					'Deleted!',
					'Your file has been deleted.',
					'success'
					)
			}
		})
	}
</script>