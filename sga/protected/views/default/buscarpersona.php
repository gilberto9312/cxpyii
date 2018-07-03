<div class="form">

<h1><?php echo $para;?></h1>
<h4>Búsqueda de Persona</h4>

<hr/>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'buscarpersona-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'buscapersona'); ?>
		<?php echo $form->textField($model,'buscapersona'); ?>
		<button id='botonbuscar' value='buscar' type='button'>Buscar</button>
		<br/>
		<?php echo $form->dropDownList($model,'idpersona',array(''=>'--haga una busqueda--')); ?>
		<div id='logger'></div>
		<script>
			new Buscador('botonbuscar','logger'
				,"<?php echo Yii::app()->cyaui->getActionAjaxbuscarpersonas($model->key); ?>"
			);
		</script>
		<p class='hint'>Escriba parte del nombre de la persona para buscarla, luego presione el boton "buscar"
		y finalmente presione el boton Continuar.</p>
	</div>

	<div class="row buttons">
		<?php 
			$this->widget('bootstrap.widgets.BootButton'
				, array(
					'buttonType'=>'submit', 
					'type'=>'primary', 
					'icon'=>'ok white', 
					'label'=>'Continuar',
					'size'=>'small',
				)
			);
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->