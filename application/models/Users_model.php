<?php

class Users_model extends CI_Model {
    private $_table = 'users';

    public function tambah( $data = NULL )
    {
        if ($data) {
            $this->db->insert( $this->_table, $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        }
        return false;
    }

    public function ubah( $user_id = NULL, $data = NULL )
    {
        if ($user_id && $data) {
            $this->db->where( $this->_table . '.id', $user_id );
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

    public function user( $user_id = NULL, $username = NULL )
    {
        if ($user_id) {
            $this->db->where( $this->_table . '.id', $user_id );
        }
        if ($username) {
            $this->db->where( $this->_table . '.username', $username );
        }
        $this->db->limit(1);
        return $this->users();
    }

    public function users(  )
    {
        $this->db->select( $this->_table . '.*' );
        $this->db->select( 'roles.name AS role_name' );
        $this->db->select( 'hr.id AS hr_id' );
        $this->db->select( 'hr.position_id AS position_id' );
        $this->db->select( 'hr.email AS email' );
        $this->db->select( 'hr.phone AS phone' );
        $this->db->select( '(SELECT positions.name FROM positions JOIN hr ON hr.position_id = positions.id) AS position_name ' );
        $this->db->join(
            'roles', 
            'roles.id = users.role_id',
            'join'
        );
        $this->db->join(
            'hr', 
            'hr.user_id = users.id',
            'left'
        );
        return $this->db->get( $this->_table );
    }
}

?>