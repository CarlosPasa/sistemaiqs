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
        <!--button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button-->
      </div>
    </div>

    <?php echo form_open_multipart($postAction, [ 'class' => 'form-validate' ]); ?>
    <div class="box-body">
      <?php vHidden('id', $id); ?>
      <div class="form-group">
        <?php vLabel('txtName','Nombre'); ?>
        <?php vTextBox('txtName',$txtName, 'Ingrese nombre',null,null,null,null,false,"required"); ?>
      </div>
      <div class="form-group">
        <?php vLabel('txtTitulo','Titulo'); ?>
        <?php vTextBox('txtTitulo',$txtTitulo, 'Ingrese titulo de menu',null,null,null,null,false,"required"); ?>
      </div>
      <div class="form-group">
        <?php vLabel('txtIcon','Icono'); ?>
        <?php vTextBox('txtIcon',$txtIcon, 'Ingrese icono',null,null,null,null,false,"required"); ?>
      </div>
      <div class="form-group">
        <?php vLabel('txtTypeObject','Tipo Objeto'); ?>
        <?php vComboBoxLiveSearch('txtTypeObject', stdToArray($data_tipo_objeto), 'id', 'tipo',NULL,$txtTypeObject,true); ?>
        <!--?php vTextBox('txtTypeObject',$txtTypeObject, 'Ingrese tipo objeto',null,null,null,null,false,"required"); ?-->
      </div>
      <div class="form-group">
        <?php vLabel('txtObject','Objeto'); ?>
        <?php vTextBox('txtObject',$txtObject, 'Ingrese objeto',null,null,null,null,false,""); ?>
      </div>
      <div class="form-group">
        <?php vLabel('txtOrder','Order'); ?>
        <?php vTextBox('txtOrder',$txtOrder, 'Ingrese orden',null,null,null,null,false,"required"); ?>
      </div>
      <div class="form-group">
        <?php vLabel('txtMenuPadreID','Menu Padre ID'); ?>
        <?php vComboBoxLiveSearch('txtMenuPadreID', stdToArray($data_padres), 'id', 'title',NULL,$txtMenuPadreID,true); ?>
        <!--?php vTextBox('txtMenuPadreID',$txtMenuPadreID, 'Ingrese ID Menu Padre',null,null,null,null,false,"required"); ?-->
      </div>

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
  })
</script>

<?php include viewPath('includes/footer'); ?>

<script>

</script>