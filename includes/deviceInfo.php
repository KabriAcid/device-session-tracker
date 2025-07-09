<?php
function getDeviceInfo()
{
    return [
        'device'    => $_SERVER['HTTP_USER_AGENT'],
        'browser'   => get_browser(null, true)['browser'] ?? 'Unknown',
        'os'        => PHP_OS,
        'ip'        => $_SERVER['REMOTE_ADDR'],
    ];
}
