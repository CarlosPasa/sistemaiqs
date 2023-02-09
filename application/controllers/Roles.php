<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Roles Management';
		$this->page_data['page']->menu = 'roles';
	}

	public function index()
	{
		ifPermissions('roles_list');
		$this->page_data['roles'] = $this->roles_model->get();
		$this->load->view('roles/list', $this->page_data);
	}

	public function add()
	{
		ifPermissions('roles_add');
		$this->load->view('roles/add', $this->page_data);
	}

	public function save()
	{

		ifPermissions('roles_add');
		
		postAllowed();

		$role = $this->roles_model->create([
			'title' => $this->input->post('name'),
		]);

		$Data = [];
		foreach (post('permission') as $permission) {
			array_push($Data, [
				'role' => $role,
				'permission' => $permission,
			]);
		}

		$this->role_permissions_model->create_batch($Data);

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New Role Created Successfully');

		$this->activity_model->add("New Role #$role Created by User: #".logged('id'));
		
		redirect('roles');

	}

	public function edit($id)
	{
		ifPermissions('roles_edit');
		$this->page_data['role'] = $this->roles_model->getById($id);
		$permissions = $this->role_permissions_model->getByWhere(['role' => $this->page_data['role']->id]);
		$permissions = array_map(function($data)
		{
			return $data->permission;
		}, $permissions);
		$menus = $this->role_menus_model->getMenus($this->page_data['role']->id);
		
		$menus = array_map(function($data)
		{
			return $data->name;
		}, $menus);
		
		$this->page_data['role_permissions'] = $permissions;
        $this->page_data['role_menus'] = $menus;
        //echo json_encode($this->page_data);
		$this->load->view('roles/edit', $this->page_data);
	}


	public function update($id)
	{

		ifPermissions('roles_edit');
		
		postAllowed();

		$data = [
			'title' => $this->input->post('name'),
		];

		if(!empty($password = post('password')))
			$data['password'] = md5($password);

		$role = $this->roles_model->update($id, $data);

		// Data which will be added (Permissions)
		$Data = [];
		foreach (post('permission') as $permission) {
			if( !empty($this->role_permissions_model->getByWhere([ 'role' => $id, 'permission' => $permission ])) ){ }else{
				array_push($Data, [
					'role' => $role,
					'permission' => $permission,
				]);
			}
		}
		if(!empty($Data))
			$this->role_permissions_model->create_batch($Data);
		$all_permissions = $this->role_permissions_model->getByWhere(['role' =>  $role]);
		if(!empty($all_permissions)){
			// Permissions which will be deleted
			foreach ($all_permissions as $data) {
				if(!in_array($data->permission, post('permission'))){
					$this->role_permissions_model->delete($data->id);
				}
			}
		}

		// Data which will be added (Menus)
		$Data = [];
		foreach (post('menus') as $menu) {
			if( !empty($this->role_menus_model->getByWhere([ 'role' => $id, 'menu' => $menu ])) ){ }else{
				array_push($Data, [
					'role' => $role,
					'menu' => $menu,
				]);
			}
		}
		if(!empty($Data))
			$this->role_menus_model->create_batch($Data);
		$all_menus = $this->role_menus_model->getByWhere(['role' =>  $role]);
		if(!empty($all_menus)){
			// Permissions which will be deleted
			foreach ($all_menus as $data) {
				if(!in_array($data->menu, post('menus'))){
					$this->role_menus_model->delete($data->id);
				}
			}
		}
		
		$this->activity_model->add("Role #$role Updated by User: #".logged('id'));
		
		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'User Role has been Updated Successfully');
		
		redirect('roles');

	}

}

/* End of file Roles.php */
/* Location: ./application/controllers/Roles.php */