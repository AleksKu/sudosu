<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID'); ?>
		<?php echo $form->textField($model,'ID',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CustomerID'); ?>
		<?php echo $form->textField($model,'CustomerID',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ReceivedAt'); ?>
		<?php echo $form->textField($model,'ReceivedAt'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DeviceReportedTime'); ?>
		<?php echo $form->textField($model,'DeviceReportedTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Facility'); ?>
		<?php echo $form->textField($model,'Facility'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Priority'); ?>
		<?php echo $form->textField($model,'Priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FromHost'); ?>
		<?php echo $form->textField($model,'FromHost',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Message'); ?>
		<?php echo $form->textArea($model,'Message',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NTSeverity'); ?>
		<?php echo $form->textField($model,'NTSeverity'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Importance'); ?>
		<?php echo $form->textField($model,'Importance'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventSource'); ?>
		<?php echo $form->textField($model,'EventSource',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventUser'); ?>
		<?php echo $form->textField($model,'EventUser',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventCategory'); ?>
		<?php echo $form->textField($model,'EventCategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventID'); ?>
		<?php echo $form->textField($model,'EventID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventBinaryData'); ?>
		<?php echo $form->textArea($model,'EventBinaryData',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaxAvailable'); ?>
		<?php echo $form->textField($model,'MaxAvailable'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CurrUsage'); ?>
		<?php echo $form->textField($model,'CurrUsage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MinUsage'); ?>
		<?php echo $form->textField($model,'MinUsage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MaxUsage'); ?>
		<?php echo $form->textField($model,'MaxUsage'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'InfoUnitID'); ?>
		<?php echo $form->textField($model,'InfoUnitID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SysLogTag'); ?>
		<?php echo $form->textField($model,'SysLogTag',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'EventLogType'); ?>
		<?php echo $form->textField($model,'EventLogType',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GenericFileName'); ?>
		<?php echo $form->textField($model,'GenericFileName',array('size'=>60,'maxlength'=>60)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SystemID'); ?>
		<?php echo $form->textField($model,'SystemID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->