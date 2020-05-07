<?php

function isAdmin()
{
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user'] == 'admin') {
            $result = true;
        }  else {
            $result = false;
        }
    } else {
        $result = false;
    }

    return $result;
}
