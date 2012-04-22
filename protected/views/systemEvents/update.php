<?php
$this->breadcrumbs=array(
	'System Events'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List SystemEvents', 'url'=>array('index')),
	array('label'=>'Create SystemEvents', 'url'=>array('create')),
	array('label'=>'View SystemEvents', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage SystemEvents', 'url'=>array('admin')),
);
?>

<h1>Update SystemEvents <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>