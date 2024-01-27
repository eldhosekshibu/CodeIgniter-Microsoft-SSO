<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['microsoft_auth_app_id'] = 'your_app_id';
$config['microsoft_auth_app_secret'] = 'your_app_secret';
$config['microsoft_auth_redirect_uri'] = 'your_redirect_uri';
$config['redirect_logout_uri'] = 'your_redirect_uri';
$config['microsoft_auth_scopes'] = 'openid profile email user.read';