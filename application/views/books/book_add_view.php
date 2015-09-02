<div class="panel panel-primary">

	<div class="panel-heading">เพิ่มรายการหนังสือ</div>

	<div class="panel-body">
		

		<?php //if($this->session->flashdata('errors')):?>
		<?php if(validation_errors()): ?>

			<div class="alert alert-danger alert-dismissible" role="alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  				<?php //echo $this->session->flashdata('errors'); ?>
  				<?php echo validation_errors(); ?>
			</div>
		
		<?php endif; ?>

		<div class="col-md-2"></div>
		<div class="col-md-8">
			<?php
				$attributes = array(
				'id' => 'add_book_form',
				'class' => 'form-horizontal'
				);
			?>
			<?php echo form_open('books/newbook', $attributes); ?>

			<div class="form-group">
				<div class="col-sm-3">
					<?php echo form_label('ชื่อหนังสือ'); ?>
				</div>
				<div class="col-sm-9">
					<?php
					$attributes = array(
						'class' => 'form-control',
						'name' => 'bookname',
						'value' => $bookname,
						);
					?>
					<?php echo form_input($attributes); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-3">
					<?php echo form_label('ชื่อผู้แต่ง'); ?>
				</div>
				<div class="col-sm-9">
					<?php
					$attributes = array(
						'class' => 'form-control',
						'name' => 'writer',
						'value' => $writer,
						);
					?>
					<?php echo form_input($attributes); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-3">
					<?php echo form_label('หมายเลข ISBN'); ?>
				</div>
				<div class="col-sm-9">
					<?php
					$attributes = array(
						'class' => 'form-control',
						'name' => 'isbn',
						'value' => $isbn,
						);
					?>
					<?php echo form_input($attributes); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-3">
					<?php echo form_label('ราคา'); ?>
				</div>
				<div class="col-sm-9">
					<?php
					$attributes = array(
						'class' => 'form-control',
						'name' => 'price',
						'value' => $price,
						);
					?>
					<?php echo form_input($attributes); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-3">
					<?php echo form_label('จำนวน'); ?>
				</div>
				<div class="col-sm-9">
					<?php
					$attributes = array(
						'class' => 'form-control',
						'name' => 'quantity',
						'value' => $quantity,
						);
					?>
					<?php echo form_input($attributes); ?>
				</div>
			</div>

			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-9">
					<?php  
						$attributes = array(
							'class' => 'btn btn-success',
							'name' => 'submit',
							'value' => 'บันทึก'
							);
					?>
					<?php echo form_submit($attributes); ?>
				</div>
			</div>
			
			<?php echo form_close(); ?>		
		</div>
		<div class="col-md-2"></div>		
	</div>
</div>




