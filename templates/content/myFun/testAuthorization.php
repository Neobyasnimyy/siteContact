<?php

function testAuthorization()
{
    if (session_status() == 1) {// если сессия закрыта, то открыть или продолжить
        session_start();
    }
    // если сессия не пустая, если в куки есть сессия id и она равна сессии записанной в массив сессии
    // и работаем с того же ip
    if ((count($_SESSION) != 0) and (isset($_COOKIE['name'])) and (($_COOKIE[session_name()] and ($_COOKIE[session_name()] == $_SESSION['Authorization']['id']) and $_SESSION['Authorization']['ip'] == $_SERVER['REMOTE_ADDR']))) {
        return true;
    } else {
        return false;
    }
}