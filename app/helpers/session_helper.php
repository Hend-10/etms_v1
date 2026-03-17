<?php
session_start();

function flash($name = '', $message = '', $class = 'alert alert-success') {
    if(!empty($name)) {
        // SET: If message is passed, we are "sending" a notification
        if(!empty($message) && empty($_SESSION[$name])) {
            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        } 
        // DISPLAY: If no message is passed, we are "showing" the notification
        elseif(empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';
            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}