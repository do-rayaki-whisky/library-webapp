<!DOCTYPE>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title> <?php echo $title; ?> </title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<style type="text/css">

			table {

				font-family: "Tahoma";
				font-size: 15px;
			}

		</style>
	</head>
	<body>
		<div class="container">
			<div class="row">

				<?php $this->load->view('menu/menu_navbar_view'); ?>

			</div>
			<div class="row">

				<div class="col-md-3">

					<div class="row">

						<?php $this->load->view('menu/login_view'); ?>

					</div>

				</div>

				<div class="col-md-9">

					<?php if($this->session->flashdata('create_book_success')): ?>

						<div class="alert alert-info alert-dismissible" role="alert">
  							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  							<?php echo $this->session->flashdata('create_book_success'); ?>
						</div>
						
					<?php endif; ?>

					<?php $this->load->view($content_view); ?>

				</div>

			</div>
		</div>
	</body>
</html>