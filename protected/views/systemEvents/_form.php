<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'system-events-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CustomerID'); ?>
		<?php echo $form->textField($model,'CustomerID',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'CustomerID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ReceivedAt'); ?>
		<?php echo $form->textField($model,'ReceivedAt'); ?>
		<?php echo $form->error($model,'ReceivedAt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DeviceReportedTime'); ?>
		<?php echo $form->textField($model,'DeviceReportedTime'); ?>
		<?php echo $form->error($model,'DeviceReportedTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Facility'); ?>
		<?php echo $form->textField($model,'Facility'); ?>
		<?php echo $form->error($model,'Facility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Priority'); ?>
		<?php echo $form->textField($model,'Priority'); ?>
		<?php echo $form->error($model,'Priority'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FromHost'); ?>
		<?php echo $form->textField($model,'FromHost',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'FromHost'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Message'); ?>
		<?php echo $form->textArea($model,'Message',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'Message'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NTSeverity'); ?>
		<?php echo $form->textField($model,'NTSeverity'); ?>
		<?php echo $form->error($model,'NTSeverity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Importance'); ?>
		<?php echo $form->textField($model,'Importance'); ?>
		<?php echo $form->error($model,'Importance'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventSource'); ?>
		<?php echo $form->textField($model,'EventSource',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'EventSource'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventUser'); ?>
		<?php echo $form->textField($model,'EventUser',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'EventUser'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventCategory'); ?>
		<?php echo $form->textField($model,'EventCategory'); ?>
		<?php echo $form->error($model,'EventCategory'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventID'); ?>
		<?php echo $form->textField($model,'EventID'); ?>
		<?php echo $form->error($model,'EventID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventBinaryData'); ?>
		<?php echo $form->textArea($model,'EventBinaryData',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'EventBinaryData'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MaxAvailable'); ?>
		<?php echo $form->textField($model,'MaxAvailable'); ?>
		<?php echo $form->error($model,'MaxAvailable'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CurrUsage'); ?>
		<?php echo $form->textField($model,'CurrUsage'); ?>
		<?php echo $form->error($model,'CurrUsage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MinUsage'); ?>
		<?php echo $form->textField($model,'MinUsage'); ?>
		<?php echo $form->error($model,'MinUsage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MaxUsage'); ?>
		<?php echo $form->textField($model,'MaxUsage'); ?>
		<?php echo $form->error($model,'MaxUsage'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'InfoUnitID'); ?>
		<?php echo $form->textField($model,'InfoUnitID'); ?>
		<?php echo $form->error($model,'InfoUnitID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SysLogTag'); ?>
		<?php echo $form->textField($model,'SysLogTag',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'SysLogTag'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EventLogType'); ?>
		<?php echo $form->textField($model,'EventLogType',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'EventLogType'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'GenericFileName'); ?>
		<?php echo $form->textField($model,'GenericFileName',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'GenericFileName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SystemID'); ?>
		<?php echo $form->textField($model,'SystemID'); ?>
		<?php echo $form->error($model,'SystemID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->