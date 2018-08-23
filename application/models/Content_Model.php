<?php
class Content_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        
        // $this->output->enable_profiler(TRUE);
        // $sections = array(
        //     'uri_string' => TRUE,
        // );

        // $this->output->set_profiler_sections($sections);
    }

    public function get_contents()
    {
        $query = $this->db->get('content');
        return current($query->result_array());
    }

    public function get_contents_by_id($id)
    {
        $query = $this->db->query("select * from content where Id = $id");
        return current($query->result_array());
    }

    /**
     * 获取最新content(3条)
     */
    public function get_lastest_contents()
    {
        $query = $this->db->query("select * from content order by PostDate desc limit 0,3");
        return $query->result_array();
    }
}
