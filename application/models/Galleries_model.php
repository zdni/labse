<?php

class Galleries_model extends CI_Model {
    private $_table = 'galleries';

    public function tambah( $data = NULL )
    {
        if ( $data ) {
            $this->db->insert( $this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return false;
    }

    public function ubah( $id = NULL, $data = NULL )
    {
        if ( $id && $data ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->update( $this->_table, $data );
        }
        return false;
    }

    public function hapus( $id = NULL )
    {
        if ( $id ) {
            $this->db->where( $this->_table . '.id', $id );
            return $this->db->delete( $this->_table );
        }
        return false;
    }

    public function galleries( $id = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        return $this->db->get( $this->_table );
    }
}

?>