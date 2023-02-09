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
      <h3 class="box-title"><?php echo $tablaTitulo; ?></h3>

      <div class="box-tools pull-right">
        <?php 
        if (hasPermissions('obra_add'))
          vButton('btnNuevo', 'Nuevo', "cadena_custodia/nuevo", "fa fa-plus", "btn btn-primary");
        ?>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>

    </div>
    <div class="box-body">

      <?php
        $Actions = array();
          if (hasPermissions('obra_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("obra/edit"),"id"));
          if (hasPermissions('obra_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("obra/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Nombre", "nombreData"=>"o_nombre")),
          new modelFieldItem(array("nombre"=>"Monto", "nombreData"=>"o_monto","hAlign"=>"right")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($obra), 0, 'tlbListado');
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<?php include viewPath('includes/footer'); ?>

<script>
  $('table').DataTable({"autoWidth": false});
</script>