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
        if (hasPermissions('factura_add'))
          vButtonDefault("btnFacturaNuevo", "Nuevo", "", "fa fa-plus", "btn btn-primary", "onFactura_nuevo()","", false);
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
          if (hasPermissions('factura_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("factura/edit"),"id"));
          if (hasPermissions('factura_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("factura/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Serie", "nombreData"=>"serie")),
          new modelFieldItem(array("nombre"=>"Correlativo", "nombreData"=>"correlativo")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($facturas), 0, 'tlbListado');
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<div id="divFactura"></div>

<?php include viewPath('includes/footer'); ?>

<script>
  $('table').DataTable({"autoWidth": false});
</script>

<!-- Factura: Modal -->
<script type="text/javascript">
  function onFactura_nuevo() {
    $url = '<?php echo site_url('factura/nuevoModal') ?>';
    $titulo = "Agregar Factura";
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "idFactura": 0 },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divFactura').html(html);
        $('#modal_factura').modal('show');
        $('#modal_factura .modal-title').text($titulo);
      }
    });
  }

  function onFactura_close() {
    $('#modal_factura').modal('hide');
  }
</script>