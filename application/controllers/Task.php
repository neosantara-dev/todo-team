<?php
class Task extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('administrator');
            redirect($url);
        };
        // Call Model
        $this->load->model('M_data','m_data');
    

        // Access Rights Limiter
        // is_logged_in();
    }
    public function index()
    {
        $data['title'] = 'List Task';

       $this->load->view('v_task',$data);
    }

    public function dataTask()
    {
        $search = $_POST['search']['value']; // Ambil data yang di ketik user pada textbox pencarian
        $limit = $_POST['length']; // Ambil data limit per page
        $start = $_POST['start']; // Ambil data start
        $order_index = $_POST['order'][0]['column']; // Untuk mengambil index yg menjadi acuan untuk sorting
        $order_field = $_POST['columns'][$order_index]['data']; // Untuk mengambil nama field yg menjadi acuan untuk sorting
       
        $order_ascdesc = 'DESC';
        // $order_ascdesc = $_POST['order'][0]['dir']; // Untuk menentukan order by "ASC" atau "DESC"
        $sql_total = $this->m_data->count_all(); // Panggil fungsi count_all  
        $sql_data = $this->m_data->filter_data_task($search, $limit, $start, $order_field, $order_ascdesc); // Panggil fungsi filter
        $sql_filter = $this->m_data->count_filter_task($search); // Panggil fungsi count_filter 
        $callback = array(
            'draw'=>$_POST['draw'], // Ini dari datatablenya
            'recordsTotal'=>$sql_total,
            'recordsFiltered'=>$sql_filter,
            'data'=>$sql_data
        );
        header('Content-Type: application/json');
        echo json_encode($callback); // Convert array $callback ke json
    }
    
        function simpan_task(){
            $nama=$this->input->post('nama');
            $desc=$this->input->post('desc');
            $tanggal=$this->input->post('tanggal');
          
    
           
    
            $data  =[
                'nama_task' => $nama,
                'deskripsi' => $desc,
                'tanggal_akhir' => $tanggal
              
            ];
    
            $data=$this->m_data->create($data,'tbl_task');
            
            echo json_encode($data);
        }
    
    
}