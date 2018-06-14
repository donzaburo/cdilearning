<?php
class Hello extends CI_Controller {
    public function index() {
        $this->load->database();
        
        $rows = $this->db->get('musers')->result_array();
        foreach($rows as $row) {
            echo 'uid:' . $row['uid'] . ',note:' . $row['note'] . PHP_EOL;
        }
        
    }
}
