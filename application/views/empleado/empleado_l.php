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
        if (hasPermissions('empleado_add'))
          vButtonDefault("btnEmpleadoNuevo", "Nuevo", "", "fa fa-plus", "btn btn-primary", "onEmpleado_nuevo()","", false);
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
          if (hasPermissions('empleado_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("empleado/edit"),"id"));
          if (hasPermissions('empleado_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("empleado/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Nombre del empleado", "nombreData"=>"nombre_empleado")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($empleados), 0, 'tlbListado');
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<div id="divEmpleado"></div>

<?php include viewPath('includes/footer'); ?>

<script>
  $('table').DataTable({"autoWidth": false});
</script>

<!-- Empleado: Modal -->
<script type="text/javascript">
  function onEmpleado_nuevo() {
    $url = '<?php echo site_url('empleado/nuevoModal') ?>';
    $titulo = "Agregar Empleado";
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "idEmpleado": 0 },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divEmpleado').html(html);
        $('#modal_empleado').modal('show');
        $('#modal_empleado .modal-title').text($titulo);
      }
    });
  }

  function onEmpleado_close() {
    $('#modal_empleado').modal('hide');
  }
</script>