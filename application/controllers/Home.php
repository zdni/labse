<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	
	function __construct()
	{
        parent::__construct();
        $this->load->model([
            'users_model',
            'documents_model',
            'extracurriculars_model',
            'facilities_model',
            'galleries_model',
            'hr_model',
            'practices_model',
        ]);
        $this->template = 'client';

        $this->data['contact'] = [
            'map'          => ( file_exists( './uploads/profil/map.html' ) )            ? file_get_contents( './uploads/profil/map.html' )          : '',        
            'working_hours'=> ( file_exists( './uploads/profil/working_hours.html' ) )  ? file_get_contents( './uploads/profil/working_hours.html' ): '',        
            'hours_of_rest'=> ( file_exists( './uploads/profil/hours_of_rest.html' ) )  ? file_get_contents( './uploads/profil/hours_of_rest.html' ): '',        
            'email'        => ( file_exists( './uploads/profil/email.html' ) )          ? file_get_contents( './uploads/profil/email.html' )        : '',        
            'address'      => ( file_exists( './uploads/profil/address.html' ) )        ? file_get_contents( './uploads/profil/address.html' )      : ''        
        ];

        $array_map = explode(',', $this->data['contact']['map']);
        $this->data['contact']['lat'] = $array_map[0];
        $this->data['contact']['lng'] = $array_map[1];
	}
    
	public function index()
    {
        $this->data['about']            = ( file_exists( './uploads/profil/about.html' ) ) ? file_get_contents( './uploads/profil/about.html' ) : '';  
        $this->data['practices']        = $this->practices_model->practices( NULL, 1 )->result();      
        $this->data['extracurriculars'] = $this->extracurriculars_model->extracurriculars( NULL, 1 )->result();     
        $this->data['head_of_lab']      = $this->hr_model->user_by_position( 1 )->row(); 
        $this->data['assistants']       = $this->hr_model->user_by_position( 2 )->result();
        
        $this->render('client/index', $this->template);
    }

    public function documents()
    {
        $this->data['datas'] = $this->documents_model->documents()->result();
        $this->data['types'] = ['SOP', 'Borang'];
        
        $this->render('client/documents', $this->template);
    }

    public function extracurriculars()
    {
        $this->data['datas'] = $this->extracurriculars_model->extracurriculars( NULL, 1 )->result();
        
        $this->render('client/extracurriculars', $this->template);
    }

    public function facilities()
    {
        $this->data['deskripsi']= ( file_exists( './uploads/fasilitas/deskripsi.html' ) ) ? file_get_contents( './uploads/fasilitas/deskripsi.html' ) : '';
        $this->data['datas'] = $this->facilities_model->facilities()->result();
        
        $this->render('client/facilities', $this->template);
    }

    public function facility( $id = NULL )
    {
        if( !$id ) return redirect( base_url() );
        $this->data['data'] = $this->facilities_model->facilities( $id )->row();
        
        $this->render('client/facility', $this->template);
    }

    public function galleries()
    {
        $this->data['datas'] = $this->galleries_model->galleries()->result();
        
        $this->render('client/galleries', $this->template);
    }

    public function practices()
    {
        $this->data['datas'] = $this->practices_model->practices( NULL, 1 )->result();
        
        $this->render('client/practices', $this->template);
    }

}
