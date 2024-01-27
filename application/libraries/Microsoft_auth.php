<?php


class Microsoft_auth
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->config('microsoft');
    }

    public function getLoginUrl()
    {
        $client_id = $this->CI->config->item('microsoft_auth_app_id');
        $redirect_uri = $this->CI->config->item('microsoft_auth_redirect_uri');
        $scope = $this->CI->config->item('microsoft_auth_scopes');

        $login_url = "https://login.microsoftonline.com/common/oauth2/v2.0/authorize?";
	    $redirect_uri = base_url().$redirect_uri;
	    $login_url .= "?client_id=$client_id&redirect_uri=$redirect_uri&response_type=code&scope=$scope";

        return $login_url;
    }

    public function handleCallback()
    {
    	$client_id = $this->CI->config->item('microsoft_auth_app_id');
    	$client_secret = $this->CI->config->item('microsoft_auth_app_secret');
        $token_end_point = "https://login.microsoftonline.com/common/oauth2/v2.0/token";
        $redirect_uri = $this->CI->config->item('microsoft_auth_redirect_uri');
        $redirect_uri = base_url().$redirect_uri;
        $postData = array(
            'grant_type' => 'authorization_code',
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'code' => $_GET['code'],
        );

        $ch = curl_init($token_end_point);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        $token_data = json_decode($response, true);
        $access_token = $token_data['access_token'];
        
        if($access_token&&$access_token!=''){
            $graphApiEndpoint = "https://graph.microsoft.com/v1.0/me";

            $ch = curl_init($graphApiEndpoint);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Authorization: Bearer ' . $access_token,
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            curl_close($ch);

            $user_data = json_decode($response, true);
            return $user_data; // Return user data after successful authentication
        }else{
          	return false;
        }

        return false;
        
    }

    public function logout()
    {
        $redirect_logout_uri = $this->CI->config->item('redirect_logout_uri');
        $this->CI->session->sess_destroy();

        $redirect_logout_uri = base_url().$redirect_logout_uri;
        $logoutUrl = "https://login.microsoftonline.com/common/oauth2/v2.0/logout";
	    $logoutUrl .= "?post_logout_redirect_uri=" . urlencode($redirect_logout_uri);

        return $logoutUrl; // Return the logout URL
    }
}