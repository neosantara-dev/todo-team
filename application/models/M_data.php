<?php
class M_data extends CI_Model{

    public function count_all(){
        return $this->db->count_all('tbl_task'); // Untuk menghitung semua data 
      }

      function filter_data_task($search=null, $limit=null, $start=null, $order_field=null, $order_ascdesc=null){
       
        $this->db->select('*');
                $this->db->from('tbl_task ');
             
              
               
              if(!empty($search)){
                $this->db->like('nama_task', $search); // Untuk menambahkan query where LIKE
                $this->db->or_like('tanggal_akhir', $search); // Untuk menambahkan query 
              }
                $this->db->order_by($order_field, $order_ascdesc); // Untuk menambahkan query ORDER BY
                $this->db->limit($limit, $start); // Untuk menambahkan query LIMIT
                $query = $this->db->get();         
                return $query->result_array();   // Eksekusi query sql sesuai kondisi diatas
    }
    public function count_filter_task($search){
       
        $this->db->select('*');
                $this->db->from('tbl_task');
               
                if(!empty($search)){
                    $this->db->like('nama_task', $search); // Untuk menambahkan query where LIKE
                    $this->db->or_like('tanggal_akhir', $search); // Untuk menambahkan query 
                  }
          
        $query = $this->db->get();         
        return $query->num_rows();  // Untuk menghitung jumlah data sesuai dengan filter pada textbox pencarian
      }
      
    function create($data, $table)
    {
        $this->db->insert($table, $data);
    }
    

}