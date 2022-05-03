<div class="toolbar" id="kt_toolbar">
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
		<div data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
			<h1 class="d-flex align-items-center text-dark fw-bolder fs-3 my-1">Agregar empresa</h1>
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
<div class="post d-flex flex-column-fluid" id="kt_post">
	<div id="kt_content_container" class="container-xxl">								
		<div class="card mb-5 mb-xl-10">
			<div class="card-body py-10">
				<div class="notice d-flex bg-light-danger rounded border-danger border border-dashed p-6">
					<span class="svg-icon svg-icon-2tx svg-icon-danger me-4">
						<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
							<path d="M20 19.725V18.725C20 18.125 19.6 17.725 19 17.725H5C4.4 17.725 4 18.125 4 18.725V19.725H3C2.4 19.725 2 20.125 2 20.725V21.725H22V20.725C22 20.125 21.6 19.725 21 19.725H20Z" fill="black" />
							<path opacity="0.3" d="M22 6.725V7.725C22 8.325 21.6 8.725 21 8.725H18C18.6 8.725 19 9.125 19 9.725C19 10.325 18.6 10.725 18 10.725V15.725C18.6 15.725 19 16.125 19 16.725V17.725H15V16.725C15 16.125 15.4 15.725 16 15.725V10.725C15.4 10.725 15 10.325 15 9.725C15 9.125 15.4 8.725 16 8.725H13C13.6 8.725 14 9.125 14 9.725C14 10.325 13.6 10.725 13 10.725V15.725C13.6 15.725 14 16.125 14 16.725V17.725H10V16.725C10 16.125 10.4 15.725 11 15.725V10.725C10.4 10.725 10 10.325 10 9.725C10 9.125 10.4 8.725 11 8.725H8C8.6 8.725 9 9.125 9 9.725C9 10.325 8.6 10.725 8 10.725V15.725C8.6 15.725 9 16.125 9 16.725V17.725H5V16.725C5 16.125 5.4 15.725 6 15.725V10.725C5.4 10.725 5 10.325 5 9.725C5 9.125 5.4 8.725 6 8.725H3C2.4 8.725 2 8.325 2 7.725V6.725L11 2.225C11.6 1.925 12.4 1.925 13.1 2.225L22 6.725ZM12 3.725C11.2 3.725 10.5 4.425 10.5 5.225C10.5 6.025 11.2 6.725 12 6.725C12.8 6.725 13.5 6.025 13.5 5.225C13.5 4.425 12.8 3.725 12 3.725Z" fill="black" />
						</svg>
					</span>
					<div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
						<div class="mb-3 mb-md-0 fw-bold">
							<h4 class="text-gray-900 fw-bolder">Atención</h4>
							<div class="fs-6 text-gray-700 pe-7">Los cambios que se realicen en este módulo, afectarán de manera inmediata al sistema de ACTIVIDADES. Solo se debe realizar la carga 1 vez al año.</div>
						</div>
					</div>
				</div>
				<br>
				<h2 class="mb-9">Carga masiva de actividades</h2>
				<form method="post" id="add_actividades" enctype="multipart/form-data">
					<div class="row mb-10">
						<div class="col-xl-6 ">
							<h4 class="mb-0">Formato</h4>
							<p class="fs-6 fw-bold text-gray-600 py-4 m-0">Para poder cargar el documento se requiere un formato en especifico que se puede descargar en el siguiente enlace.</p>
							<a href="<?php echo base_url(); ?>assets/formatos/FORMATO VENCIMIENTO SUNAT.xlsx" target="_blank" class="btn btn-primary  fw-bolder">Descargar</a>
						</div>					
						<div class="col-xl-6">
							<h4 class="text-gray-800 mb-0">Carga de Archivo</h4>
							<p class="fs-6 fw-bold text-gray-600 py-4 m-0">Formatos aceptables .xls, .xlsx</p>
							<div class="d-flex">
								<input id="txtArchivo" type="file" class="form-control form-control-solid me-3 flex-grow-1" name="txtArchivo" value="" />
								<button type="submit" class="btn btn-light btn-active-light-primary fw-bolder flex-shrink-0">Guardar</button>
							</div>
							<table class="table" style="display: none;">
								<thead>
									<tr>
										<th scope="col">ID</th>
										<th scope="col">RUC</th>
										<th scope="col">ULTIMO DIGITO</th>
										<th scope="col">REPORTES</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($emp as $em): 
										if ($em->EX_EMP_IS_GROUP != 2) {
											$str = substr($em->EX_EMP_RUC, -1); ?>
											<tr>
												<th scope="row">
													<?php echo $em->PK_EX_EMPRESA; ?> 
													<input type="hidden" name="tbId[]" value="<?php echo $em->PK_EX_EMPRESA; ?>">
												</th>
												<td>
													<?php echo $em->EX_EMP_RUC; ?>
													<input type="hidden" name="tbRuc[]" value="<?php echo $em->EX_EMP_RUC; ?>">
												</td>
												<td>
													<?php echo $str; ?>
													<input type="hidden" name="tbDig[]" value="<?php echo $str; ?>">
													<input type="hidden" name="tbRes[]" value="<?php echo $em->EX_EMP_CONT_RESPONSABLE; ?>">
												</td>
												<td>
													<?php #echo $em->EX_EMP_REPORT_ASIGNADO; 
													if ($em->EX_EMP_REPORT_ASIGNADO == '') {
														$resport = '';
													}else{
														$rep_custom = unserialize($em->EX_EMP_REPORT_ASIGNADO); 
														$resport =  json_encode($rep_custom);
														$resport = str_replace("[", "", $resport);
														$resport = str_replace("]", "", $resport);
														$resport = str_replace('"', "", $resport);
													}

													

													
													echo $resport;
													/*foreach ($reportes as $rep) {
														//$sel = (in_array($rep_custom, $rep->SYSITEM_NREGISTRO)) ? "ok" : "ko" ;
														echo $rep->SYSITEM_NREGISTRO;
													}	*/												
													?>
													<input type="hidden" name="tbRet[]" value="<?php echo $resport; ?>">
												</td>
											</tr>
										<?php }
										
									endforeach ?>									
								</tbody>
							</table>
						</div>

					</div>	
				</form>									
			</div>
		</div>								
	</div>
</div>


<script>
	$(document).ready(function(){
		$('#add_actividades').on('submit', function(event){
			event.preventDefault();
			$.ajax({
				url:"<?php echo base_url(); ?>actividad/import",
				method:"POST",
				data:new FormData(this),
				contentType:false,
				cache:false,
				processData:false,
				beforeSend: function(){
					$('#datos').html('<div class="spinner-border"></div>');
				},
				success:function(data){
					//console.log(data);
					let timerInterval
					Swal.fire({
					  title: 'La información se esta procesando!',
					  html: 'La carga terminará en <b></b> .',
					  timer: 10000,
					  timerProgressBar: true,
					  didOpen: () => {
					    Swal.showLoading()
					    const b = Swal.getHtmlContainer().querySelector('b')
					    timerInterval = setInterval(() => {
					      b.textContent = Swal.getTimerLeft()
					    }, 100)
					  },
					  willClose: () => {
					    clearInterval(timerInterval)
					  }
					}).then((result) => {
					  /* Read more about handling dismissals below */
					  if (result.dismiss === Swal.DismissReason.timer) {
					    Swal.fire(
						  'Exitoso',
						  'La carga se realizo satisfactoriamente.',
						  'success'
						)
					  }
					});					
				},
				error: function(data, textStatus){
					/*console.log(data);*/
					if (textStatus=='timeout') {
						Swal.fire(
						  'Error',
						  'Tiempo Agotado.',
						  'warning'
						)				
					}else{
						Swal.fire(
						  'Error',
						  data,
						  'warning'
						)						
					}
					
				}
			})
		});

	});
</script>
