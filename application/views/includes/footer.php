
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      Made with <i class="fa fa-heart" style="color: red;"></i> for Developers
      &nbsp; &nbsp; &nbsp; &nbsp; 
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; <?php echo date('Y') ?> <a href="<?php echo url('/') ?>"><?php echo setting('company_name') ?></a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- date-range-picker -->
<script src="<?php echo $url->assets ?>plugins/moment/min/moment.min.js"></script>
<script src="<?php echo $url->assets ?>plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo $url->assets ?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- bootstrap datetimepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo $url->assets ?>plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>

<!-- DataTables -->
<script src="<?php echo $url->assets ?>plugins/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo $url->assets ?>plugins/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- Validate  -->
<script src="<?php echo $url->assets ?>plugins/jquery.validate.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo $url->assets ?>js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url->assets ?>js/demo.js"></script>

<!-- Select2 -->
<script src="<?php echo $url->assets ?>plugins/select2/dist/js/select2.full.min.js"></script>

<!-- pace -->
<script src="<?php echo $url->assets ?>plugins/pace/pace.min.js"></script>

<!-- Loading spinner -->
<script src="<?php echo $url->assets ?>plugins/spinner/spinner.js"></script>
<!-- input mask -->
<script src="<?php echo $url->assets ?>plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?php echo $url->assets ?>plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?php echo $url->assets ?>plugins/input-mask/jquery.inputmask.extensions.js"></script>
<div id="pageSpin"></div>
<script>
	$("#pageSpin").spinner();
</script>

<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>



<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })

  $.validator.setDefaults( {
    errorElement: "em",
    errorPlacement: function ( error, element ) {
      // Add the `help-block` class to the error element
      error.addClass( "help-block" );

      if ( element.prop( "type" ) === "checkbox" ) {
        error.insertAfter( element.parent( "label" ) );
      } else {
        error.insertAfter( element );
      }
    },
    highlight: function ( element, errorClass, validClass ) {
      $( element ).parents( ".form-group" ).addClass( "has-error" ).removeClass( "has-success" );
    },
    unhighlight: function (element, errorClass, validClass) {
      $( element ).parents( ".form-group" ).addClass( "has-success" ).removeClass( "has-error" );
    }
} );

$.fn.openMenu = function () {
        var className = $(this).attr('class');
  if(className == "treeview"){
    $(this).addClass("active");
  }else if(className == "treeview-menu" ){
    $(this).addClass("menu-open");
    $(this).css({ display: "block" });
  }
};

$.fn.closeMenu = function () {
        var className = $(this).attr('class');
  var count = $(this).length;
  if(count > 1){
    $.each($(this), function( key, element ) {
      className = $(element).attr('class');
      if(className == "treeview active"){
        $(element).removeClass("active");
      }else if(className == "treeview-menu menu-open" ){
        $(element).removeClass("menu-open");
        $(element).css({ display: "none" });
      }
    });
  }else{
    if(className == "treeview active"){
      $(this).removeClass("active");
    }else if(className == "treeview-menu menu-open" ){
      $(this).removeClass("menu-open");
      $(this).css({ display: "none" });
    }
  }
};

$(".search-menu-box").on('input', function() {
    var filter = $(this).val();
    $(".sidebar-menu > li").each(function(){
        if ($(this).text().search(new RegExp(filter, "i")) < 0) {
            $(this).hide();
        } else {
            $(this).show();
            $(this).parentsUntil(".treeview").openMenu();
        }
    });
});

</script>

<!-- Componentes -->
<script src="<?php echo $url->assets ?>componentes/BootstrapModalDialog/bootstrap-dialog.js"></script>
<script src="<?php echo $url->assets ?>componentes/BootstrapModalDialog/BootstrapModalDialog.js"></script>

<script src="<?php echo $url->assets ?>componentes/AjaxFormulario/ajaxFormulario.js"></script>

<script src="<?php echo $url->assets ?>componentes/vdisenioJS/vdisenio.js"></script>
<script src="<?php echo $url->assets ?>componentes/vdisenioJS/inputSelect.js"></script>
<script src="<?php echo $url->assets ?>componentes/vdisenioJS/inputSearch.js"></script>

</body>
</html>
