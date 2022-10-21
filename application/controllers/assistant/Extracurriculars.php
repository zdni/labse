<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extracurriculars extends Assistant_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'extracurriculars_model',
        ]);
		$this->load->library('upload');
        $this->data['menu_id'] = 'extracurriculars_index';
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
        $this->data['datas']    = $this->extracurriculars_model->extracurriculars()->result();
        $this->data['status']   = ['Sembunyikan', 'Tampilkan'];
        
        $this->data['page'] = 'Jadwal Kegiatan Belajar Tambahan';
        $this->render('admin/extracurriculars');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('date', 'Waktu Pelaksaan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Jadwal Kegiatan Belajar Tambahan! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name               = $this->input->post('name');
            $date               = $this->input->post('date');
            $description        = $this->input->post('description');
            $status             = $this->input->post('status');

            $data['name']           = $name;
            $data['date']           = $date;
            $data['description']    = $description;
            $data['status']         = $status;

            if( $this->extracurriculars_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Jadwal Kegiatan Belajar Tambahan!';
            } else {
                $message = 'Gagal Membuat Jadwal Kegiatan Belajar Tambahan!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/extracurriculars') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('date', 'Waktu Pelaksaan', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Jadwal Kegiatan Belajar Tambahan! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id                 = $this->input->post('id');
            $name               = $this->input->post('name');
            $date               = $this->input->post('date');
            $description        = $this->input->post('description');
            $status             = $this->input->post('status');

            $data['name']           = $name;
            $data['date']           = $date;
            $data['description']    = $description;
            $data['status']         = $status;
            
            if( $this->extracurriculars_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Jadwal Kegiatan Belajar Tambahan!';
            } else {
                $message = 'Gagal Mengubah Jadwal Kegiatan Belajar Tambahan!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/extracurriculars') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/arsip') );

        $alert = 'error';
        $message = 'Gagal Menghapus Jadwal Kegiatan Belajar Tambahan!';

        $this->form_validation->set_rules('id', 'Id Dokumen', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->extracurriculars_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Jadwal Kegiatan Belajar Tambahan!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/extracurriculars') );
    }
}
