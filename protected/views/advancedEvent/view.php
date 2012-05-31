<?php
$this->breadcrumbs=array(
    'System Events'=>array('index'),
    'Manage',
);

$this->menu=array(
    array('label'=>'All events', 'url'=>array('index')),
    array('label'=>'Nginx SystemEvents', 'url'=>array('nginx')),
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

<h1>Расширенный лог</h1>


<?php $this->widget('bootstrap.widgets.BootGridView', array(
    'id'=>'system-events-grid',
    'type'=>'striped bordered condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'enableHistory'=>true,
    'template'=>"{summary}\n{items}\n{pager}",
    'columns'=>array(

        array(

            'class'=>'CCheckBoxColumn',
            'selectableRows'=>2

        ),

        array( 'name'=>'host', 'value'=>'$data->systemEvent->FromHost','filter'=>array('eseo'=>'eseo','econova'=>'econova','aristos'=>'aristos','lirio'=>'lirio'),
           // 'htmlOptions'=>array('style'=>'width: 50px','data-title'=>'Heading', 'data-content'=>'Content ...', 'rel'=>'popover'),
        ),
        array( 'name'=>'type', 'filter'=>array('nginx'=>'nginx','php-fpm'=>'php-fpm') ),
        array( 'name'=>'receivedAt', 'value'=>'$data->systemEvent->ReceivedAt'),
        'message',

        array(

            'class'=>'bootstrap.widgets.BootButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
    ),
)); ?>

