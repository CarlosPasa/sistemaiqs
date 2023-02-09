<ul class="sidebar-menu" data-widget="tree">
  
  <li class="header">Main Navigation</li>

  <?php 
    $menus = $this->session->userdata('menus');
    $menusPadre = array_filter($menus, function($obj) { return $obj->menu_padre_id == 0; });
    foreach ($menusPadre as $menu){
      if ($menu->type_object == "Menu"){
  ?>
        <li class="treeview <?php echo ($page->menu==$menu->name)?'active':'' ?>">
          <a href="#">
            <i class="<?php echo $menu->icon ?>"></i> <span><?php echo $menu->title ?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php
              $menusHijo = array_filter($menus, function($obj) use($menu) { return $obj->menu_padre_id == $menu->id; });
              foreach ($menusHijo as $menuHijo){
            ?>
                <li <?php echo ($page->menu==$menuHijo->name)?'class="active"':'' ?>>
                  <a href="<?php echo url($menuHijo->object) ?>">
                    <i class="<?php echo $menuHijo->icon ?>"></i><span><?php echo $menuHijo->title ?></span>
                  </a>
                </li>
            <?php
              }
            ?>
          </ul>
        </li>
  <?php
      }
      if ($menu->type_object == "Action"){
  ?>
        <li <?php echo ($page->menu==$menu->name)?'class="active"':'' ?>>
          <a href="<?php echo url($menu->object) ?>">
            <i class="<?php echo $menu->icon ?>"></i> <span><?php echo $menu->title; ?></span>
          </a>
        </li>
  <?php
      }
    }

  ?>

</ul>