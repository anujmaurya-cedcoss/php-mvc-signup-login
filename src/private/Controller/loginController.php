<?php require_once('../../library/php-activerecord/ActiveRecord.php');
ActiveRecord\Config::initialize(function ($cfg) {
    $cfg->set_model_directory('../Models');
    $cfg->set_connections(array('development' => 'mysql://root:secret@mysql-server/User'));
});
if (isset($_POST)) {
    $mail = $_POST['email'];
    $pwd = $_POST['password'];
}
// find if they exist in db or not
$row = User::find_by_sql("SELECT * FROM `users` WHERE `email` = '$mail' AND `password` = '$pwd'");
if ($row[0]->email == $mail && $row[0]->password == $pwd) {
    header('location:../View/success/success.php');
} else {
    header('location:../View/login/login.php?msg=Error');
}
?>