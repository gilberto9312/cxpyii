<script language="javascript">
window.opener.document.getElementById('my_publisher_input').value = <?php echo $model->id; //the new id ?>
window.close();
</script>


_form

<?php
/* @var $this CitaController */
/* @var $model Cita */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'cita-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note" align="center">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>

    <table>
        <tr>
            <td> <?php echo $form->labelEx($model, 'rut_paciente'); ?></td>
            <td><?php echo $form->textField($model, 'rut_paciente', array('size' => 20, 'maxlength' => 20, 'id' => 'rut_paciente')); ?><?php echo $form->error($model, 'rut_paciente'); ?></td>
            <td><?php echo CHtml::link("Buscar Paciente", '', array('onclick' => '$("#BuscarPaciente").dialog("open");  return false')); ?>
                <?php //echo CHtml::link("Buscar Paciente",'', array('onclick'=> 'document.getElementById("pacientes").style.display = "block";')); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'paciente'); ?></td>
            <td><?php echo $form->textField($model, 'paciente', array('size' => 20, 'maxlength' => 20, 'id' => 'paciente', 'value' => 'No se encuentra al paciente', 'readOnly' => true)); ?><?php echo $form->error($model, 'paciente'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'apellidos'); ?></td>
            <td><?php echo $form->textField($model, 'apellidos', array('size' => 30, 'maxlength' => 30, 'id' => 'apellidos', 'readOnly' => true, 'value' => 'No se encuentra al paciente')); ?><?php echo $form->error($model, 'apellidos'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'direccion'); ?></td>
            <td><?php echo $form->textField($model, 'direccion', array('size' => 30, 'maxlength' => 30, 'id' => 'direccion', 'readOnly' => true, 'value' => 'No se encuentra al paciente')); ?><?php echo $form->error($model, 'direccion'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'ciudad'); ?></td>
            <td><?php echo $form->textField($model, 'ciudad', array('size' => 20, 'maxlength' => 20, 'id' => 'ciudad', 'readOnly' => true, 'value' => 'No se encuentra al paciente')); ?><?php echo $form->error($model, 'ciudad'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'telefono'); ?></td>
            <td><?php echo $form->textField($model, 'telefono', array('size' => 20, 'maxlength' => 20, 'id' => 'telefono', 'readOnly' => true, 'value' => 'No se encuentra al paciente')); ?><?php echo $form->error($model, 'telefono'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'fecha'); ?></td>
            <td><?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'attribute' => "fecha",
                    'model' => $model,
                    'language' => 'es',
                    'value' => $model->fecha,
                    'language' => 'es',
                    'options' => array(
                        'autoSize' => true,
                        'buttonImageOnly' => true,
                        'dateFormat' => 'yy-mm-dd',
                        'showButtonPanel' => true,
                        'changeMonth' => true,
                        'changeYear' => true,
                        'minDate' => '1',
                        'showOtherMonths' => true,
                        'changeMonth' => 'true',
                        'changeYear' => 'true',
                        'yearRange' => '-80',
                    ),
                ))
                ?><?php echo $form->error($model, 'fecha'); ?></td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model, 'hora'); ?></td>
            <td><?php echo $form->dropDownList($model, 'hora', $model->getMenuHoras()); ?><?php echo $form->error($model, 'hora'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td><?php echo TbHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <script>
            $('#rut_paciente').on('keyup', function() {
                $.ajax({
                    url: <?php echo "'" . CController::createUrl('cita/ExistePaciente') . "'"; ?>,
                    data: {'rut_paciente': $('#rut_paciente').val()},
                    type: "post",
                    success: function(data) {
                        if (data == 0) {
                            paciente.value = "No se encuentra al paciente";
                            paciente.disabled = true;
                            apellidos.value = "No se encuentra al paciente";
                            apellidos.disabled = true;
                            ciudad.value = "No se encuentra al paciente";
                            ciudad.disabled = true;
                            direccion.value = "No se encuentra al paciente";
                            direccion.disabled = true;
                            telefono.value = "No se encuentra al paciente";
                            telefono.disabled = true;
                        } else {
                            var retrievedJSON = data;
                            var array = JSON.parse(retrievedJSON);
                            paciente.value = array[0].nombre_paciente;
                            paciente.disabled = true;
                            apellidos.value = array[0].apellidos_paciente;
                            apellidos.disabled = true;
                            ciudad.value = array[0].ciudad_paciente;
                            ciudad.disabled = true;
                            direccion.value = array[0].direccion_paciente;
                            direccion.disabled = true;
                            telefono.value = array[0].telefono_paciente;
                            telefono.disabled = true;
                        }
                    }
                });
            });
        </script>

       

    </table>

<?php $this->endWidget(); ?>

</div><!-- form -->


<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'BuscarPaciente',
    'options' => array(
        'modal' => true,
        'autoOpen' => false,
        'show' => array(
            'effect' => 'blind',
            'duration' => 500,),
        'resizable' => false,
        'width' => 900,
    ),
));
//if($comprueba != "si"){
echo $this->renderPartial('pacientes', array(
    'modelPaciente' => $modelP
));
//}
$this->endWidget('zii.widgets.jui.CJuiDialog');

?>




//modal

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
    'id' => 'paciente-grid',
    'selectableRows' => 1,
    'selectionChanged' => 'obtenerSeleccion',
    'dataProvider' => $modelPaciente->search(),
    'filter' => $modelPaciente,
    'columns' => array(
        'rut_paciente',
        'nombre_paciente',
        'apellidos_paciente',
        'direccion_paciente',
        'ciudad_paciente',
        'telefono_paciente',
        array(
            'class' => 'CButtonColumn',
            'template' => '{select}', // botones a mostrar
            'buttons' => array(
                'select' => array(
                    'label' => 'Seleccionar',
                    'click' => 'js:obtenerSeleccion',
                ),
            ),
        ),
    ),
));
?>
<script>
    function obtenerSeleccion() {
        var pacienteRut = $.fn.yiiGridView.getSelection('paciente-grid');
        rut_paciente.value = pacienteRut;
        $.ajax({
            url: <?php echo "'" . CController::createUrl('cita/ExistePaciente') . "'"; ?>,
            data: {'rut_paciente': $('#rut_paciente').val()},
            type: "post",
            success: function(data) {
                if (data == 0) {
                    paciente.value = "No se encuentra al paciente";
                    paciente.disabled = true;
                    apellidos.value = "No se encuentra al paciente";
                    apellidos.disabled = true;
                    ciudad.value = "No se encuentra al paciente";
                    ciudad.disabled = true;
                    direccion.value = "No se encuentra al paciente";
                    direccion.disabled = true;
                    telefono.value = "No se encuentra al paciente";
                    telefono.disabled = true;
                } else {
                    var retrievedJSON = data;
                    var array = JSON.parse(retrievedJSON);
                    paciente.value = array[0].nombre_paciente;
                    paciente.disabled = true;
                    apellidos.value = array[0].apellidos_paciente;
                    apellidos.disabled = true;
                    ciudad.value = array[0].ciudad_paciente;
                    ciudad.disabled = true;
                    direccion.value = array[0].direccion_paciente;
                    direccion.disabled = true;
                    telefono.value = array[0].telefono_paciente;
                    telefono.disabled = true;
                }
            }
        });
    }
</script>



models


public function actionCreate() {
        $model = new Cita;
        $modelPaciente = new Paciente;
        $comprueba = "no";
        if (isset($_GET['Paciente'])) {
            $comprueba = "si";
            $modelPaciente->attributes = $_GET['Paciente'];
        }
}


otro controller

<?php
class CitaController extends Controller {
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('solicitud', 'citaReservada'),
                'users' => array('*'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view'),
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete', 'existePaciente', 'agenda', 'calendar'),
                'users' => array('Dentista', 'Asistente'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Cita;
        if (isset($_POST['Cita'])) {
            $model->attributes = $_POST['Cita'];
            $id_dia = $this->diaSemana($model->fecha);
            $modelBloque = Bloque::model()->findByAttributes(array('id_dia' => $id_dia, 'inicio' => $model->hora));
            $modelCita = Cita::model()->findByAttributes(array('fecha' => $model->fecha, 'id_bloque' => $modelBloque->id_bloque, 'estado_cita' => 'Confirmada'));
            $modelBloqueBloqueado = false;
            if ($id_dia != 0) {
                $modelBloqueBloqueado = BloqueNoDisponible::model()->findByAttributes(array('id_bloque' => $modelBloque->id_bloque, 'fecha' => $model->fecha));
            }
            $paciente = Paciente::model()->findByPk($model->rut_paciente);
            $modelDiaBloqueado = DiaNoDisponible::model()->findByAttributes(array('id_dia' => $id_dia, 'fecha' => $model->fecha));
            if ($paciente && $id_dia != 0 && !$modelDiaBloqueado && $modelBloque->estado == "Disponible" && !$modelBloqueBloqueado && !$modelCita && !$model->fecha == "") {
                $model->id_bloque = $modelBloque->id_bloque;
                $model->estado_cita = "Confirmada";
                if ($model->save()) {
                    ini_set('max_execution_time', 300);
                    
                }
            } else {
                if ($id_dia == 0) {
                    $model->addError('fecha', 'Los días domingo no están disponibles');
                }
                if (!$paciente) {
                    $model->addError('rut_paciente', 'El paciente no se encuentra registrado');
                }
                if ($modelBloqueBloqueado) {
                    $model->addError('hora', 'El bloque seleccionado no se encuentra disponible');
                }
                if ($modelBloque) {
                    if ($modelBloque->estado != "Disponible") {
                        $model->addError('hora', 'El bloque seleccionado no se encuentra disponible');
                    }
                }
                if ($modelDiaBloqueado) {
                    $model->addError('fecha', 'El día seleccionado no se encuentra disponible');
                }
                if ($modelCita) {
                    $model->addError('fecha', 'Ya existe una cita confirmada en este horario y fecha');
                }
                if ($model->fecha == "") {
                    $model->addError('fecha', 'La fecha es obligatoria');
                }
                $this->render('create', array('model' => $model));
            }
        } else {
            $this->render('create', array(
                'model' => $model,
            ));
        }
    }
    public function diaSemana($fecha) {
        $ano = substr($fecha, -10, 4);
        $mes = substr($fecha, -5, 2);
        $dia = substr($fecha, -2, 2);
        $valor = date("w", mktime(0, 0, 0, $mes, $dia, $ano));
        return $valor;
    }
    public function actionSolicitud() {
        $solicitud = new SolicitudCita();
        $model = new Cita();
        if (isset($_POST['SolicitudCita'])) {
            $solicitud->attributes = $_POST['SolicitudCita'];
            if ($solicitud->fecha != "") {
                $id_dia = $this->diaSemana($solicitud->fecha);
                $modelDia = Dia::model()->findByPk($id_dia);
                $modelDiaBloqueado = DiaNoDisponible::model()->findByAttributes(array('id_dia' => $id_dia, 'fecha' => $solicitud->fecha));
                if ($modelDia->estado_dia == "Activo" && !$modelDiaBloqueado && $id_dia != 0) {
                    $this->redirect(array('CitaReservada', 'fecha' => $solicitud->fecha));
                } else {
                    if ($id_dia == 0) {
                        $solicitud->addError('fecha', 'Los días domingo no se realizan atenciones');
                        $this->render('solicitudCita', array('model' => $solicitud));
                    } else {
                        $solicitud->addError('fecha', 'La fecha seleccionada no se encuentra disponible para atención');
                        $this->render('solicitudCita', array('model' => $solicitud));
                    }
                }
            } else {
                $solicitud->addError('fecha', 'La fecha es obligatoria');
                $this->render('solicitudCita', array('model' => $solicitud));
            }
        } else {
            $this->render('solicitudCita', array('model' => $solicitud));
        }
    }
    public function actionCitaReservada($fecha) {
        $model = new Cita();
        $model->fecha = $fecha;
        if (isset($_POST['Cita'])) {
            $model->attributes = $_POST['Cita'];
            $id_dia = $this->diaSemana($fecha);
            $modelBloque = Bloque::model()->findByAttributes(array('id_dia' => $id_dia, 'inicio' => $model->hora));
            $model->estado_cita = "Reservada";
            $model->id_bloque = $modelBloque->id_bloque;
            if ($model->save()) {
                $this->redirect(array('site/index'));
            } else {
                $this->render('bloquesDisponibles', array('fecha' => $fecha, 'model' => $model));
            }
        } else {
            $this->render('bloquesDisponibles', array('fecha' => $fecha, 'model' => $model));
        }
    }
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $paciente = Paciente::model()->findByPk($model->rut_paciente);
        $model->paciente = $paciente->nombre_paciente;
        $model->apellidos = $paciente->apellidos_paciente;
        $model->direccion = $paciente->direccion_paciente;
        $model->telefono = $paciente->telefono_paciente;
        $model->ciudad = $paciente->ciudad_paciente;
        $modelBloque = Bloque::model()->findByPk($model->id_bloque);
        $model->hora = $modelBloque->inicio;
        if (isset($_POST['Cita'])) {
            $model->attributes = $_POST['Cita'];
            $id_dia = $this->diaSemana($model->fecha);
            $modelBloque = Bloque::model()->findByAttributes(array('id_dia' => $id_dia, 'inicio' => $model->hora));
            $model->id_bloque = $modelBloque->id_bloque;
            $modelCita = Cita::model()->findByAttributes(array('fecha' => $model->fecha, 'id_bloque' => $model->id_bloque, 'estado_cita' => 'Confirmada'));
            if (!$modelCita || $modelCita->id_cita == $model->id_cita) {
                if ($model->save())
                    $this->redirect(array('admin'));
            }else {
                echo $model->hora;
                $model->addError('fecha', 'Ya existe una cita confirmada en este horario y fecha');
                $this->render('update', array(
                    'model' => $model,
                ));
            }
        } else {
            $this->render('update', array(
                'model' => $model,
            ));
        }
    }
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }
    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Cita');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cita('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Cita']))
            $model->attributes = $_GET['Cita'];
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cita the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cita::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }
    /**
     * Performs the AJAX validation.
     * @param Cita $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cita-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
    public function actionAgenda() {
        $this->render('agenda');
    }
    public function actionExistePaciente() {
        if ($_POST['rut_paciente']) {
            $rut_paciente = $_POST['rut_paciente'];
            $datos = Yii::app()->db->createCommand("SELECT nombre_paciente , apellidos_paciente , ciudad_paciente , telefono_paciente , direccion_paciente FROM PACIENTE WHERE rut_paciente = " . "'" . $rut_paciente . "'")->queryAll();
            echo(($datos) ? json_encode($datos) : '');
        }
    }
    public function actionCalendar() {
        $items = array();
        $model = Cita::model()->findAll();
        foreach ($model as $value) {
            if ($value->estado_cita == "Confirmada") {
                $color = '#005FFF';
            } else {
                $color = '#FF0000';
            }
            $paciente = Paciente::model()->findByPk($value->rut_paciente);
            $bloque = Bloque::model()->findByPk($value->id_bloque);
            $items[] = array(
                'id' => $value->id_cita,
                'title' => $paciente->nombre_paciente . " " . $paciente->apellidos_paciente,
                'start' => $value->fecha . " " . $bloque->inicio,
                'end' => $value->fecha . " " . $bloque->fin,
                'color' => $color,
                'allDay' => false,
                'editable' => false,
                'url' => $this->createUrl('cita/update', array('id' => $value->id_cita)),
            );
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }
}

