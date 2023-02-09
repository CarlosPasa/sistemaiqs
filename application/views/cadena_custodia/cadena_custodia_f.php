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
      <div class="form-group">
        <?php vLabel('txtNombre','Nombre'); ?>
        <?php vTextBox('txtNombre',$txtNombre, 'Ingrese nombre',null,null,null,null,false,"required"); ?>
      </div>
      <div class="form-group">
        <?php vLabel('txtMonto','Monto'); ?>
        <?php vTextBox('txtMonto',$txtMonto, 'Ingrese monto',null,null,null,null,false,"required"); ?>
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