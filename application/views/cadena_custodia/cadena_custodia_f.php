<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <?php echo $titulo; ?>
    <small><?php echo $subTitulo; ?></small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $accion; ?></h3>
      <div class="box-tools pull-right">
        <a href="<?php echo url('/'.$return_url) ?>" class="btn btn-flat btn-default">
          <i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Regresar
        </a>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>
    </div>

    <?php echo form_open_multipart($postAction, [ 'class' => 'form-validate' ]); ?>
    <div class="box-body">
      <?php vHidden('id', $id); ?>
      <div class="row">
        <div class="col-xs-4">
          <?php vLabel('txtCliente','Cliente'); ?>
        </div>
        <div class="col-xs-4" >
          <?php vLabel('txtContacto','Contacto'); ?>
        </div>
        <div class="col-xs-4" >
          <?php vLabel('txtProyecto','Proyecto/Programa'); ?>
        </div>
      </div>
      <div class="row">
				<div class="col-xs-4">
          <?php vComboBoxLiveSearch('cbCliente', stdToArray($cliente_data), 'id', 'nombre_cliente',NULL,$cbCliente); ?>
      	</div>
        <div class="col-xs-4">
          <?php vComboBoxLiveSearch('cbCliente', stdToArray($cliente_data), 'id', 'nombre_cliente',NULL,$cbCliente); ?>
      	</div>
        <div class="col-xs-4">
          <?php vComboBoxLiveSearch('cbCliente', stdToArray($cliente_data), 'id', 'nombre_cliente',NULL,$cbCliente); ?>
      	</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-3">
          <?php vLabel('txtDireccion','Dirección'); ?>
        </div>
        <div class="col-xs-3" >
          <?php vLabel('txtDistrito','Distrito'); ?>
        </div>
        <div class="col-xs-3" >
          <?php vLabel('txtProvincia','Provincia'); ?>
        </div>
        <div class="col-xs-3" >
          <?php vLabel('txtDepartamento','Departamento'); ?>
        </div>
      </div>
      <div class="row">
				<div class="col-xs-3">
          <?php vTextBox('txtDireccion',$txtDireccion, 'Ingrese Dirección',null,null,null,null,false,"required"); ?>
      	</div>
        <div class="col-xs-3">
          <?php vTextBox('txtDistrito',$txtDistrito, 'Ingrese Distrito',null,null,null,null,false,"required"); ?>
      	</div>
        <div class="col-xs-3">
          <?php vTextBox('txtProvincia',$txtProvincia, 'Ingrese Provincia',null,null,null,null,false,"required",true); ?>
      	</div>
        <div class="col-xs-3">
          <?php vTextBox('txtDepartamento',$txtDepartamento, 'Ingrese Departamento',null,null,null,null,false,"required",true); ?>
      	</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-3">
          <?php vLabel('txtEmail','Email'); ?>
        </div>
        <div class="col-xs-3" >
          <?php vLabel('txtTelefono','Teléfono'); ?>
        </div>
        <div class="col-xs-3" >
          <?php vLabel('txtCelular','Celular'); ?>
        </div>
        <div class="col-xs-3" >
          <?php vLabel('txtFecha','Fecha'); ?>
        </div>
      </div>
      <div class="row">
				<div class="col-xs-3">
          <?php vTextBox('txtEmail',$txtEmail, 'Ingrese email',null,null,null,null,false,"required"); ?>
      	</div>
        <div class="col-xs-3">
          <?php vTextBox('txtTelefono',$txtTelefono, 'Ingrese Teléfono',null,null,null,null,false,"required"); ?>
      	</div>
        <div class="col-xs-3">
          <?php vTextBox('txtCelular',$txtCelular, 'Ingrese Celular',null,null,null,null,false,"required"); ?>
      	</div>
        <div class="col-xs-2">
          <?php vDateTimePicker('txtFecha',$txtFecha, null,null,true,true); ?>
      	</div>
      </div>
      <br>
      <div class="row">
        <div class="col-xs-1"><?php vLabel('txtCliente','Muestrado por:'); ?></div>
        <div class="col-xs-3"><?php vTextBox('txtMuestrador',$txtMuestrador, 'Ingrese nombre',null,null,null,null,false,"required"); ?></div>
        <div class="col-xs-1"><?php  vCheckBox('chkCliente','Cliente',$chkCliente, null,'1');?></div>
        <div class="col-xs-1"><?php  vCheckBox('chkIQS','IQS',$chkIQS, null,'1');?></div>
        
      </div>
      <!--div class="form-group">
        <?php vLabel('txtMuestrador','Monto'); ?>
        <?php vTextBox('txtMuestrador',$txtMuestrador, 'Ingrese monto',null,null,null,null,false,"required"); ?>
      </div-->

    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-flat btn-primary">Guardar</button>
    </div>
    <!-- /.box-footer-->
    <?php echo form_close(); ?>
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<script>
  $(document).ready(function() {
    $('.form-validate').validate();
    $('#txtFecha').datepicker({ format: 'dd/mm/yyyy' }).datepicker("setDate", new Date());
    $('#chkCliente').change(function () {
        if ($(this).prop('checked')) {
            $('#chkIQS').prop('checked', false);
        }
    });

    $('#chkIQS').change(function () {
        if ($(this).prop('checked')) {
            $('#chkCliente').prop('checked', false);
        }
    });
  })
</script>

<?php include viewPath('includes/footer'); ?>

<script>

</script>