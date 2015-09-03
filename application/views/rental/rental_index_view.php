<div class="panel panel-warning">

	<div class="panel-heading"><?php echo $title ?></div>

	<div class="panel-body">

		<div class="table-responsive">

			<?php 

				$table_template = array(
					'table_open' => '<table class="table table-striped">'
					);

				$this->table->set_template($table_template);
				$this->table->set_heading(array('#', 'หนังสือ', 'สมาชิก', 'จำนวน', 'วันที่'));
				$i = 1;
				foreach ($rentals as $rental) {

					$this->table->add_row(array(
						$i,
						$rental->book_name,
						$rental->member_name,
						$rental->rental_quantity,
						$rental->rental_date,
					));

					$i++;
				}

				echo $this->table->generate();

			?>

		</div>

	</div>
	
</div>