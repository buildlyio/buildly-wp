<?php

class B2S_Api_Network_Pinterest {

    public $cookie = array();
    public $csrf = '';
    public $appVersion = '';
    public $route = 'https://www.pinterest.com/';
    public $host = 'www.pinterest.com';
    public $origin = 'https://www.pinterest.com/';
    public $timeout = 25;

    public function __construct() {
        
    }

    public function setHeader($referer = '', $org = '', $type = 'GET', $request = false) {
        $header = array();
        $header['Cache-Control'] = 'max-age=0';
        $header['Connection'] = 'keep-alive';
        $header['Upgrade-Insecure-Requests'] = '1';
        $header['Referer'] = $referer;
        //old user-agent
        //$header['User-Agent'] = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:66.0) Gecko/20100101 Firefox/66.0';
        $header['User-Agent'] = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_12_2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/55.0.2883.95 Safari/537.36';
        if ($type == 'JSON') {
            $header['Content-Type'] = 'application/json;charset=UTF-8';
        } else {
            $header['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8;';
        }
        if ($request === true) {
            $header['X-Requested-With'] = 'XMLHttpRequest';
        }
        /* if ($org != '') {
          $header['Origin'] = $org;
          } */
        if (function_exists('gzdeflate')) {
            $header['Accept-Encoding'] = 'gzip, deflate';
        }
        $header['Accept-Language'] = 'en-US,en;q=0.5';
        $header['DNT'] = '1';
        $header['X-Pinterest-AppState'] = 'active';
        $header['X-NEW-APP'] = '1';
        $header['Accept'] = 'application/json, text/javascript, */*; q=0.01';
        $header['X-Requested-With'] = 'XMLHttpRequest';
        $header['Host'] = $this->host;
        $header['Origin'] = $this->origin;
        $header['X-CSRFToken'] = substr(md5(microtime()), rand(0, 26), 5);
        return $header;
    }

    public function setRoute() {
        $cookie = $this->cookie;
        $headerData = $this->setHeader('https://www.pinterest.com/');
        $requestData = array('headers' => $headerData, 'cookies' => $cookie, 'timeout' => $this->timeout);
        $result = wp_remote_get('https://www.pinterest.com/pinterest/', $requestData);
        if (is_wp_error($result)) {
            return array('error' => 1, 'error_pos' => 0, 'location' => 'setRoute', 'error_data' => serialize($result));
        }
        if ($result['response']['code'] == '302' && !empty($result['headers']['location'])) {
            $this->route = 'https://' . $this->cutFromTo($result['headers']['location'] . '/', "//", '/') . '/';
            return $this->route;
        }
        return $this->route;
    }

    public function authorize($username, $password) {
        $this->setRoute();
        $headerData = $this->setHeader($this->route . 'login/');
        //alternate routing
        //$headerData = $this->setHeader($this->route);
        $requestData = array('headers' => $headerData, 'timeout' => $this->timeout);
        $result = wp_remote_get($this->route . 'login/', $requestData);
        //alternate routing
        //$result = wp_remote_get($this->route, $requestData);

        if (is_wp_error($result)) {
            return array('error' => 1, 'error_pos' => 1, 'location' => $this->route . 'login/', 'error_data' => serialize($result));
        }
        $cookie = $result['cookies'];
        $content = $result['body'];
        $csrfToken = '';
        $appVersion = trim($this->cutFromTo($content, '"app_version": "', '"'));
        $fields = array('data' => '{"options":{"username_or_email":"' . $username . '","password":"' . addslashes(stripslashes($password)) . '"},"context":{"app_version":"' . $appVersion . '"}}', 'source_url' => '/login/', 'module_path' => 'App()>LoginPage()>Login()>Button(class_name=primary, text=Log in, type=submit, tagName=button, size=large)');
        //alternate routing
        //$fields = 'source_url=&data=%7B%22options%22%3A%7B%22username_or_email%22%3A%22'.  urlencode($username).'%22%2C%22password%22%3A%22'.  urlencode($password).'%22%7D%2C%22context%22%3A%7B%7D%7D';
        foreach ($cookie as $c) {
            if ($c->name == 'csrftoken') {
                $csrfToken = $c->value;
            }
        }
        if (empty($csrfToken)) {
            $error_data = trim(str_replace(array("\r\n", "\r", "\n"), " | ", strip_tags($this->cutFromTo($content, '</head>', '</body>'))));
            return array('error' => 1, 'error_pos' => 2, 'location' => $this->route . 'login/', 'error_data' => 'CSRF verification failed - RESPONSE: ' . serialize($error_data) . '  COOKIE: ' . serialize($cookie));
        }
        $headerData = $this->setHeader($this->route . 'login/', $this->route, 'POST', true);
        //alternate routing
        //$headerData = $this->setHeader($this->route, $this->route, 'POST', true);

        $headerData['X-APP-VERSION'] = $appVersion;
        $headerData['X-CSRFToken'] = $csrfToken;

        $requestData = array('headers' => $headerData, 'cookies' => $cookie, 'body' => $fields, 'timeout' => $this->timeout);
        $result = wp_remote_post($this->route . 'resource/UserSessionResource/create/', $requestData);
        if (is_wp_error($result)) {
            return array('error' => 1, 'error_pos' => 3, 'error_data' => serialize($result));
        }
        if (!empty($result['headers']['location'])) {
            $loc = $this->cutFromTo($result['headers']['location'], 'https://', '.pinterest');
            $headerData = $this->setHeader('https://' . $loc . '.pinterest.com/login/', 'https://' . $loc . '.pinterest.com', 'POST', true);
            $requestData = array('headers' => $headerData, 'cookies' => $cookie, 'body' => $fields, 'timeout' => $this->timeout);
            $result = wp_remote_post('https://' . $loc . '.pinterest.com/resource/UserSessionResource/create/', $requestData);
            if (is_wp_error($result)) {
                return array('error' => 1, 'error_pos' => 4, 'error_data' => serialize($result));
            }
        } else {
            $loc = 'www';
        }
        if (!empty($result['body'])) {
            $content = $result['body'];
            $response = json_decode($content, true);
        } else {
            return array('error' => 1, 'error_pos' => 5, 'error_data' => serialize($result));
        }
        if (is_array($response) && empty($response['resource_response']['error'])) {
            $this->cookie = $result['cookies'];
            return array('error' => 0, 'cookie_data' => serialize($this->cookie));
        } elseif (is_array($response) && isset($response['resource_response']['error'])) {
            return array('error' => 1, 'error_pos' => 6, 'error_data' => serialize($response['resource_response']['error']));
        } elseif (stripos($content, 'CSRF') !== false) {
            $error_data = trim(str_replace(array("\r\n", "\r", "\n"), " | ", strip_tags($this->cutFromTo($content, '</head>', '</body>'))));
            return array('error' => 1, 'error_pos' => 6, 'error_data' => 'CSRF verification failed ' . serialize($error_data));
        } elseif (stripos($content, 'suspicious activity') !== false) {
            return array('error' => 1, 'error_pos' => 6, 'error_data' => 'Pinterest blocked logins from this IP because of suspicious activity');
        } elseif (stripos($content, 'bot!') !== false) {
            return array('error' => 1, 'error_pos' => 6, 'error_data' => 'Pinterest has your ip in the list of potentially suspicious networks and blocked it');
        } else {
            $error_data = trim(str_replace(array("\r\n", "\r", "\n"), " | ", strip_tags($this->cutFromTo($content, '</head>', '</body>'))));
            return array('error' => 1, 'error_pos' => 6, 'error_data' => 'Pinterest login failed - unknown error ' . serialize($error_data));
        }
        return array('error' => 1, 'error_pos' => 7, 'error_data' => 'Pinterest login failed - unknown error');
    }

    public function cutFromTo($string, $from, $to) {
        $fstart = stripos($string, $from);
        $tmp = substr($string, $fstart + strlen($from));
        $flen = stripos($tmp, $to);
        return substr($tmp, 0, $flen);
    }

}
