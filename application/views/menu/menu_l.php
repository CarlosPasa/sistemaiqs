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
        if (hasPermissions('menu_add'))
          vButton('btnNuevo', 'Nuevo', "menu/nuevo", "fa fa-plus", "btn btn-primary"); 
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
          if (hasPermissions('menu_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("menu/edit"),"id"));
          if (hasPermissions('menu_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("menu/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Name", "nombreData"=>"name")),
          new modelFieldItem(array("nombre"=>"Icon", "nombreData"=>"icon")),
          new modelFieldItem(array("nombre"=>"TypeObject", "nombreData"=>"type_object")),
          new modelFieldItem(array("nombre"=>"Object", "nombreData"=>"object")),
          new modelFieldItem(array("nombre"=>"Order", "nombreData"=>"order")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($menus), 0, 'tlbListado');
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