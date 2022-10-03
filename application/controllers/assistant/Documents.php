<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Documents extends Assistant_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'documents_model',
        ]);
		$this->load->library('upload');
        $this->data['menu_id'] = 'documents_index';
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
        $this->data['datas']    = $this->documents_model->documents()->result();
        $this->data['types']    = ['SOP', 'Borang'];
        
        $this->data['page'] = 'Dokumen';
        $this->render('admin/documents');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('type', 'Jumlah', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Data Dokumen! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name           = $this->input->post('name');
            $type           = $this->input->post('type');

            $data['name']           = $name;
            $data['type']           = $type;

            if( $_FILES['file']['name'] ) {
                $uploaded_data  = $this->upload_file( $name . ' ' . time()  );
                $file          = $uploaded_data['file_name'];
                $data['file']  = $file;
                
                if( $this->documents_model->tambah( $data ) )
                {
                    $alert = 'success';
                    $message = 'Berhasil Membuat Dokumen!';
                } else {
                    $message = 'Gagal Membuat Dokumen!';
                }
            } else {
                $message = 'Gagal Membuat Dokumen! Silahkan Upload File Gambar';
            }

        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/documents') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('type', 'Jumlah', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Data Arsip! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id             = $this->input->post('id');
            $name           = $this->input->post('name');
            $type           = $this->input->post('type');

            $data['name']           = $name;
            $data['type']           = $type;
            
            if( $_FILES['file']['name'] ) {
                $uploaded_data  = $this->upload_file( $name . ' ' . time()  );
                $file          = $uploaded_data['file_name'];
                $data['file']  = $file;
            }
        
            if( $this->documents_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Data Arsip!';
            } else {
                $message = 'Gagal Mengubah Data Arsip!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/documents') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/arsip') );

        $alert = 'error';
        $message = 'Gagal Menghapus Arsip!';

        $this->form_validation->set_rules('id', 'Id Dokumen', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->documents_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Arsip!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/documents') );
    }

	public function upload_file( $title )
	{
		$config['upload_path']          = './uploads/dokumen/';
		$config['overwrite']            = true;
		$config['allowed_types']        = 'pdf';
		$config['max_size']             = 2048000;
		$config['file_name']			= strtolower($title);
        
		$this->upload->initialize( $config );
		if (!$this->upload->do_upload('file')) {
			$this->session->set_flashdata('alert', 'error');   
			$this->session->set_flashdata('message', $this->upload->display_errors());   
			return redirect( base_url('assistant/documents') );
		} else {
			$uploaded_data = $this->upload->data();
		}
		return $uploaded_data;
	}
}
