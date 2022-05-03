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
						<h2 class="mb-1">File Manager</h2>
						<div class="text-muted fw-bolder">
							<a href="#">Keenthemes</a>
							<span class="mx-3">|</span>
							<a href="#">File Manager</a>
							<span class="mx-3">|</span>2.6 GB
							<span class="mx-3">|</span>758 items
						</div>
					</div>
					<!--end::Title-->
				</div>
			</div>
			<!--end::Card header-->				
		</div>
		<!--end::Card-->
		<!--begin::Card-->
		<div class="card card-flush">
			<!--begin::Card header-->
			<div class="card-header pt-8">
				<div class="card-title">
					<!--begin::Search-->
					<div class="d-flex align-items-center position-relative my-1">
						<!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
						<span class="svg-icon svg-icon-1 position-absolute ms-6">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
								<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
								<path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
							</svg>
						</span>
						<!--end::Svg Icon-->
						<input type="text" data-kt-filemanager-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Files &amp; Folders" />
					</div>
					<!--end::Search-->
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
					<!--begin::Group actions-->
					<div class="d-flex justify-content-end align-items-center d-none" data-kt-filemanager-table-toolbar="selected">
						<div class="fw-bolder me-5">
							<span class="me-2" data-kt-filemanager-table-select="selected_count"></span>Selected
						</div>
						<button type="button" class="btn btn-danger" data-kt-filemanager-table-select="delete_selected">Delete Selected</button>
					</div>
					<!--end::Group actions-->
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
							<th class="min-w-250px">Name</th>
							<th class="min-w-10px">Size</th>
							<th class="min-w-125px">Last Modified</th>
							<th class="w-125px"></th>
						</tr>
						<!--end::Table row-->
					</thead>
					<!--end::Table head-->
					<!--begin::Table body-->
					<tbody class="fw-bold text-gray-600">
						<?php foreach ($fils as $fil): 
							$idfil = base64_encode("+_23_".$fil->PK_EX_CARPETA."_+_ACG_Extranet_si_12_11_2019_v1_Asce_ShaoranN");
							?>
							<tr>
								<!--begin::Name=-->
								<td data-order="account">
									<div class="d-flex align-items-center">
										<!--begin::Svg Icon | path: icons/duotune/files/fil012.svg-->
										<span class="svg-icon svg-icon-2x svg-icon-primary me-4">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path opacity="0.3" d="M10 4H21C21.6 4 22 4.4 22 5V7H10V4Z" fill="black" />
												<path d="M9.2 3H3C2.4 3 2 3.4 2 4V19C2 19.6 2.4 20 3 20H21C21.6 20 22 19.6 22 19V7C22 6.4 21.6 6 21 6H12L10.4 3.60001C10.2 3.20001 9.7 3 9.2 3Z" fill="black" />
											</svg>
										</span>
										<!--end::Svg Icon-->
										<a href="<?php echo base_url(); ?>empresa/gestion_file_month/<?php echo $idfil; ?>" class="text-gray-800 text-hover-primary"><?php echo $fil->EX_CARPETA_NOMBRE; ?></a>
									</div>
								</td>
								<!--end::Name=-->
								<!--begin::Size-->
								<td>-</td>
								<!--end::Size-->
								<!--begin::Last modified-->
								<td>-</td>
								<!--end::Last modified-->
								<!--begin::Actions-->
								<td class="text-end" data-kt-filemanager-table="action_dropdown">
									<div class="d-flex justify-content-end">
										<!--begin::Share link-->
										<div class="ms-2" data-kt-filemanger-table="copy_link">
											<button type="button" class="btn btn-sm btn-icon btn-light btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
												<!--begin::Svg Icon | path: icons/duotune/coding/cod007.svg-->
												<span class="svg-icon svg-icon-5 m-0">
													<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
														<path opacity="0.3" d="M18.4 5.59998C18.7766 5.9772 18.9881 6.48846 18.9881 7.02148C18.9881 7.55451 18.7766 8.06577 18.4 8.44299L14.843 12C14.466 12.377 13.9547 12.5887 13.4215 12.5887C12.8883 12.5887 12.377 12.377 12 12C11.623 11.623 11.4112 11.1117 11.4112 10.5785C11.4112 10.0453 11.623 9.53399 12 9.15698L15.553 5.604C15.9302 5.22741 16.4415 5.01587 16.9745 5.01587C17.5075 5.01587 18.0188 5.22741 18.396 5.604L18.4 5.59998ZM20.528 3.47205C20.0614 3.00535 19.5074 2.63503 18.8977 2.38245C18.288 2.12987 17.6344 1.99988 16.9745 1.99988C16.3145 1.99988 15.661 2.12987 15.0513 2.38245C14.4416 2.63503 13.8876 3.00535 13.421 3.47205L9.86801 7.02502C9.40136 7.49168 9.03118 8.04568 8.77863 8.6554C8.52608 9.26511 8.39609 9.91855 8.39609 10.5785C8.39609 11.2384 8.52608 11.8919 8.77863 12.5016C9.03118 13.1113 9.40136 13.6653 9.86801 14.132C10.3347 14.5986 10.8886 14.9688 11.4984 15.2213C12.1081 15.4739 12.7616 15.6039 13.4215 15.6039C14.0815 15.6039 14.7349 15.4739 15.3446 15.2213C15.9543 14.9688 16.5084 14.5986 16.975 14.132L20.528 10.579C20.9947 10.1124 21.3649 9.55844 21.6175 8.94873C21.8701 8.33902 22.0001 7.68547 22.0001 7.02551C22.0001 6.36555 21.8701 5.71201 21.6175 5.10229C21.3649 4.49258 20.9947 3.93867 20.528 3.47205Z" fill="black" />
														<path d="M14.132 9.86804C13.6421 9.37931 13.0561 8.99749 12.411 8.74695L12 9.15698C11.6234 9.53421 11.4119 10.0455 11.4119 10.5785C11.4119 11.1115 11.6234 11.6228 12 12C12.3766 12.3772 12.5881 12.8885 12.5881 13.4215C12.5881 13.9545 12.3766 14.4658 12 14.843L8.44699 18.396C8.06999 18.773 7.55868 18.9849 7.02551 18.9849C6.49235 18.9849 5.98101 18.773 5.604 18.396C5.227 18.019 5.0152 17.5077 5.0152 16.9745C5.0152 16.4413 5.227 15.93 5.604 15.553L8.74701 12.411C8.28705 11.233 8.28705 9.92498 8.74701 8.74695C8.10159 8.99737 7.5152 9.37919 7.02499 9.86804L3.47198 13.421C2.52954 14.3635 2.00009 15.6417 2.00009 16.9745C2.00009 18.3073 2.52957 19.5855 3.47202 20.528C4.41446 21.4704 5.69269 21.9999 7.02551 21.9999C8.35833 21.9999 9.63656 21.4704 10.579 20.528L14.132 16.975C14.5987 16.5084 14.9689 15.9544 15.2215 15.3447C15.4741 14.735 15.6041 14.0815 15.6041 13.4215C15.6041 12.7615 15.4741 12.108 15.2215 11.4983C14.9689 10.8886 14.5987 10.3347 14.132 9.86804Z" fill="black" />
													</svg>
												</span>
												<!--end::Svg Icon-->
											</button>
											<!--begin::Menu-->
											<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-300px" data-kt-menu="true">
												<!--begin::Card-->
												<div class="card card-flush">
													<div class="card-body p-5">
														<!--begin::Loader-->
														<div class="d-flex" data-kt-filemanger-table="copy_link_generator">
															<!--begin::Spinner-->
															<div class="me-5" data-kt-indicator="on">
																<span class="indicator-progress">
																	<span class="spinner-border spinner-border-sm align-middle ms-2"></span>
																</span>
															</div>
															<!--end::Spinner-->
															<!--begin::Label-->
															<div class="fs-6 text-dark">Generating Share Link...</div>
															<!--end::Label-->
														</div>
														<!--end::Loader-->
														<!--begin::Link-->
														<div class="d-flex flex-column text-start d-none" data-kt-filemanger-table="copy_link_result">
															<div class="d-flex mb-3">
																<!--begin::Svg Icon | path: icons/duotune/arrows/arr085.svg-->
																<span class="svg-icon svg-icon-2 svg-icon-success me-3">
																	<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
																		<path d="M9.89557 13.4982L7.79487 11.2651C7.26967 10.7068 6.38251 10.7068 5.85731 11.2651C5.37559 11.7772 5.37559 12.5757 5.85731 13.0878L9.74989 17.2257C10.1448 17.6455 10.8118 17.6455 11.2066 17.2257L18.1427 9.85252C18.6244 9.34044 18.6244 8.54191 18.1427 8.02984C17.6175 7.47154 16.7303 7.47154 16.2051 8.02984L11.061 13.4982C10.7451 13.834 10.2115 13.834 9.89557 13.4982Z" fill="black" />
																	</svg>
																</span>
																<!--end::Svg Icon-->
																<div class="fs-6 text-dark">Share Link Generated</div>
															</div>
															<input type="text" class="form-control form-control-sm" value="https://path/to/file/or/folder/" />
															<div class="text-muted fw-normal mt-2 fs-8 px-3">Read only.
																<a href="../../demo1/dist/apps/file-manager/settings/.html" class="ms-2">Change permissions</a>
															</div>
														</div>
														<!--end::Link-->
													</div>
												</div>
												<!--end::Card-->
											</div>
											<!--end::Menu-->
											<!--end::Share link-->
										</div>
										<!--begin::More-->
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
													<a href="../../demo1/dist/apps/file-manager/files.html" class="menu-link px-3">View</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link px-3" data-kt-filemanager-table="rename">Rename</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link px-3">Download Folder</a>
												</div>
												<!--end::Menu item-->
												<!--begin::Menu item-->
												<div class="menu-item px-3">
													<a href="#" class="menu-link px-3" data-kt-filemanager-table-filter="move_row" data-bs-toggle="modal" data-bs-target="#kt_modal_move_to_folder">Move to folder</a>
												</div>
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
		<!--end::Card-->				
	</div>
</div>
