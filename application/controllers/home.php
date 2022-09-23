<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Home extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
        $this->load->model('user_model');
        // $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        // pre("im called");

        $this->global['pageTitle'] = 'Home page';
        $this->load->view('home');
    }

    public function search()
    {
        $fname = $this->security->xss_clean($this->input->post('fname'));
        $dob = $this->security->xss_clean($this->input->post('dob'));
        $passport_no = $this->security->xss_clean($this->input->post('passport_no'));
        $data['result'] = $this->home_model->findUser($fname, $dob, $passport_no);
        $this->load->view('home',  $data);
        // redirect('home');
    }

    public function print($userId = NULL)
    {

        $data['userInfo'] = $this->user_model->getUserInfo($userId);
        // pre($data);
        $this->load->view('certificate',  $data);
        // redirect('home');
    }
}
