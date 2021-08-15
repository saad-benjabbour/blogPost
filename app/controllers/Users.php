<?php


class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->loadModel('User');
    }

    public function register()
    {
        $data = [
            'useremail' => '',
            'userpassword' => '',
            'confirmuserpassword' => '',
            'username' => '',
            'user_gender' => '',
            'user_mobile_no' => '',
            'user_image' => '',
            'userNameError' => '',
            'passwordError' => '',
            'confirmPasswordError' => '',
            'emailError' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            /*echo "-----------";
            print_r($_FILES);
            // print_r($data);
            echo "-----------";*/
            $file_path = '';
            if(isset($_FILES['user_image']))
            {
                // the user has uploaded an image
                $allowed = array('jpg', 'jpeg', 'gif', 'png');
                $file_name = $_FILES['user_image']['name'];
                $tmp = explode(".", $file_name);
                $file_extension = end($tmp);
                $file_temp = $_FILES['user_image']['tmp_name'];
                if(in_array($file_extension, $allowed) === true)
                {
                    $file_path = upload_user_image($file_temp, $file_extension);
                }else
                    echo implode('.', $allowed);

            }
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'useremail' => trim($_POST['useremail']),
                'userpassword' => trim($_POST['userpassword']),
                'confirmuserpassword' => trim($_POST['confirmuserpassword']),
                'username' => trim($_POST['username']),
                'user_gender' => trim($_POST['user_gender']),
                'user_mobile_no' => trim($_POST['user_mobile_no']),
                'user_image' => trim($file_path),
                'userNameError' => '',
                'passwordError' => '',
                'confirmPasswordError' => '',
                'emailError' => ''
            ];
            // the emptyness test is handled by html (required)
            // missmatch of passwords
            if($data['userpassword'] != $data['confirmuserpassword'])
            {
                $data['passwordError'] = "Passwords should match, try again";
            }

            if(empty($data['passwordError']))
            {
                $data['userpassword'] = password_hash($data['userpassword'], PASSWORD_DEFAULT);
                if($this->userModel->register($data))
                {
                    echo 'entering this';
                    header('Location:' . URLROOT . '/users/login');
                }
                else
                    die('the registration process is not working...');
            }
        }
        $this->loadView('users/login', $data);
    }

     // login the user
    public function login()
    {
        $data = [
            'useremail' => '',
            'password' => ''
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'useremail' => trim($_POST['useremail']),
                'password' => trim($_POST['password'])
            ];

            // the error checking should be added later
            $loggedInUser = $this->userModel->login($data['useremail'], $data['password']);
            if($loggedInUser)
            {
                // create a session for that user
                $this->createUserSession($loggedInUser);
            }else
            {
                die("password or username is not correct");

                $this->loadView('/users/login', $data);
            }
        }
        $this->loadView('/users/login', $data);
    }


    // creating session for each user that got connected
    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['useremail'] = $user->user_email_address;
        $_SESSION['username'] = $user->user_name;

        header('Location:' . URLROOT . '/posts/home');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['useremail']);
        unset($_SESSION['username']);
        header('Location:' . URLROOT . '/users/login');
    }




}