<?php 

$table_template = array(
	'table_open' => '<table class="table table-bordered">'
	);

$this->table->set_template($table_template);
$this->table->set_heading(array('รหัส', 'ISBN', 'ชื่อหนังสือ', 'ชื่อผู้เขียน', 'ราคา', 'จำนวน'));

foreach ($book as $object) {
	$this->table->add_row(array(
		$object->book_id,
		$object->book_isbn,
		$object->book_name,
		$object->book_writer,
		$object->book_price,
		$object->book_quantity
	));
}

echo $this->table->generate();

?>