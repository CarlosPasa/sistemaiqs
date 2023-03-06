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
        if (hasPermissions('muestra_add'))
          vButtonDefault("btnMuestraNuevo", "Nuevo", "", "fa fa-plus", "btn btn-primary", "onMuestra_nuevo()","", false);
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
          if (hasPermissions('muestra_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("muestra/edit"),"id"));
          if (hasPermissions('muestra_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("muestra/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Codigo de Campo/Puntos de Muestreo", "nombreData"=>"codigo_campo","hAlign"=>"center")),
          new modelFieldItem(array("nombre"=>"Locación/Ubicación", "nombreData"=>"ubicacion","hAlign"=>"center")),
          new modelFieldItem(array("nombre"=>"CP", "nombreData"=>"contenedor_p","hAlign"=>"right","ancho"=>"30px")),
          new modelFieldItem(array("nombre"=>"CV", "nombreData"=>"contenedor_v","hAlign"=>"right","ancho"=>"30px")),
          new modelFieldItem(array("nombre"=>"C Otros", "nombreData"=>"contenedor_otros","hAlign"=>"right","ancho"=>"30px")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($muestras), 0, 'tlbListado');
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<div id="divMuestra"></div>

<?php include viewPath('includes/footer'); ?>

<script>
  $('table').DataTable({"autoWidth": false});
</script>

<!-- Muestra: Modal -->
<script type="text/javascript">
  function onMuestra_nuevo() {
    $url = '<?php echo site_url('muestra/nuevoModal') ?>';
    $titulo = "Agregar Muestra";
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "idMuestra": 0 },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divMuestra').html(html);
        $('#modal_muestra').modal('show');
        $('#modal_muestra .modal-title').text($titulo);
      }
    });
  }

  function onMuestra_close() {
    $('#modal_muestra').modal('hide');
  }
</script>