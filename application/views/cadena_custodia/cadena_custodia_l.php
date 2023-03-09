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
        if (hasPermissions('cadena_custodia_add'))
          vButton('btnNuevo', 'Nuevo', "cadena_custodia/nuevo", "fa fa-plus", "btn btn-primary");
        ?>
        <!--button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button-->
      </div>

    </div>
    <div class="box-body">

      <?php
        $Actions = array();
          if (hasPermissions('cadena_custodia_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("cadena_custodia/edit"),"id"));
          if (hasPermissions('cadena_custodia_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("cadena_custodia/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Cliente", "nombreData"=>"cliente")),
          new modelFieldItem(array("nombre"=>"Empleado", "nombreData"=>"proyecto")),
          new modelFieldItem(array("nombre"=>"Fecha", "nombreData"=>"fecha")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($cadena), 0, 'tlbListado');
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<?php include viewPath('includes/footer'); ?>

<script>
  $('table').DataTable({"order": [[1, "desc"]],"autoWidth": false});
</script>