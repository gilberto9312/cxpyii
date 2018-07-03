<?php 
	/**
		$cuenta:	datos de la cuenta en forma de array. campos documentados en:  
					icya_cuenta::cya_getobject
					
		$key:		la llave de configuracion
					
					
		[{"id":13,"idcargo":18,"idabono":22,"fechahora":"1344022538","monto":"5","adescr":"luz y agua segundo abono","cdescr":"luz"},{"id":14,"idcargo":19,"idabono":22,"fechahora":"1344022538","monto":"6","adescr":"luz y agua segundo abono","cdescr":"agua"},{"id":15,"idcargo":20,"idabono":22,"fechahora":"1344022538","monto":"0","adescr":"luz y agua segundo abono","cdescr":"telefono"}]
	
	*/
	$idpersona = $cuenta['idpersona'];
	$persona = Yii::app()->cyaApi->buscarPersona($key,$idpersona);
	
	$tmp1 = 'los cargos que han sido abonados';
	$tmp2 = 'Abono';
	$lista = Yii::app()->cyaApi->listarHistoriaAbono($key,$cuenta['id']);
	$modoAbono=true;
	if($cuenta['tipocuenta'] == Yii::app()->cyaApi->getParamCargo($key)){
		$tmp1 = "los abonos que se le han hecho";
		$tmp2 = "Cargo";
		$lista = Yii::app()->cyaApi->listarHistoriaCargo($key,$cuenta['id']);
		$modoAbono=false;
	}
	$dataProvider=new CArrayDataProvider($lista, array(
		'id'=>'id',
		'sort'=>array(
			'attributes'=>array(
				 'id', 'monto',
			),
		),
		'pagination'=>array(
			'pageSize'=>10,
		),
	));
?>
<h1>Auditando <?php echo $tmp2; ?></h1>

<p class='hint'>Aqui se pueden ver tanto los datos propios de la cuenta como <?php echo $tmp1; ?>.</p>

<ul class='listaopcioneslinks'>
	<li><?php echo Yii::app()->cyaui->getLinkConsultarCuenta($idpersona,$key);?></li>
</ul>

<div class='well' style='overflow: auto;'>
	<div style='margin-bottom: 10px;'>
	<?php 
		$this->widget('bootstrap.widgets.BootLabel', array(
			'type'=>'important', // '', 'success', 'warning', 'important', 'info' or 'inverse'
			'label'=>$persona['label'],
		));
		echo "&nbsp;&nbsp;&nbsp;";
		$this->widget('bootstrap.widgets.BootLabel', array(
			'type'=>'info', // '', 'success', 'warning', 'important', 'info' or 'inverse'
			'label'=>$persona['extra'],
		));
	?>
	</div>
	<ul class='ulaudit'>
		<li>MVTO # <b><?php echo $cuenta['id'];?></b></li>
		<li>fecha: <b><?php echo Yii::app()->format->formatDateTime($cuenta['fecha']);?></b></li>
		<li>tipo: <b><?php echo $cuenta['tipocuentatxt'];?></b></li>
		<?php if($modoAbono == false) { ?>
			<li>estatus: <b><?php echo $cuenta['estatustxt'];?></b></li>
		<?php } ?>
	</ul>
	<ul class='ulaudit'>
		<li>concepto: <b><?php echo $cuenta['concepto'];?></b></li>
		<li>monto: <b><?php echo Yii::app()->format->formatMoney($cuenta['monto']);?></b></li>
		<?php if($modoAbono == false) { ?>
			<li>abonado: <b><?php echo Yii::app()->format->formatMoney($cuenta['montoabonado']);?></b></li>
			<li>pendiente: <b><?php echo Yii::app()->format->formatMoney($cuenta['montopendiente']);?></b></li>
		<?php } ?>
	</ul>
</div>

<div class='well' style='overflow: auto;'>
	<?php 
		if($modoAbono == true){
			$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'grid-aud',
			'dataProvider'=>$dataProvider,
			'columns'=>array(
				array('name'=>'idcargo', 'header'=>'#Cargo'
					,'type'=>'number'
					,'htmlOptions'=>array('style'=>'width: 100px;')),
				array('name'=>'monto', 'header'=>'Monto Abonado'
					,'type'=>'money'
					,'htmlOptions'=>array('style'=>'width: 100px;text-align: right;')),
				array('name'=>'adata', 'header'=>'Concepto del Cargo'
					,'type'=>'raw'
					,'value'=>'unserialize($data[\'cdata\'])->concepto'
				),
			),
			)); 
		}else{
			$this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'grid-aud',
			'dataProvider'=>$dataProvider,
			'columns'=>array(
				array('name'=>'idabono', 'header'=>'#Abono'
					,'type'=>'number'
					,'htmlOptions'=>array('style'=>'width: 100px;')),
				array('name'=>'monto', 'header'=>'Monto Abonado'
					,'type'=>'money'
					,'htmlOptions'=>array('style'=>'width: 100px;text-align: right;')),
				array('name'=>'adata', 'header'=>'Concepto del Abono'
					,'type'=>'raw'
					,'value'=>'unserialize($data[\'adata\'])->concepto'
					),
				array('header'=>'Tipo Pago'
					,'type'=>'raw'
					,'value'=>'Yii::app()->cyaApi->getTipoDoc(unserialize($data[\'adata\'])->doctipo)'
					),
				array('header'=>'#Documento'
					,'type'=>'raw'
					,'value'=>'unserialize($data[\'adata\'])->docnum'
					),
				array('header'=>'Entidad'
					,'type'=>'raw'
					,'value'=>'unserialize($data[\'adata\'])->docentidad'
					),
			),
			)); 
		}
	?>
</div>