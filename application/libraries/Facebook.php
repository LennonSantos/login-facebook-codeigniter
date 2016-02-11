<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
 
class Facebook {

    public function set_app(){

        $fb = new Facebook\Facebook([
          'app_id' => 'APP ID',
          'app_secret' => 'APP SECRET',
          'default_graph_version' => 'v2.5',
        ]);

        return $fb;

    }

    public function url_login($base_url, $permissions = ['email']){

        $fb = $this->set_app();

        $helper = $fb->getRedirectLoginHelper();
        $loginUrl = $helper->getLoginUrl("{$base_url}login/callback", $permissions);

        return $loginUrl;
    }

    public function callback(){

        $CI =& get_instance();
        $CI->load->library('session'); 

        $fb = $this->set_app();

        $helper = $fb->getRedirectLoginHelper();
        try 
        {
          $accessToken = $helper->getAccessToken();

          $CI->session->set_userdata('facebook_access_token', (string) $accessToken);
          $fb->setDefaultAccessToken($CI->session->userdata('facebook_access_token'));
          $response = $fb->get('/me?fields=id,name,email,first_name,middle_name,last_name,gender,link,locale,timezone');
          $userNode = $response->getGraphUser();
          //if Logged return array data user
          return $userNode; 

        } catch(Facebook\Exceptions\FacebookResponseException $e) {
          // When Graph returns an error
          return 'Graph returned an error: ' . $e->getMessage();
          exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
          // When validation fails or other local issues
          return 'Facebook SDK returned an error: ' . $e->getMessage();
          exit;
        }

    }

}