<?php
class Content extends CI_Model
{
    // public $post_date;
    // public $title;
    // public $image_uri;
    // public $picture_author;
    // public $text;
    // public $text_author;

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_contents()
    {
        $query = $this->db->get('content');
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
