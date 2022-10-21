<?php

class Hr_model extends CI_Model {
    private $_table = 'hr';

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

    public function hr( $id = NULL )
    {
        $this->db->select( $this->_table . '.*' );
        $this->db->select( 'users.name AS user_name' );
        $this->db->select( 'users.image AS user_image' );
        $this->db->select( 'positions.name AS position_name' );
        $this->db->join(
            'positions', 
            'positions.id = hr.position_id',
            'join'
        );
        $this->db->join(
            'users', 
            'users.id = hr.user_id',
            'join'
        );
        if( $id ) $this->db->where( $this->_table . '.id', $id);
        return $this->db->get( $this->_table );
    }

    public function user_by_position( $position_id = NULL )
    {
        if( $position_id ) $this->db->where( $this->_table . '.position_id', $position_id);
        return $this->hr();
    }
}

?>