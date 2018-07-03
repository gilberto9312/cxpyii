<?php
/* @var $this TipoContribuyenteController */
/* @var $model TipoContribuyente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>



	<div class="simple">
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>30,'maxlength'=>50)); ?>
	</div>

	<div class="simple">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>30,'maxlength'=>50)); ?>
	</div>

	<div class="simple buttons">
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