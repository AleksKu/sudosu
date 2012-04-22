<?php
$this->breadcrumbs=array(
	'System Events'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List SystemEvents', 'url'=>array('index')),
	array('label'=>'Create SystemEvents', 'url'=>array('create')),
	array('label'=>'Update SystemEvents', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete SystemEvents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SystemEvents', 'url'=>array('admin')),
);
?>

<h1>View SystemEvents #<?php echo $model->ID; ?></h1>

    <pre class="prettyprint linenums">
        <?=$model->Message?>
    </pre>

<?php /*$this->widget('bootstrap.widgets.BootDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'CustomerID',
		'ReceivedAt',
		'DeviceReportedTime',
		'Facility',
		'Priority',
		'FromHost',
		'Message',
		'NTSeverity',
		'Importance',
		'EventSource',
		'EventUser',
		'EventCategory',
		'EventID',
		'EventBinaryData',
		'MaxAvailable',
		'CurrUsage',
		'MinUsage',
		'MaxUsage',
		'InfoUnitID',
		'SysLogTag',
		'EventLogType',
		'GenericFileName',
		'SystemID',
	),
)); */?>
