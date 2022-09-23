<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class User extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->isLoggedIn();
    }

    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        $this->global['pageTitle'] = ' Dashboard';

        $this->loadViews("general/dashboard", $this->global, NULL, NULL);
    }

    /**
     * This function is used to load the user list
     */
    function userListing()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $searchText = $this->security->xss_clean($this->input->post('searchText'));
            $data['searchText'] = $searchText;

            $this->load->library('pagination');

            $count = $this->user_model->userListingCount($searchText);

            $returns = $this->paginationCompress("userListing/", $count, 10);

            $data['userRecords'] = $this->user_model->userListing($searchText, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = ' User Listing';

            $this->loadViews("users/users", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to load the add new form
     */
    function addNew()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->model('user_model');
            $data['roles'] = $this->user_model->getUserRoles();

            $this->global['pageTitle'] = ' Add New User';

            $this->loadViews("users/addNew", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to check whether email already exist or not
     */
    function checkEmailExists()
    {
        $userId = $this->input->post("userId");
        $email = $this->input->post("email");

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            echo ("true");
        } else {
            echo ("false");
        }
    }

    /**
     * This function is used to add new user to the system
     */
    function addNewUser()
    {

        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            $this->load->library('upload');
            // $this->form_validation->set_rules('fname','Full Name','trim|required|max_length[128]');
            // $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[128]');
            // $this->form_validation->set_rules('password','Password','required|max_length[20]');
            // $this->form_validation->set_rules('cpassword','Confirm Password','trim|required|matches[password]|max_length[20]');
            // $this->form_validation->set_rules('role','Role','trim|required|numeric');
            // $this->form_validation->set_rules('mobile','Mobile Number','required|min_length[10]');


            $name = $this->input->post('fname');
            $dob = ucwords(strtolower($this->security->xss_clean($this->input->post('dob'))));
            $nationality = ucwords(strtolower($this->security->xss_clean($this->input->post('nationality'))));
            $passport_exp_date = ucwords(strtolower($this->security->xss_clean($this->input->post('passport_expiration_date'))));
            $gender = ucwords(strtolower($this->security->xss_clean($this->input->post('gender'))));
            $passport_no = $this->input->post('passport_no');
            $visa_number = ucwords(strtolower($this->security->xss_clean($this->input->post('visa_number'))));
            $visa_status = strtolower($this->security->xss_clean($this->input->post('visa_status')));
            $visa_type = $this->input->post('visa_type');
            $date_of_issue = $this->input->post('date_of_issue');
            $entry_purpose = $this->input->post('entry_purpose');
            $date_of_issue = $this->input->post('date_of_issue');
            $remark = $this->input->post('remark');
            $visa_period = $this->input->post('visa_period');
            $issued_by = $this->input->post('issued_by');
            $no_entries = $this->input->post('no_entries');
            $appno = $this->input->post('appno');
            $visa_no = $this->security->xss_clean($this->input->post('visa_no'));


            //Check whether Member upload profile_img

            // die();
            if (!empty($_FILES['photo']['name'])) {
                $config['upload_path'] = './assets/';
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                $config['file_name'] = $_FILES['photo']['name'];
                $config['overwrite'] = TRUE;
                $config['encrypt_name'] = FALSE;
                $config['remove_spaces'] = TRUE;




                //Load upload library and initialize here configuration
                if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if ($this->upload->do_upload('photo')) {
                    $uploadData = $this->upload->data();
                    $profile_img = $uploadData['file_name'];
                    pre("here", $uploadData, $uploadData);
                } else {
                    $profile_img = '';
                }
            } else {
                pre("else 1");
                $profile_img = '';
            }


            $userInfo = array(
                'name' => strtoupper($name),
                'photo' => $profile_img,
                'dob' => $dob,
                'nationality' => $nationality,
                'entry_purpose' => $entry_purpose,
                'date_of_issue' => $date_of_issue,
                'passport_expiration_date' => $passport_exp_date,
                'passport_no' => $passport_no,
                'appno' => $appno,
                'visa_no' => $visa_no,
                'visa_number' => $visa_number,
                'gender' => $gender,
                'visa_status' => $visa_status,
                'remark' => $remark,
                'visa_period' => $visa_period,
                'issued_by' => $issued_by,
                'no_entries' => $no_entries,
                'visa_type' => $visa_type,
                'date_of_issue' => $date_of_issue,
                'createdBy' => $this->vendorId,
                'createdDtm' => date('Y-m-d H:i:s')
            );

            $this->load->model('user_model');
            $result = $this->user_model->addNewUser($userInfo);

            if ($result > 0) {
                $this->session->set_flashdata('success', 'New User created successfully!');
            } else {
                $this->session->set_flashdata('error', 'User creation failed');
            }

            redirect('addNew');
        }
    }


    /**
     * This function is used load user edit information
     * @param number $userId : Optional : This is user id
     */
    function editOld($userId = NULL)
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            if ($userId == null) {
                redirect('userListing');
            }
            $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
            $data['userInfo'] = $this->user_model->getUserInfo($userId);
            $data['countries'] =  $countries;
            $this->global['pageTitle'] = 'Edit user details';
            // pre($data['userInfo']);
            $this->loadViews("users/editOld", $this->global, $data, NULL);
        }
    }


    /**
     * This function is used to edit the user information
     */
    function editUser()
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $this->load->library('form_validation');
            $userId = $this->input->post('userId');
            $name = $this->input->post('fname');
            $dob = ucwords(strtolower($this->security->xss_clean($this->input->post('dob'))));
            $nationality = ucwords(strtolower($this->security->xss_clean($this->input->post('nationality'))));
            $passport_exp_date = ucwords(strtolower($this->security->xss_clean($this->input->post('passport_expiration_date'))));
            $gender = ucwords(strtolower($this->security->xss_clean($this->input->post('gender'))));
            $passport_no = $this->input->post('passport_no');
            $visa_number = ucwords(strtolower($this->security->xss_clean($this->input->post('visa_number'))));
            $visa_status = strtolower($this->security->xss_clean($this->input->post('visa_status')));
            $visa_type = $this->input->post('visa_type');
            $date_of_issue = $this->input->post('date_of_issue');
            $entry_purpose = $this->input->post('entry_purpose');
            $date_of_issue = $this->input->post('date_of_issue');
            $remark = $this->input->post('remark');
            $visa_period = $this->input->post('visa_period');
            $issued_by = $this->input->post('issued_by');
            $no_entries = $this->input->post('no_entries');
            $appno = $this->input->post('appno');
            $visa_no = $this->security->xss_clean($this->input->post('visa_no'));

            // if (!empty($_FILES['photo']['name'])) {
            //     $config['upload_path'] = './assets/';
            //     $config['allowed_types'] = 'jpg|jpeg|png|gif';
            //     $config['file_name'] = $_FILES['photo']['name'];
            //     $config['overwrite'] = TRUE;
            //     $config['encrypt_name'] = FALSE;
            //     $config['remove_spaces'] = TRUE;

            //     //Load upload library and initialize here configuration
            //     if (!is_dir($config['upload_path'])) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
            //     $this->load->library('upload', $config);
            //     $this->upload->initialize($config);

            //     if ($this->upload->do_upload('photo')) {
            //         $uploadData = $this->upload->data();
            //         $profile_img = $uploadData['file_name'];
            //     } else {
            //         $profile_img = '';
            //     }
            // } else {
                
            // // pre($_FILES['photo']);
            // // die();
            //     $profile_img = '';
            // }


            $userInfo = array(
                'name' => strtoupper($name),
                // 'photo' => $profile_img,
                'dob' => $dob,
                'nationality' => $nationality,
                'entry_purpose' => $entry_purpose,
                'date_of_issue' => $date_of_issue,
                'passport_expiration_date' => $passport_exp_date,
                'passport_no' => $passport_no,
                'appno' => $appno,
                'visa_no' => $visa_no,
                'visa_number' => $visa_number,
                'gender' => $gender,
                'visa_status' => $visa_status,
                'remark' => $remark,
                'visa_period' => $visa_period,
                'issued_by' => $issued_by,
                'no_entries' => $no_entries,
                'visa_type' => $visa_type,
                'date_of_issue' => $date_of_issue,
                'createdBy' => $this->vendorId,
                'createdDtm' => date('Y-m-d H:i:s')
            );


            $result = $this->user_model->editUser($userInfo, $userId);

            if ($result == true) {
                $this->session->set_flashdata('success', 'User updated successfully');
            } else {
                $this->session->set_flashdata('error', 'User updation failed');
            }

            redirect('userListing');
        }
    }



    /**
     * This function is used to delete the user using userId
     * @return boolean $result : TRUE / FALSE
     */
    function deleteUser()
    {
        if (!$this->isAdmin()) {
            echo (json_encode(array('status' => 'access')));
        } else {
            $userId = $this->input->post('userId');
            $userInfo = array('isDeleted' => 1, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->deleteUser($userId, $userInfo);

            if ($result > 0) {
                echo (json_encode(array('status' => TRUE)));
            } else {
                echo (json_encode(array('status' => FALSE)));
            }
        }
    }

    /**
     * Page not found : error 404
     */
    function pageNotFound()
    {
        $this->global['pageTitle'] = ' 404 - Page Not Found';

        $this->loadViews("general/404", $this->global, NULL, NULL);
    }

    /**
     * This function used to show login history
     * @param number $userId : This is user id
     */
    function loginHistoy($userId = NULL)
    {
        if (!$this->isAdmin()) {
            $this->loadThis();
        } else {
            $userId = ($userId == NULL ? 0 : $userId);

            $searchText = $this->input->post('searchText');
            $fromDate = $this->input->post('fromDate');
            $toDate = $this->input->post('toDate');

            $data["userInfo"] = $this->user_model->getUserInfoById($userId);

            $data['searchText'] = $searchText;
            $data['fromDate'] = $fromDate;
            $data['toDate'] = $toDate;

            $this->load->library('pagination');

            $count = $this->user_model->loginHistoryCount($userId, $searchText, $fromDate, $toDate);

            $returns = $this->paginationCompress("login-history/" . $userId . "/", $count, 10, 3);

            $data['userRecords'] = $this->user_model->loginHistory($userId, $searchText, $fromDate, $toDate, $returns["page"], $returns["segment"]);

            $this->global['pageTitle'] = ' User Login History';

            $this->loadViews("users/loginHistory", $this->global, $data, NULL);
        }
    }

    /**
     * This function is used to show users profile
     */
    function profile($active = "details")
    {
        $data["userInfo"] = $this->user_model->getUserInfoWithRole($this->vendorId);
        $data["active"] = $active;

        $this->global['pageTitle'] = $active == "details" ? ' My Profile' : ' Change Password';
        $this->loadViews("users/profile", $this->global, $data, NULL);
    }

    /**
     * This function is used to update the user details
     * @param text $active : This is flag to set the active tab
     */
    function profileUpdate($active = "details")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('fname', 'Full Name', 'trim|required|max_length[128]');
        $this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[128]|callback_emailExists');

        if ($this->form_validation->run() == FALSE) {
            $this->profile($active);
        } else {
            $name = ucwords(strtolower($this->security->xss_clean($this->input->post('fname'))));
            $mobile = $this->security->xss_clean($this->input->post('mobile'));
            $email = strtolower($this->security->xss_clean($this->input->post('email')));

            $userInfo = array('name' => $name, 'email' => $email, 'mobile' => $mobile, 'updatedBy' => $this->vendorId, 'updatedDtm' => date('Y-m-d H:i:s'));

            $result = $this->user_model->editUser($userInfo, $this->vendorId);

            if ($result == true) {
                $this->session->set_userdata('name', $name);
                $this->session->set_flashdata('success', 'Profile updated successfully');
            } else {
                $this->session->set_flashdata('error', 'Profile updation failed');
            }

            redirect('profile/' . $active);
        }
    }

    /**
     * This function is used to change the password of the user
     * @param text $active : This is flag to set the active tab
     */
    function changePassword($active = "changepass")
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('oldPassword', 'Old password', 'required|max_length[20]');
        $this->form_validation->set_rules('newPassword', 'New password', 'required|max_length[20]');
        $this->form_validation->set_rules('cNewPassword', 'Confirm new password', 'required|matches[newPassword]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->profile($active);
        } else {
            $oldPassword = $this->input->post('oldPassword');
            $newPassword = $this->input->post('newPassword');

            $resultPas = $this->user_model->matchOldPassword($this->vendorId, $oldPassword);

            if (empty($resultPas)) {
                $this->session->set_flashdata('nomatch', 'Your old password is not correct');
                redirect('profile/' . $active);
            } else {
                $usersData = array(
                    'password' => getHashedPassword($newPassword), 'updatedBy' => $this->vendorId,
                    'updatedDtm' => date('Y-m-d H:i:s')
                );

                $result = $this->user_model->changePassword($this->vendorId, $usersData);

                if ($result > 0) {
                    $this->session->set_flashdata('success', 'Password updation successful');
                } else {
                    $this->session->set_flashdata('error', 'Password updation failed');
                }

                redirect('profile/' . $active);
            }
        }
    }

    /**
     * This function is used to check whether email already exist or not
     * @param {string} $email : This is users email
     */
    function emailExists($email)
    {
        $userId = $this->vendorId;
        $return = false;

        if (empty($userId)) {
            $result = $this->user_model->checkEmailExists($email);
        } else {
            $result = $this->user_model->checkEmailExists($email, $userId);
        }

        if (empty($result)) {
            $return = true;
        } else {
            $this->form_validation->set_message('emailExists', 'The {field} already taken');
            $return = false;
        }

        return $return;
    }
}
