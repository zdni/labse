<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'users_model',
            'roles_model',
            'hr_model',
            'positions_model',
        ]);
        $this->data['menu_id'] = 'users_index';
	}

	public function index()
    {
        $this->data['datas'] = $this->users_model->users()->result();
        $this->data['roles'] = $this->roles_model->roles()->result();
        $this->data['positions'] = $this->positions_model->positions()->result();
        $this->data['page'] = 'User';
        
        unset( $this->data['datas'][0] );
        $this->render('admin/users');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data User Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $message = 'Gagal Membuat User Baru!';
            
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $role_id = $this->input->post('role_id');
            
            $data['username'] = $username;
            $data['name'] = $name;
            $data['role_id'] = $role_id;
            $data['image'] = 'user.png';
            $data['password'] = password_hash( str_replace(" ", "", strtolower( $username )), PASSWORD_DEFAULT );
            
            $user = $this->users_model->tambah( $data );
            
            if( $user )
            {
                $position_id = $this->input->post('position_id');
                $email = $this->input->post('email');
                $phone = $this->input->post('phone');

                $hr['user_id'] = $user;
                $hr['position_id'] = $position_id;
                $hr['email'] = $email;
                $hr['phone'] = $phone;
                if( $this->hr_model->tambah( $hr ) ) {
                    $alert = 'success';
                    $message = 'Berhasil Membuat User Baru!';
                } else {
                    $this->user_model->hapus( $user );
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/users') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('phone', 'Nomor Telepon', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data User Baru! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $hr_id = $this->input->post('hr_id');
            $username = $this->input->post('username');
            $name = $this->input->post('name');
            $role_id = $this->input->post('role_id');

            $data['username'] = $username;
            $data['name'] = $name;
            $data['role_id'] = $role_id;

            $position_id = $this->input->post('position_id');
            $email = $this->input->post('email');
            $phone = $this->input->post('phone');

            $hr['position_id'] = $position_id;
            $hr['email'] = $email;
            $hr['phone'] = $phone;


        
            if( $this->users_model->ubah( $id, $data ) && $this->hr_model->ubah( $hr_id, $hr ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah User!';
            } else {
                $message = 'Gagal Mengubah User!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/users') );
    }

    public function reset_password()
    {
        if( !$_POST ) return redirect( base_url('admin/users') );
        
        $this->form_validation->set_rules('username', 'Username', 'required');

        $alert = 'error';
        $message = 'Gagal Reset Password!';
        if ( $this->form_validation->run() )
        {
            $username = $this->input->post('username');
            $id = $this->input->post('id');

            $data['password'] = password_hash( str_replace(" ", "", strtolower( $username )), PASSWORD_DEFAULT );
            
            if( $this->users_model->ubah( $id, $data ) )
            {
                $this->session->set_flashdata('alert', 'success');
                $this->session->set_flashdata('message', 'Berhasil Reset Password!');
                return redirect( base_url('admin/users') );
            } else {
                $message = 'Gagal Reset Password!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/users') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/users') );

        $alert = 'error';
        $message = 'Gagal Menghapus User!';

        $this->form_validation->set_rules('id', 'Id User', 'required');
        $this->form_validation->set_rules('hr_id', 'Id User', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            $hr_id = $this->input->post('hr_id');
            if( $this->hr_model->hapus( $hr_id ) && $this->users_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus User!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/users') );
    }
}
