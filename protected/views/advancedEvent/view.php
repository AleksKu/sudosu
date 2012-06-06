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


<div class="box grad_colour_dark_blue" id="box_0">
    <h2 class="box_head grad_colour round_top">Расширенный лог</h2>
    <a href="#" class="settings box_button_3" title="config">&nbsp;</a>
    <a href="#" class="toggle box_button_2" title="toggle">&nbsp;</a>
    <a href="#" class="destroy box_button_1" title="close">&nbsp;</a>
    <div class="toggle_container">
        <div class="block box_content round_bottom padding_20">
            <div class="row-fluid">
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
            </div>
        </div>
    </div>
</div>


