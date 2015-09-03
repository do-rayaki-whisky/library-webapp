<?php echo $this->session->flashdata('debug'); ?>
<div class="panel panel-success">
	<div class="panel-heading"><?php echo $title; ?></div>
	<div class="panel-body">

		<?php if(validation_errors()): ?>

			<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<?php echo validation_errors(); ?>
			</div>
		
		<?php endif; ?>

		<div class="col-md-2"></div>
		<div class="col-md-8">

			<?php
				$attributes = array(
					'id' => 'borrow_form',
					'class' => 'form-horizontal'
				);
			?>

			<?php echo form_open('rentals/borrow', $attributes); ?>

			<div class="form-group">

				<?php

					echo form_label('1. เลือกสมาชิก');

					$attributes = array('class' => 'form-control');
					$options['0'] = "-";
					foreach ($members->result() as $member) {
						$options[$member->member_id] = $member->member_id . "  " . $member->member_name . " " . $member->member_surname;
					}

					echo form_dropdown('member_id', $options, '0', $attributes);
				?>

			</div>

			<div class="form-group">
				<?php  

					echo form_label('2. เลือกหนังสือ');
					$book_options['0'] = '-';
					foreach ($books as $book) {
						$book_options[$book->book_id] = $book->book_name;
					}

					echo form_dropdown('book_id', $book_options, '0', $attributes);
				?>
			</div>


			<div class="form-group">

				<?php echo form_label('3. ใส่จำนวนหนังสือ'); ?>
				<?php $attributes = array('name' => 'rental_quantity', 'class' => 'form-control'); ?>
				<div class="row">
					<div class="col-xs-4">
						<?php echo form_input($attributes); ?>
					</div>
				</div>
			</div>

			<div class="form-group">
				<?php  
					$attributes = array(
							'class' => 'btn btn-success',
							'name' => 'submit',
							'value' => 'บัณทึกรายการยืม'
							);
				?>

				<?php echo form_submit($attributes); ?>

			</div>

			<?php echo form_close(); ?>

		</div>
		<div class="col-md-2"></div>
	</div>
</div>
