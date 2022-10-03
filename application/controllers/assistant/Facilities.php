<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Facilities extends Assistant_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'facilities_model',
        ]);
		$this->load->library('upload');
        $this->data['menu_id'] = 'facilities_index';
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
        $this->data['datas']    = $this->facilities_model->facilities()->result();
        $this->data['deskripsi']= ( file_exists( './uploads/fasilitas/deskripsi.html' ) ) ? file_get_contents( './uploads/fasilitas/deskripsi.html' ) : '';
        
        $this->data['page'] = 'Fasilitas';
        $this->render('admin/facilities');
    }

    public function ubah_deskripsi()
    {
        if( !$_POST ) return redirect( base_url('assistant/facilities') );

        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');   

        $alert = 'error';
        $message = 'Gagal Mengubah Deskripsi! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $deskripsi = $this->input->post('deskripsi');

            if( !file_put_contents( './uploads/fasilitas/deskripsi.html', $deskripsi ) )
            {
                $alert = 'warning';
                $message = 'Gagal Mengubah Deskripsi!';
            } else {
                $alert = 'success';
                $message = 'Berhasil Mengubah Deskripsi!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/facilities') );
    }

    public function detail( $id = NULL )
    {
        if( !$id ) redirect( base_url('assistant/facilities') );
        $this->data['data'] = $this->facilities_model->facilities( $id )->row();

        $this->data['page'] = 'Detail Fasilitas';
        $this->render('admin/facility');
    }

    public function form( $id = NULL )
    {
        $form = $this->input->get('form');
        $this->data['facilities'] = $this->facilities_model->facilities()->result();
        ( $id ) ? $this->data['data'] = $this->facilities_model->facilities( $id )->row() : $this->data['data'] = [];
        
        $this->data['form'] = $form;
        $this->data['page'] = ucwords($form) . ' Data Fasilitas';
        $this->render('admin/form-facility');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('qty', 'Jumlah', 'required');
        $this->form_validation->set_rules('state', 'Keadaan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Fasilitas! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name           = $this->input->post('name');
            $qty            = $this->input->post('qty');
            $state          = $this->input->post('state');
            $description    = $this->input->post('description');

            $data['name']           = $name;
            $data['qty']            = $qty;
            $data['state']          = $state;
            $data['description']    = $description;

            if( $_FILES['image']['name'] ) {
                $uploaded_data  = $this->upload_image( $name . ' ' . time()  );
                $image          = $uploaded_data['file_name'];
                $data['image']  = $image;
                
                if( $this->facilities_model->tambah( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Membuat Fasilitas!';
                } else {
                    $message = 'Gagal Membuat Fasilitas!';
                }
            } else {
                $message = 'Gagal Membuat Fasilitas! Silahkan Upload File Gambar';
            }

        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/facilities') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('qty', 'Jumlah', 'required');
        $this->form_validation->set_rules('state', 'Keadaan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Fasilitas! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id             = $this->input->post('id');
            $name           = $this->input->post('name');
            $qty            = $this->input->post('qty');
            $state          = $this->input->post('state');
            $description    = $this->input->post('description');

            $data['name']           = $name;
            $data['qty']            = $qty;
            $data['state']          = $state;
            $data['description']    = $description;
            
            if( $_FILES['image']['name'] ) {
                $uploaded_data  = $this->upload_image( $name . ' ' . time()  );
                $image          = $uploaded_data['file_name'];
                $data['image']  = $image;
            }
        
            if( $this->facilities_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Data Fasilitas!';
            } else {
                $message = 'Gagal Mengubah Data Fasilitas!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/facilities') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('assistant/facilities') );

        $alert = 'error';
        $message = 'Gagal Menghapus Arsip!';

        $this->form_validation->set_rules('id', 'Id Fasilitas', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->facilities_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Arsip!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/facilities') );
    }

	public function upload_image( $title )
	{
		$config['upload_path']          = './uploads/fasilitas/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'png|jpg|jpeg';
		$config['max_size']             = 2048000;
		$config['file_name']			= strtolower($title);
        
		$this->upload->initialize( $config );
		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('assistant/facilities') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
