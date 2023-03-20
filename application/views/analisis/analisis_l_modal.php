<!-- Bootstrap modal -->
<div class="modal fade" id="modal_detalle"  tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
        <div class="modal-content">
			<?php
				echo form_open($postAction, vFormAtributos("frmFichaAnalisis"));
			?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Muestra <?php echo $idMuestra?></h3>
            </div>
            <div class="modal-body form">
				<div class="form-body">
					<fieldset style="margin-right: 30px;margin-left: 30px;">
						<?php vHidden('id', $id); ?>
						<div class="box-body">
						<?php      
							$Actions = array();
							if (hasPermissions('analisis_edit')) array_push($Actions, new modelFieldAction(array("class"=>"btn btn-sm btn-info","icono"=>"glyphicon glyphicon-pencil","tooltip"=>"Modificar","columnNameID"=>"id","onClick"=>"onMuestra_edit('"."_id_"."')")));
							if (hasPermissions('analisis_delete')) array_push($Actions, modelFieldAction::btnDelete(site_url("analisis/deleteAction"),"id"));
							$modelField = array(
								new modelFieldItem(array("nombre"=>"ID", "nombreData"=>"id","hAlign"=>"center","ancho"=>"60px")),
								new modelFieldItem(array("nombre"=>"Codigo de Campo/Puntos de Muestreo", "nombreData"=>"nombre_analisis","hAlign"=>"center")),
								new modelFieldItem(array("nombre"=>"Ma", "nombreData"=>"ma","hAlign"=>"center")),
								new modelFieldItem(array("nombre"=>"Pr", "nombreData"=>"pr","hAlign"=>"right","ancho"=>"30px")),
								new modelFieldItem(array("nombre"=>"Acciones", "arrayAcciones"=>$Actions,"hAlign"=>"center","ancho"=>"150px"))
							);
							vTable($modelField, stdToArray($analisis), 0, 'tlbListado');
						?>
						</div>
					</fieldset>
				</div>
            </div>
            <!--div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onClick="onMuestra_close();">Cancelar</button>
                <button type="button" class="btn btn-success" onClick="onMuestraSubmit()">Guardar</button>
            </div-->
			<?php echo form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->


<!-- Validation -->
<script type="text/javascript">
</script>

<!-- Document.Ready() -->
<script type="text/javascript">
$(document).ready(function(){
	
});
</script>

<script type="text/javascript">
</script>

<!-- onSubmit() -->
<script type="text/javascript">
function onMuestraSubmit(){
	onMuestra_close();
}
function onMuestra_edit(_id) {
	onMuestra_close();
    $url = '<?php echo site_url('analisis/editModal') ?>'+ "/" + _id;
    $("#pageSpin").show();
    $.ajax({
      type: 'GET',
      url: $url,
      data: { "id": 0, "idCadena": $("#id").val() },
      dataType: 'html',
      success: function (html) {
        $("#pageSpin").hide();
        $('#divDetalle').html(html);
        $('#modal_detalle').modal('show');
      }
    });
  }
function onDetalle_delete(_id){
	$url = "<?php echo site_url('analisis/deleteAction'); ?>" + "/" + _id;
	rpta = ShowDialogQuestion('PREGUNTA','¿Desea eliminar el registro seleccionado',$url);	
}
function onMuestra_close() {
	$('.modal-backdrop').hide();
	$('#modal_detalle').modal('hide');
}
</script>