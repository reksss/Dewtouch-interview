<div class="row-fluid">
	<div class="alert alert-info">
		<h3>File Upload Question</h3>
	</div>

	<hr />

	<div class="alert">
		<h3>Import Form</h3>
	</div>

	<div class="upload-form">
<?php
echo $this->Form->create(array(),['type'=> 'file']);
echo $this->Form->input('file', array('label' => 'File Upload', 'type' => 'file', 'class'=> 'form-control'));
//echo $this->Form->submit('Upload', array('class' => 'btn btn-primary'));
echo $this->Form->button(__('Upload File'),['type' => 'submit', 'class'=> 'form-controlbtn btn-default']);
echo $this->Form->end();
?>

	<hr />

	<div class="alert alert-success">
		<h3>Data Imported</h3>
	</div>


</div>