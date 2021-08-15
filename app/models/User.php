<?php


class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    // register the user
    public function register($data)
    {
        // print_r($data);
        $user_verfication_code = md5(rand());
        $receiver_email = $data['useremail'];
        echo $data['useremail'];
        $this->db->query('
			INSERT INTO user_table 
			(user_email_address, user_password, user_verfication_code, user_name, user_gender, user_mobile_no, user_image, user_created_on)
			VALUES 
			(:user_email_address, :user_password, :user_verfication_code, :user_name, :user_gender, :user_mobile_no, :user_image, now())
			');
        $this->db->bind(':user_email_address', $data['useremail']);
        $this->db->bind(':user_password', $data['userpassword']);
        $this->db->bind(':user_verfication_code', $user_verfication_code);
        $this->db->bind(':user_name', $data['username']);
        $this->db->bind(':user_gender', $data['user_gender']);
        $this->db->bind(':user_mobile_no', $data['user_mobile_no']);
        $this->db->bind(':user_image', $data['user_image']);

        if($this->db->execute())
            echo 'success';
        else
            return false;


        // defining the mail
        $subject = 'Online Examination Registration Verification';
        $body = '
			<p>Thank you for registering.</p>
			<p>This is a verification eMail, please click the link to verify your eMail address by clicking this <a href="<?php echo URLROOT ;?>/app/helpers/verify_email.php?type=user&code='.$user_verfication_code.'" target="_blank""><b>link</b></a>.</p>
			<p>In case if you have any difficulty please eMail us.</p>
			<p>Thank you,</p>
			<p>Online Examination System</p>
			';

        send_email($receiver_email, $subject, $body);
        return true;
    }

    // login the user
    public function login($useremail, $password)
    {
        $this->db->query('SELECT * FROM user_table WHERE user_email_address = :useremail');
        $this->db->bind('useremail', $useremail);

        $row = $this->db->single();
        // echo "$row";
        $hashedPassword = $row->user_password;
        // echo $hashedPassword;
        if(password_verify($password, $hashedPassword))
        {
            return $row;
        }else
            return false;
    }

}