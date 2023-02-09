<?php include viewPath('includes/header'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Roles
    <small>manage roles</small>
  </h1>
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edit Role</h3>

      <div class="box-tools pull-right">
        <a href="<?php echo url('roles') ?>" class="btn btn-flat btn-default"><i class="fa fa-arrow-left"></i> &nbsp;&nbsp; Go Back to Roles</a>
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
          <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
          <i class="fa fa-times"></i></button>
      </div>

    </div>

    <?php echo form_open_multipart('roles/update/'.$role->id, [ 'class' => 'form-validate' ]); ?>
    <div class="box-body">

      <div class="form-group">
        <label for="formClient-Name">Name</label>
        <input type="text" class="form-control" name="name" id="formClient-Name" required placeholder="Enter Name" autofocus value="<?php echo $role->title ?>" />
      </div>

      <div class="form-group">
        <div class="col-lg-6">
          <label for="formClient-Table">Menus</label>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-striped table-DT">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th width="50" class="text-center"><input type="checkbox" class="check-select-all-m"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php if (!empty($menus = $this->menu_model->getMenusOrder())): ?>
                      <?php foreach ($menus as $row): ?>
                        <td>
                          <?php 
                            if ($row->type_object == 'Action') echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            echo ucfirst($row->title) 
                          ?>
                        </td>
                        <?php 
                          $isChecked = in_array($row->name, $role_menus) ? 'checked' : '';
                         ?>
                        <td width="50" class="text-center">
                          <input type="checkbox" class="check-select-m" name="menus[]" value="<?php echo $row->name ?>" <?php echo $isChecked ?>>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="2" class="text-center">No Menus Found</td>
                      </tr>
                    <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <label for="formClient-Table">Permission</label>
          <div class="row">
            <div class="col-sm-12">
              <table class="table table-bordered table-striped table-DT">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th width="50" class="text-center"><input type="checkbox" class="check-select-all-p"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <?php if (!empty($permissions = $this->permissions_model->get())): ?>
                      <?php foreach ($permissions as $row): ?>
                        <td>
                          <?php echo ucfirst($row->title) ?>
                        </td>
                        <?php 
                          $isChecked = in_array($row->code, $role_permissions) ? 'checked' : '';
                         ?>
                        <td width="50" class="text-center">
                          <input type="checkbox" class="check-select-p" name="permission[]" value="<?php echo $row->code ?>" <?php echo $isChecked ?>>
                        </td>
                      </tr>
                      <?php endforeach ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="2" class="text-center">No Permissions Found</td>
                      </tr>
                    <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


    </div>
    <!-- /.box-body -->

    <div class="box-footer">
      <button type="submit" class="btn btn-flat btn-primary">Submit</button>
    </div>
    <!-- /.box-footer-->

    <?php echo form_close(); ?>

  </div>
  <!-- /.box -->

</section>
<!-- /.content -->

<script>
  $(document).ready(function() {
    //form validate
    $('.form-validate').validate();

    //Data table
    $('.table-DT').DataTable({
      "ordering": true,
      'order' : true,
      "paging": false,
    });

    //Permission -> Checked
    $('.check-select-all-p').on('change', function() {
      $('.check-select-p').attr('checked', $(this).is(':checked'));
    })   

    var checked = true;
    $('.check-select-p').each(function() {
      if(!$(this).is(':checked'))
        checked = false;
        return checked;
    });

    if(checked){
      $('.check-select-all-p').attr('checked', true);
    }

    //Menus -> Checked
    $('.check-select-all-m').on('change', function() {
      $('.check-select-m').attr('checked', $(this).is(':checked'));
    })   

    checked = true;
    $('.check-select-m').each(function() {
      if(!$(this).is(':checked'))
        checked = false;
        return checked;
    });

    if(checked){
      $('.check-select-all-m').attr('checked', true);
    }

  })

</script>

<?php include viewPath('includes/footer'); ?>

<script>
      //Initialize Select2 Elements
    $('.select2').select2()
</script>