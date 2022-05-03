<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
	<base href="../../../">
	<title>EXTRANET ACG</title>
	<meta charset="utf-8" />
	<meta name="description" content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic - Bootstrap 5 HTML, VueJS, React, Angular &amp; Laravel Admin Dashboard Theme" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/logos/logo_acg.ico" />
	<!--begin::Fonts-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Global Stylesheets Bundle(used by all pages)-->
	<link href="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" class="bg-dark">
	<!--begin::Main-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Authentication - Sign-in -->
		<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed" style="background-image: url(<?php echo base_url(); ?>assets/media/illustrations/sketchy-1/14-dark.png">
			<!--begin::Content-->
			<div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
				<!--begin::Logo-->
				<a href="<?php echo base_url(); ?>" class="mb-12">
					<img alt="Logo" src="<?php echo base_url(); ?>assets/media/logos/logo-5.png" class="h-80px" />
				</a>
				<!--end::Logo-->
				<!--begin::Wrapper-->
				<div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
					<!--begin::Form-->
					<?php echo form_open("login", array("id" => "login-form", "name" => "login-form", "class" => "general-form", "role" => "form")); ?>						<!--begin::Heading-->
					<div class="text-center mb-10">
						<!--begin::Title-->
						<h1 class="text-dark mb-3">Iniciar sesión</h1>
						<!--end::Title-->
					</div>
					<!--begin::Heading-->
					<?php if (validation_errors()) { ?>
						<div class="alert alert-danger" role="alert">
							<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
							<?php echo validation_errors(); ?>
						</div>
					<?php } ?>
					<!--begin::Input group-->
					<div class="fv-row mb-10">
						<!--begin::Label-->
						<label class="form-label fs-6 fw-bolder text-dark">N° Documento</label>
						<!--end::Label-->
						<!--begin::Input-->
						<input class="form-control form-control-lg form-control-solid" type="text" name="txtndoc" autocomplete="off" />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Input group-->
					<div class="fv-row mb-10">
						<!--begin::Wrapper-->
						<div class="d-flex flex-stack mb-2">
							<!--begin::Label-->
							<label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
							<!--end::Label-->
							<!--begin::Link
							<a href="#" class="link-primary fs-6 fw-bolder">¿Olvidó su contraseña?</a>
							end::Link-->
						</div>
						<!--end::Wrapper-->
						<!--begin::Input-->
						<input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
						<!--end::Input-->
					</div>
					<!--end::Input group-->
					<!--begin::Actions-->
					<div class="text-center">
						<!--begin::Submit button-->
						<button type="submit" id="signin" class="btn btn-lg btn-primary w-100 mb-5">
							<span class="indicator-label">Continue</span>					
						</button>
						<!--end::Submit button-->				
					</div>
					<!--end::Actions-->
					<?php echo form_close(); ?>
					<!--end::Form-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Content-->
			<!--begin::Footer-->
			<div class="d-flex flex-center flex-column-auto p-10">
				<!--begin::Links-->
				<div class="d-flex align-items-center fw-bold fs-6">
					<a href="#" class="text-muted text-hover-primary px-2">Acerca de</a>
					<a href="#" class="text-muted text-hover-primary px-2">Contactenos</a>
				</div>
				<!--end::Links-->
			</div>
			<!--end::Footer-->
		</div>
		<!--end::Authentication - Sign-in-->
	</div>
	<!--end::Main-->
	<script>var hostUrl = "assets/";</script>
	<!--begin::Javascript-->
	<!--begin::Global Javascript Bundle(used by all pages)-->
	<script src="<?php echo base_url(); ?>assets/plugins/global/plugins.bundle.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Page Custom Javascript(used by this page)
	<script src="<?php echo base_url(); ?>assets/js/custom/authentication/sign-in/general.js"></script>
	end::Page Custom Javascript-->
	<!--end::Javascript-->

	<!--end::Page Scripts -->
	<script type="text/javascript">
		$(document).ready(function () {
			$("form[name='login-form']").submit(function(e) {
				$.ajax({
					type: "POST",
					url: "<?php echo base_url('login'); ?>",
					data: $("#login-form").serialize(),
					beforeSend : function(msg){ $("#submitbutton").html('<img src="<?php echo base_url('public/images/loading.gif'); ?>" />'); },
					success: function(msg)
					{
						
					}
				});
			});
		});
	</script>
</body>
<!--end::Body-->
</html>