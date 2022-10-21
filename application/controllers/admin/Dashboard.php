<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends User_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'users_model',
            'facilities_model',
            'practices_model',
        ]);
        $this->db->query(
            'SET SESSION sql_mode =
            REPLACE(REPLACE(REPLACE(
            @@sql_mode,
            "ONLY_FULL_GROUP_BY,", ""),
            ",ONLY_FULL_GROUP_BY", ""),
            "ONLY_FULL_GROUP_BY", "")'
        );
	}

	public function index()
    {
        $this->data['about']        = ( file_exists( './uploads/profil/about.html' ) ) ? file_get_contents( './uploads/profil/about.html' ) : '';        
        $this->data['map']          = ( file_exists( './uploads/profil/map.html' ) ) ? file_get_contents( './uploads/profil/map.html' ) : '';        
        $this->data['working_hours']= ( file_exists( './uploads/profil/working_hours.html' ) ) ? file_get_contents( './uploads/profil/working_hours.html' ) : '';        
        $this->data['hours_of_rest']= ( file_exists( './uploads/profil/hours_of_rest.html' ) ) ? file_get_contents( './uploads/profil/hours_of_rest.html' ) : '';        
        $this->data['email']        = ( file_exists( './uploads/profil/email.html' ) ) ? file_get_contents( './uploads/profil/email.html' ) : '';        
        $this->data['address']      = ( file_exists( './uploads/profil/address.html' ) ) ? file_get_contents( './uploads/profil/address.html' ) : '';        

        $this->data['users']    = count( $this->users_model->users()->result() );
        $this->data['fasilitas']= count( $this->facilities_model->facilities()->result() );
        $this->data['praktikum']= count( $this->practices_model->practices( NULL, 1)->result() );
        
        $this->data['page'] = 'Beranda';
        $this->render('admin/dashboard');
    }

    public function update_about_labse()
    {
        if( !$_POST ) return redirect( base_url('admin/dashboard') );

        $this->form_validation->set_rules('about', 'Konten Profil', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Tentang LAB SE! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $about = $this->input->post('about');

            if( !file_put_contents( './uploads/profil/about.html', $about ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah Tentang LAB SE!';
            } else {
                $alert = 'success';
                $message = 'Berhasil Mengubah Tentang LAB SE!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/dashboard') );
    }

    public function update_adm_op()
    {
        if( !$_POST ) return redirect( base_url('admin/dashboard') );

        $this->form_validation->set_rules('working_hours', 'Jam Operasional', 'required');   
        $this->form_validation->set_rules('hours_of_rest', 'Jam Istirahat', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Administrasi & Operasional! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $hours_of_rest = $this->input->post('hours_of_rest');
            $working_hours = $this->input->post('working_hours');
            
            $alert = 'warning';
            $message = 'Gagal Mengubah Administrasi & Operasional!';

            if( file_put_contents( './uploads/profil/hours_of_rest.html', $hours_of_rest ) )
            {
                if( file_put_contents( './uploads/profil/working_hours.html', $working_hours ) ) {
                    $alert = 'success';
                    $message = 'Berhasil Mengubah Administrasi & Operasional!';
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/dashboard') );
    }

    public function update_contact()
    {
        if( !$_POST ) return redirect( base_url('admin/dashboard') );

        $this->form_validation->set_rules('email', 'Email', 'required');   
        $this->form_validation->set_rules('address', 'Alamat', 'required');   
        $this->form_validation->set_rules('map', 'Peta', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Kontak! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $email = $this->input->post('email');
            $address = $this->input->post('address');
            $map = $this->input->post('map');

            $alert = 'warning';
            $message = 'Gagal Mengubah Kontak!';
            
            if( file_put_contents( './uploads/profil/email.html', $email ) )
            {
                if( file_put_contents( './uploads/profil/address.html', $address ) )
                {
                    if( file_put_contents( './uploads/profil/map.html', $map ) )
                    {
                        $alert = 'success';
                        $message = 'Berhasil Mengubah Kontak!';
                    }
                }
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('admin/dashboard') );
    }
}
