<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends Assistant_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'galleries_model',
        ]);
		$this->load->library('upload');
        $this->data['menu_id'] = 'galleries_index';
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
        $this->data['datas']    = $this->galleries_model->galleries()->result();
        
        $this->data['page'] = 'Galeri';
        $this->render('admin/galleries');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Galeri! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name           = $this->input->post('name');
            $date           = $this->input->post('date');
            $description    = $this->input->post('description');

            $data['name']           = $name;
            $data['date']           = $date;
            $data['description']    = $description;

            if( $_FILES['image']['name'] ) {
                $uploaded_data  = $this->upload_image( $name . ' ' . time()  );
                $image          = $uploaded_data['file_name'];
                $data['image']  = $image;
                
                if( $this->galleries_model->tambah( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Membuat Galeri!';
                } else {
                    $message = 'Gagal Membuat Galeri!';
                }
            } else {
                $message = 'Gagal Membuat Galeri! Silahkan Upload File Gambar';
            }

        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/galleries') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('date', 'Tanggal', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Arsip! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id             = $this->input->post('id');
            $name           = $this->input->post('name');
            $date           = $this->input->post('date');
            $description    = $this->input->post('description');

            $data['name']           = $name;
            $data['date']           = $date;
            $data['description']    = $description;
            
            if( $_FILES['image']['name'] ) {
                $uploaded_data  = $this->upload_image( $name . ' ' . time()  );
                $image          = $uploaded_data['file_name'];
                $data['image']  = $image;
            }
        
            if( $this->galleries_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Data Arsip!';
            } else {
                $message = 'Gagal Mengubah Data Arsip!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/galleries') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('assistant/galleries') );

        $alert = 'error';
        $message = 'Gagal Menghapus Galeri!';

        $this->form_validation->set_rules('id', 'Id Galeri', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->galleries_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Galeri!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/galleries') );
    }

	public function upload_image( $title )
	{
		$config['upload_path']          = './uploads/galeri/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'png|jpg|jpeg';
		$config['max_size']             = 2048000;
		$config['file_name']			= strtolower($title);
        
		$this->upload->initialize( $config );
		if (!$this->upload->do_upload('image')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('assistant/galleries') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
