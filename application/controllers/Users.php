<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->page_data['page']->title = 'Users Management';
		$this->page_data['page']->menu = 'users';
	}

	public function index()
	{
		ifPermissions('users_list');
		$this->page_data['users'] = $this->users_model->get();
		$this->load->view('users/list', $this->page_data);
	}

	public function add()
	{
		ifPermissions('users_add');
		$this->load->view('users/add', $this->page_data);
	}

	public function save()
	{
		ifPermissions('users_add');
		postAllowed();

		$id = $this->users_model->create([
			'role' => $this->input->post('role'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
			'password' => md5($this->input->post('password')),
		]);

		if (!empty($_FILES['image']['name'])) {

			$this->uploadlib->initialize([
				'file_name' => $id.'.png'
			]);

			$this->uploadlib->uploadImage('image', '/users');

		}else{

			copy(FCPATH.'uploads/users/default.png', 'uploads/users/'.$id.'.png');

		}

		$this->activity_model->add('New User $'.$id.' Created by User:'.logged('name'), logged('id'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'New User Created Successfully');
		
		redirect('users');

	}

	public function view($id)
	{

		ifPermissions('users_view');

		$this->page_data['User'] = $this->users_model->getById($id);
		$this->page_data['User']->role = $this->roles_model->getByWhere([
			'id'=> $this->page_data['User']->role
		])[0];
		$this->page_data['User']->activity = $this->activity_model->getByWhere([
			'user'=> $id
		], [ 'order' => ['id', 'desc'] ]);
		$this->load->view('users/view', $this->page_data);

	}

	public function edit($id)
	{

		ifPermissions('users_edit');

		$this->page_data['User'] = $this->users_model->getById($id);
		$this->load->view('users/edit', $this->page_data);

	}


	public function update($id)
	{

		ifPermissions('users_edit');
		
		postAllowed();

		$data = [
			'role' => $this->input->post('role'),
			'name' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'address' => $this->input->post('address'),
		];

		$password = post('password');

		if(!empty($password))
			$data['password'] = md5($password);

		$id = $this->users_model->update($id, $data);

		if (!empty($_FILES['image']['name'])) {

			$this->uploadlib->initialize([
				'file_name' => $id.'.png'
			]);

			$this->uploadlib->uploadImage('image', '/users');

		}

		$this->activity_model->add("User #$id Updated by User:".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'Client Profile has been Updated Successfully');
		
		redirect('users');

	}

	public function check()
	{
		$email = !empty(get('email')) ? get('email') : false;
		$username = !empty(get('username')) ? get('username') : false;
		$notId = !empty($this->input->get('notId')) ? $this->input->get('notId') : 0;

		if($email)
			$exists = count($this->users_model->getByWhere([
					'email' => $email,
					'id !=' => $notId,
				])) > 0 ? true : false;

		if($username)
			$exists = count($this->users_model->getByWhere([
					'username' => $username,
					'id !=' => $notId,
				])) > 0 ? true : false;

		echo $exists ? 'false' : 'true';
	}

	public function delete($id)
	{

		ifPermissions('users_delete');

		if($id!==1){ }else{
			redirect('/','refresh');
			return;
		}

		$id = $this->users_model->delete($id);

		$this->activity_model->add("User #$id Deleted by User:".logged('name'));

		$this->session->set_flashdata('alert-type', 'success');
		$this->session->set_flashdata('alert', 'User has been Deleted Successfully');
		
		redirect('users');

	}

}

/* End of file Users.php */
/* Location: ./application/controllers/Users.php */