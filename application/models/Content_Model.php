<?php
class Content_Model extends CI_Model
{
    // public $post_date;
    // public $title;
    // public $image_uri;
    // public $picture_author;
    // public $text;
    // public $text_author;
    public $expire_time = 60 * 12; //minutes

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->output->cache($this->expire_time);
        $this->output->enable_profiler(TRUE);
        $sections = array(
            'uri_string' => TRUE,
        );

        $this->output->set_profiler_sections($sections);
    }

    public function get_contents()
    {
        $query = $this->db->get('content');
        return current($query->result_array());
    }

    public function get_content($id)
    {
        $query = $this->db->query("select * from content where id = $id");
        return current($query->result_array());
    }

    // public function __get($key)
    // {
    //     return $this->$key;
    // }

    // public function __set($key, $value)
    // {
    //     $this->$key = $value;
    // }
}
