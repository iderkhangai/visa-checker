<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : User_model (User Model)
 * User model class to get to handle user related data 
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home_model extends CI_Model
{


    function findUser($fname, $dob, $passportNo)
    {
        // pre($fname);
        // pre($passportNo);
        // pre($dob);
        if ($fname == "" && $dob == "" && $passportNo == "") {
            return [];
        }
        $this->db->select('*');
        $this->db->from('tbl_users');
        if ($fname != '') {
            $this->db->where('name', strtoupper($fname));
        }
        if ($dob != '') {
            $this->db->where('dob', $dob);
        }
        if ($passportNo != '') {
            $this->db->where('passport_no ', $passportNo);
        }

        $query = $this->db->get();
        // pre($this->db->last_query());
        return $query->result();
    }
}
