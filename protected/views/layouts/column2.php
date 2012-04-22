<?php $this->beginContent('//layouts/main'); ?>

<div class="row-fluid">




    <div class="span3">
        <div class="well sidebar-nav">
        <?php $this->widget('bootstrap.widgets.BootMenu', array(
        'type'=>'list',
        'items'=>$this->menu,
        'htmlOptions'=>array('class'=>'operations'),
    )); ?>
            </div>
    </div><!--/span-->
    <div class="span9">


        <?php echo $content; ?>

    </div><!--/span-->
</div><!--/row-->
<?php $this->endContent(); ?>