<?php
session_set_cookie_params(30);
session_start();
if (empty($_SESSION['name'])) {
    $_SESSION['name'] = 'Дима';
    $_SESSION['time'] = time();
    echo 'set name to session';
} else {
    echo 'name from session: ' . $_SESSION['name'] . ' was set ' . (time() - $_SESSION['time']) . ' seconds before';
}
