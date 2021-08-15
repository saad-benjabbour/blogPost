<?php


$database = new Database;

if(isset($_GET['user'], $_GET['code']))
{
    if($_GET['type'] == 'user')
    {
        $verification_code = $_GET['code'];
        $isVerified = 'yes';

        $database->query('UPDATE user_table 
		SET user_email_verified = :verification
		WHERE user_verfication_code = :user_verification_code');
        $database->bind(':verification', $isVerified);
        $database->bind(':user_verification_code', $verification_code);

        if(!$database->execute())
        {
            echo 'the update query not working...';
        }

    }

    }
