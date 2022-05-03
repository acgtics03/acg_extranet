<!DOCTYPE html>
<html lang="en">
	<?php $this->load->view('layout/includes/head'); ?>
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Page-->
			<div class="page d-flex flex-row flex-column-fluid">
				<!--begin::Aside-->
				<?php $this->load->view('layout/includes/aside'); ?>
				<!--end::Aside-->
				<!--begin::Wrapper-->
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<!--begin::Header-->
					<?php $this->load->view('layout/includes/header'); ?>
					<!--end::Header-->
					<!--begin::Content-->
					<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
						<?php
							if (isset($content_view) && $content_view != "") {
								$this->load->view($content_view);
							}
						?>
					</div>
					<!--end::Content-->
					<!--begin::Footer-->
					<?php 
						$this->load->view('layout/includes/footer');
						$this->load->view('layout/includes/extra');
						$this->load->view('layout/includes/script'); 
					?>
					<!--end::Footer-->
				</div>
				<!--end::Wrapper-->
			</div>
			<!--end::Page-->
		</div>
		<!--end::Root-->

		
	</body>
	<!--end::Body-->
</html>