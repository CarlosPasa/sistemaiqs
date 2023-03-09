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
        if (hasPermissions('cliente_add'))
          vButtonDefault("btnClienteNuevo", "Nuevo", "", "fa fa-plus", "btn btn-primary", "onCliente_nuevo()","", false);
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
          if (hasPermissions('cliente_edit')) array_push($Actions, modelFieldAction::btnEdit(site_url("cliente/edit"),"id"));
          if (hasPermissions('cliente_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("cliente/deleteAction"),"id"));
        $modelField = array(
          new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
          new modelFieldItem(array("nombre"=>"Nombre del cliente", "nombreData"=>"nombre_cliente")),
          new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
        );
        vTable($modelField, stdToArray($clientes), 0, 'tlbListado');
      ?>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<div id="divCliente"></div>

<?php include viewPath('includes/footer'); ?>

<script>
  $('table').DataTable({"autoWidth": false});
</script>

<!-- Cliente: Modal -->
<script type="text/javascript">
  function onCliente_nuevo() {
    $url = '<?php echo site_url('cliente/nuevoModal') ?>';
    $titulo = "Agregar Cliente";
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "idCliente": 0 },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divCliente').html(html);
        $('#modal_cliente').modal('show');
        $('#modal_cliente .modal-title').text($titulo);
      }
    });
  }

  function onCliente_close() {
    $('#modal_cliente').modal('hide');
  }
</script>