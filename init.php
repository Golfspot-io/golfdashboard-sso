<?php

session_start();

$yourDomain = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}";

/**
 * The following variables determine the domain of the API and necessary credentials.
 */

if(!isset($_SESSION['apiDomain'])) $_SESSION['apiDomain'] = 'https://api.golfspot.com/golfdashboard/sso';

if(!isset($_SESSION['apiAccountCode'])) $_SESSION['apiAccountCode'] = '';
