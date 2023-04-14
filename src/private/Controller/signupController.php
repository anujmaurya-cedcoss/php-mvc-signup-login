<?php
require_once('../../library/php-activerecord/ActiveRecord.php');
if (isset($_POST)) {
    $name = isset($_POST['name']) ? $_POST['name'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    $pass = isset($_POST['pass']) ? $_POST['pass'] : "";
    $repass = isset($_POST['repass']) ? $_POST['repass'] : "";
}
ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory('../Models');
    $cfg->set_connections(array('development' => 'mysql://root:secret@mysql-server/User'));
});
if($name != "" && $email != "" && $pass != "" && $pass == $repass) {
    User::create(array('name' => $name, 'email' => $email, 'password' => $pass));
    header('location:../View/login/login.php');
} else {

    header('location:../View/signup/signup.php?msg=Error');
}
?>