<?php

session_start();

$yourDomain = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}";
if(isset($_SESSION['yourDomain'])) $yourDomain = rtrim($_SESSION['yourDomain'], '/');

/**
 * The following variables determine the domain of the API and necessary credentials.
 */

if(!isset($_SESSION['apiDomain'])) $_SESSION['apiDomain'] = 'https://api.golfspot.io/golfdashboard/sso';

if(!isset($_SESSION['apiAccountCode'])) $_SESSION['apiAccountCode'] = '';

if (!isset($_SESSION['golfdashboardDomain'])) $_SESSION['golfdashboardDomain'] = 'https://{prefix}.golfdashboard.com';
