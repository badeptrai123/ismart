<?php
session_start();
unset($_SESSION['is_login']);
unset($_SESSION['user_login']);
setcookie('is_login', true, time() - 3600);
redirect_to("?mod=users&action=login");