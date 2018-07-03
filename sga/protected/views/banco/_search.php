<?php
/* @var $this BancoController */
/* @var $model Banco */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="simple">
		<?php echo $form->label($model,'num_banco'); ?>
		<?php echo $form->textField($model,'num_banco'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'banco'); ?>
		<?php echo $form->textField($model,'banco',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'num_cheque'); ?>
		<?php echo $form->textField($model,'num_cheque'); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'saldo'); ?>
		<?php echo $form->textField($model,'saldo'); ?>
	</div>

	<div class="row buttons">
	<?php 

        $this->widget('zii.widgets.jui.CJuiButton', array(
        'buttonType'=>'submit',
        'name'=>'btnBuscar',
        'value'=>'1',
        'caption'=>'Buscar',
        'htmlOptions'=>array('class'=>'ui-button-primary')
    ));
        ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->