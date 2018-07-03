<?php
/* @var $this ArticuloController */
/* @var $model Articulo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Campos Con <span class="required">*</span> Son Requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'codigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>50, 'maxlength'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'imagen'); ?>
		<?php echo $form->textField($model,'imagen',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'imagen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'uso interno'); ?>
    <?php echo $form->dropDownList($model, 'uso_interno', array('1'=>'SI', '0'=>'NO')); ?>
		<?php echo $form->error($model,'uso_interno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idcategoria'); ?>
		<?php 
 $catCategoria = new CDbCriteria;
 // Preparamos los parámetros de búsqueda
 $catCategoria->order = 'idcategoria ASC';
 // ordenamos alfabéticamente
 echo $form->dropDownList($model,'idcategoria',
 // id es el nombre del campo en el modelo
 CHtml::listData(Categoria::model()->findAll($catCategoria),
 // Cosecha es el modelo en el que se buscaran los datos
 'idcategoria','nombre'));
 // id es el dato que se quiere guardar y
 // nombre lo que se quiere mostrar
     ?>
		<?php echo $form->error($model,'idcategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idpresentacion'); ?>
		<?php 
 $catPresentacion = new CDbCriteria;
 // Preparamos los parámetros de búsqueda
 $catPresentacion->order = 'idpresentacion ASC';
 // ordenamos alfabéticamente
 echo $form->dropDownList($model,'idpresentacion',
 // id es el nombre del campo en el modelo
 CHtml::listData(Presentacion::model()->findAll($catPresentacion),
 // Cosecha es el modelo en el que se buscaran los datos
 'idpresentacion','nombre'));
 // id es el dato que se quiere guardar y
 // nombre lo que se quiere mostrar
     ?>
		<?php echo $form->error($model,'idpresentacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_impuesto'); ?>
 <?php 
 $catImp = new CDbCriteria;
 // Preparamos los parámetros de búsqueda
 $catImp->order = 'cod_impuesto ASC';
 // ordenamos alfabéticamente
 echo $form->dropDownList($model,'cod_impuesto',
 // id es el nombre del campo en el modelo
 CHtml::listData(Impuesto::model()->findAll($catImp),
 // Cosecha es el modelo en el que se buscaran los datos
 'cod_impuesto','nombre_impuesto'));
 // id es el dato que se quiere guardar y
 // nombre lo que se quiere mostrar
     ?>
		<?php echo $form->error($model,'cod_impuesto'); ?>
	</div>

	<div class="row buttons">
				<?php 

        $this->widget('zii.widgets.jui.CJuiButton', array(
        'buttonType'=>'submit',
        'name'=>'bntGuardar',
        'value'=>'1',
        'caption'=>'Guardar',
        'htmlOptions'=>array('class'=>'ui-button-primary')
    ));
        ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->