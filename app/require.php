<?php

    // requiring libraries from folder libraries
    require_once 'libraries/Core.php';
    require_once 'libraries/Controller.php';
    require_once 'libraries/Database.php';

    require_once 'helpers/session_helper.php';
    require_once 'helpers/image_uploading.php';
    require_once 'helpers/send_email.php';

    require_once 'class/class.phpmailer.php';
require 'class/dompdf/src/Exception.php';
    require_once 'config/config.php';
    require_once 'helpers/verify_email.php';
    // Instantiate core class
    $init = new Core();