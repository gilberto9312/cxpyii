<h1>Cargo Creado</h1>

<p>El cargo ha sido creado bajo el numero #<?php echo $id;?></p>

<ul class='listaopcioneslinks'>
	<li><?php echo Yii::app()->cyaui->getLinkConsultarCuenta($idpersona,$key);?></li>
	<li><?php echo Yii::app()->cyaui->getLinkCrearOtroCargo($idpersona,$key);?></li>
</ul>