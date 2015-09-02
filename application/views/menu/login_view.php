<?php if($this->session->userdata('logged_in')): ?>

<div class="panel panel-danger">
	<div class="panel-heading">ข้อมูลผู้ใช้</div>
	<div class="panel-body">
		<?php echo "สวัสดี " . $this->session->userdata('displayname'); ?>
		<?php echo "<br><br>"; ?>
		<div class="form-group">

			<?php 
				$attributes = array(
				'class' => 'btn btn-danger',
				'name' => 'submit',
				'value' => 'ออกจากระบบ'
				);
			?>
			<?php echo form_open('users/logout'); ?>
			<?php echo form_submit($attributes); ?>
			<?php echo form_close(); ?>
			
		</div>
	</div>
</div>

<?php $this->load->view('menu/menu_rental_view'); ?>

<?php $this->load->view('menu/menu_adminmenu_view'); ?>

<?php else: ?>

<div class="panel panel-success">
	<div class="panel-heading">เข้าสู่ระบบ</div>
	<div class="panel-body">

		<?php if($this->session->flashdata('login_failed')): ?>
			<div class="alert alert-danger">
				<?php echo $this->session->flashdata('login_failed'); ?>
			</div>
		<?php endif; ?>

		<?php $attributes = array('id' => 'login_form', 'class' => 'form_horizontal'); ?>
		<?php echo form_open('users/login', $attributes); ?>
		<div class="form-group">
			<?php echo form_label('ชื่อผู้ใช้'); ?>
			<?php

				$attributes = array(
					'class' => 'form-control',
					'name' => 'username',
					'placeholder' => 'ใส่ชื่อผู้ใช้'
					);

			?>
			<?php echo form_input($attributes); ?>
		</div>

		<div class="form-group">
			<?php echo form_label('รหัสผ่าน'); ?>
			<?php $attributes = array('class' => 'form-control', 'name' => 'password', 'placeholder' => 'ใส่รหัสผ่าน'); ?>
			<?php echo form_password($attributes); ?>
		</div>

		<div class="form-group">

			<?php
				$attributes = array(
					'class' => 'btn btn-success',
					'name' => 'submit',
					'value' => 'เข้าสู่ระบบ'
					);

				echo form_submit($attributes);
			?>

		</div>
		<?php echo form_close(); ?>
	</div>
</div>

<?php endif; ?>