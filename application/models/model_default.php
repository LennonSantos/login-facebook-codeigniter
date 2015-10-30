<?php

class Model_default extends CI_Model {

        public $tabela = "test";

        public function __construct()
        {
            parent::__construct();

            $this->load->database();
                
        }

        public function update($data = array(), $id_registro )
        {
            if($id_registro != null && count($data) > 0 )
            {
                $this->db->where($this->tabela, $id_registro);

                return $this->db->update('tb_{tabela}', $data);
            }                 
        }

        public function delete($id_registro)
        {
            if($id_registro != null)
            {
                $this->db->where('id_{tabela}', $id_registro);

                $this->db->from($this->tabela);

                return $this->db->delete();
            }
            else
                return false;                 
        }

        public function count($where = null)
        {       
            $where = $this->db->escape($where);
            if($where != null)                
                    $this->db->where($where);  

            $this->db->from($this->tabela);   

            return $this->db->count_all_results();
        }

        public function insert($insert = array())
        {            
            if( $this->db->insert($this->tabela, $insert) )  
                return true;
            else
                return false;
        }

        public function get($select = null, $join = array(), $where = array())
        {
            if($select != null)
                $this->db->select($select);

            if(count($join) > 0)
            {
                foreach ($join as $table => $value) {
                    $this->db->join("{$table}", "{$value}");
                }
                
            }

            $this->db->where($where);

            $this->db->from($this->tabela);

            $query = $this->db->get();

            return $query->result();
        }
}