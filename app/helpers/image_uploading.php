<?php

    function upload_user_image($file_temp, $file_extension)
    {
        $file_path = '../public/img/profile/' . substr(md5(time()), 0, 10) . '.' . $file_extension;
        move_uploaded_file($file_temp, $file_path);
        return $file_path;
    }

?>