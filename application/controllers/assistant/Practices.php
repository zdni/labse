<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Practices extends Assistant_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'practices_model',
        ]);
		$this->load->library('upload');
        $this->data['menu_id'] = 'practices_index';
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
        $this->data['datas']    = $this->practices_model->practices()->result();
        $this->data['status']   = ['Sembunyikan', 'Tampilkan'];
        
        $this->data['page'] = 'Jadwal Praktikum';
        $this->render('admin/practices');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('time', 'Waktu Pelaksaan', 'required');
        $this->form_validation->set_rules('main_lecture', 'Dosen Pengampu', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Menambah Jadwal Praktikum! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $name               = $this->input->post('name');
            $time               = $this->input->post('time');
            $main_lecture       = $this->input->post('main_lecture');
            $second_lecture     = $this->input->post('second_lecture');
            $description        = $this->input->post('description');
            $status             = $this->input->post('status');

            $data['name']           = $name;
            $data['time']           = $time;
            $data['main_lecture']   = $main_lecture;
            $data['second_lecture'] = $second_lecture;
            $data['description']    = $description;
            $data['status']         = $status;

            if( $this->practices_model->tambah( $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Membuat Jadwal Praktikum!';
            } else {
                $message = 'Gagal Membuat Jadwal Praktikum!';
            }
        }

        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/practices') );
    }

    public function ubah()
    {
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('time', 'Waktu Pelaksaan', 'required');
        $this->form_validation->set_rules('main_lecture', 'Dosen Pengampu', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        $alert = 'error';
        $message = 'Gagal Mengubah Jadwal Praktikum! <br> Silahkan isi semua inputan!';
        if ( $this->form_validation->run() )
        {
            $id                 = $this->input->post('id');
            $name               = $this->input->post('name');
            $time               = $this->input->post('time');
            $second_lecture     = $this->input->post('second_lecture');
            $main_lecture       = $this->input->post('main_lecture');
            $description        = $this->input->post('description');
            $status             = $this->input->post('status');

            $data['name']           = $name;
            $data['time']           = $time;
            $data['second_lecture'] = $second_lecture;
            $data['main_lecture']   = $main_lecture;
            $data['description']    = $description;
            $data['status']         = $status;
            
            if( $this->practices_model->ubah( $id, $data ) )
            {
                $alert = 'success';
                $message = 'Berhasil Mengubah Jadwal Praktikum!';
            } else {
                $message = 'Gagal Mengubah Jadwal Praktikum!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/practices') );
    }

    public function hapus()
    {
        if( !$_POST ) return redirect( base_url('admin/arsip') );

        $alert = 'error';
        $message = 'Gagal Menghapus Jadwal Praktikum!';

        $this->form_validation->set_rules('id', 'Id Dokumen', 'required');
        if( $this->form_validation->run() )
        {
            $id = $this->input->post('id');
            if( $this->practices_model->hapus( $id ) )
            {
                $alert = 'success';
                $message = 'Berhasil Menghapus Jadwal Praktikum!';
            }
        }
        
        $this->session->set_flashdata('alert', $alert);
        $this->session->set_flashdata('message', $message);
        return redirect( base_url('assistant/practices') );
    }
}
