<?php
$this->breadcrumbs=array(
	'System Events'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SystemEvents', 'url'=>array('index')),
	array('label'=>'Manage SystemEvents', 'url'=>array('admin')),
);
?>

<h1>Create SystemEvents</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>