<?php
require_once APPROOT . '/views/includes/head.php';
?>

<div class="container">
        <input type="checkbox" id="flip">
        <div class="cover">
            <div class="front">
                <!-- <img src="" alt=""> -->
                <div class="text">
                    <span class="text-1">Start a new <br> Learning Path</span>
                    <span class="text-2">Let's get connected</span>
                </div>
            </div>
            <div class="back">
                <!-- <img class="backimg" src="" alt=""> -->
                <div class="text">
                    <span class="text-1">Only a few seconds <br>that takes</span>
                    <span class="text-2">Let's get started</span>
                </div>
            </div>
        </div>
        <div class="form">
            <div class="form-content">
                    <div class="login-form">
                        <form action="<?php echo URLROOT; ?>/users/login" method="POST" id="user_login_form">
                            <div class="title">Login</div>
                            <div class="input-boxes">
                                <div class="input-box">
                                    <input type="text" placeholder="Enter your email"
                                           name="useremail" required>
                                </div>
                                <div class="input-box">
                                    <input type="password" placeholder="Enter your password"
                                           name="password" required>
                                </div>
                                <div class="button input-box">
                                    <input type="submit" value="submit">
                                </div>
                                <div class="text sign-up-text">
                                    Don't have an account?<label for="flip">
                                        Sign up Now
                                    </label>
                                </div>
                            </div>
                        </form>
                    </div>


                <form action="<?php echo URLROOT; ?>/users/register" method="POST" id="user_register_form" enctype="multipart/form-data">
                    <div class="signup-form">
                        <div class="title">Sign Up</div>
                        <div class="input-boxes">
                            <div class="input-box">
                                <input type="text" placeholder="Enter your email"
                                       name="useremail" id="useremail" required
                                data-parsley-checkemail
                                data-parsley-checkemail-message='Email already exists'>
                            </div>

                            <div class="input-box">
                                <input type="password" placeholder="Enter your password" name="userpassword" id="userpassword" required>
                            </div>

                            <div class="input-box">
                                <input type="password" placeholder="Confirm your password" name="confirmuserpassword" id="confirmuserpassword" required>
                            </div>

                            <div class="input-box">
                                <input type="text" placeholder="Enter your name" name="username" id="username" required>
                            </div>
                            <select name="user_gender" id="user_gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <div class="input-box">
                                <input type="text" name="user_mobile_no" id="user_mobile_no" placeholder="Enter Phone Number" />
                            </div>
                            <div class="form-group">
                                <label>Select Profile Image</label>
                                <input type="file" name="user_image" id="user_image" />
                            </div>
                            <div class="button input-box">
                                <input type="submit" value="Sign Up">
                            </div>
                            <div class="text sign-up-text">
                                Already have an account?<label for="flip">
                                    Login now
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

