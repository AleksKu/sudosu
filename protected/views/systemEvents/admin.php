<?php
$this->breadcrumbs=array(
	'System Events'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SystemEvents', 'url'=>array('index')),
	array('label'=>'Create SystemEvents', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('system-events-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Системный лог</h1>


<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'id'=>'system-events-grid',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'template'=>"{summary}\n{items}\n{pager}",
    'columns'=>array(
         array('name'=>'FromHost','filter'=>array('eseo'=>'eseo','econova'=>'econova','aristos'=>'aristos','lirio'=>'lirio')),
        'ReceivedAt',
        'DeviceReportedTime',
       'Facility',
        'Priority',
        array('name'=>'ShortMessage','type'=>'logMessage'),
        'SysLogTag',
        /*
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
          */
        array(

            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>
