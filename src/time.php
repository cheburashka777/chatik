<?php
function vremya($message) {
    date_default_timezone_set('Asia/Yekaterinburg');
    $date = date('H:i d.m', $message);
    return $date;
}