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
        if (hasPermissions('proyecto_add'))
          vButtonDefault("btnProyectoNuevo", "Nuevo", "", "fa fa-plus", "btn btn-primary", "onProyecto_nuevo()","", false);
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
          if (hasPermissions('proyecto_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("proyecto/edit"),"id"));
          if (hasPermissions('proyecto_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("proyecto/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Nombre del proyecto", "nombreData"=>"nombre_proyecto")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($proyectos), 0, 'tlbListado');
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<div id="divProyecto"></div>

<?php include viewPath('includes/footer'); ?>

<script>
  $('table').DataTable({"autoWidth": false});
</script>

<!-- Proyecto: Modal -->
<script type="text/javascript">
  function onProyecto_nuevo() {
    $url = '<?php echo site_url('proyecto/nuevoModal') ?>';
    $titulo = "Agregar Proyecto";
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "idProyecto": 0 },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divProyecto').html(html);
        $('#modal_proyecto').modal('show');
        $('#modal_proyecto .modal-title').text($titulo);
      }
    });
  }

  function onProyecto_close() {
    $('#modal_proyecto').modal('hide');
  }
</script>