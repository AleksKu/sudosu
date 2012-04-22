<?php
$this->breadcrumbs=array(
	'System Events',
);

$this->menu=array(
	array('label'=>'Create SystemEvents', 'url'=>array('create')),
	array('label'=>'Manage SystemEvents', 'url'=>array('admin')),
);
?>

<h1>System Events</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
