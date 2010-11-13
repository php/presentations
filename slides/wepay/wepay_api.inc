<?php
class WePay {
    const CK = 'f670ca415f673fb613cfcf6bc0bc20';
    const CS = '09f28ded59';

    private $oauth;
    private $apiurl = 'http://sandbox.wepayapi.com/v1';
    private $methods = array(
        'get'    => OAUTH_HTTP_METHOD_GET,
        'post'   => OAUTH_HTTP_METHOD_POST,
        'put'    => OAUTH_HTTP_METHOD_PUT,
        'delete' => OAUTH_HTTP_METHOD_DELETE);

    public function __construct($access_token,$access_secret) {
        try {
            $this->oauth = new OAuth(self::CK, self::CS, OAUTH_SIG_METHOD_HMACSHA1);
            $this->oauth->setToken($access_token, $access_secret);
            $this->oauth->enableDebug();
        } catch(OAuthException $E) {
            error_log($E->getMessage());
        }
    }

    public function __call($method, $args) {
        if(!isset($args[0])) { echo "Error - no API command provided"; return false; }
        $method = strtolower($method);
        $cmd = $args[0];
        if(!isset($args[1])) $send_data = null;
        else $send_data = $args[1];
        try { 
            $this->oauth->fetch($this->apiurl.$cmd, $send_data, $this->methods[$method]);
            return json_decode($this->oauth->getLastResponse())->result;
        } catch(OAuthException $E) {
            print_r($E->lastResponse);
            return false;
        }
    }

	public function raw_response() {
		return $this->oauth->getLastResponse();
	}
}

$tmp = unserialize(file_get_contents("/tmp/access_token.txt"));
$access_token = $tmp['oauth_token'];
$token_secret = $tmp['oauth_token_secret'];
