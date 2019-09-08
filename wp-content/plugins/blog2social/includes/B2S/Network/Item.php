<?php

class B2S_Network_Item {

    private $authurl;
    private $allowProfil;
    private $allowPage;
    private $allowGroup;
    private $modifyBoardAndGroup;
    private $networkKindName;
    private $oAuthPortal;
    private $mandantenId;
    private $bestTimeInfo;
    private $lang;
    private $options;
    private $userSchedData; // >5.1.0
    private $userSchedDataOld; // <5.1.0

    public function __construct($load = true) {
        $this->mandantenId = array(-1, 0); //All,Default
        if ($load) {
            $this->options = new B2S_Options(B2S_PLUGIN_BLOG_USER_ID);
            $this->userSchedData = $this->options->_getOption('auth_sched_time');
            if (!isset($this->userSchedData['time'])) {
                $this->userSchedDataOld = $this->getSchedDataByUser();
            }
            $hostUrl = (function_exists('rest_url')) ? rest_url() : get_site_url();
            $this->authurl = B2S_PLUGIN_API_ENDPOINT_AUTH . '?b2s_token=' . B2S_PLUGIN_TOKEN . '&sprache=' . substr(B2S_LANGUAGE, 0, 2) . '&unset=true&hostUrl=' . $hostUrl;
            $this->allowProfil = unserialize(B2S_PLUGIN_NETWORK_ALLOW_PROFILE);
            $this->allowPage = unserialize(B2S_PLUGIN_NETWORK_ALLOW_PAGE);
            $this->allowGroup = unserialize(B2S_PLUGIN_NETWORK_ALLOW_GROUP);
            $this->oAuthPortal = unserialize(B2S_PLUGIN_NETWORK_OAUTH);
            $this->bestTimeInfo = unserialize(B2S_PLUGIN_SCHED_DEFAULT_TIMES_INFO);
            $this->modifyBoardAndGroup = unserialize(B2S_PLUGIN_NETWORK_ALLOW_MODIFY_BOARD_AND_GROUP);
            $this->networkKindName = unserialize(B2S_PLUGIN_NETWORK_KIND);
            $this->lang = substr(B2S_LANGUAGE, 0, 2);
        }
    }

    public function getData() {
//        $result = json_decode('{"result":1,"auth":[{"networkAuthId":"397945","networkId":"1","networkUserName":"KelvinS Onlineshop","networkType":"1","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3261","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"430634","networkId":"1","networkUserName":"KelvinS Onlineshop","networkType":"1","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3547","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"397941","networkId":"1","networkUserName":"KelvinS Onlineshop","networkType":"1","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3260","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"431588","networkId":"1","networkUserName":"Kleidung verkaufen","networkType":"2","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3559","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"430633","networkId":"1","networkUserName":"Kleidung verkaufen","networkType":"2","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3547","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"397942","networkId":"2","networkUserName":"KelvinS_Shop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3260","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"397946","networkId":"2","networkUserName":"KelvinS_Shop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3261","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"430632","networkId":"2","networkUserName":"KelvinS_Shop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3547","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"397943","networkId":"12","networkUserName":"info@kelvinsonlineshop.de","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3260","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"397947","networkId":"12","networkUserName":"info@kelvinsonlineshop.de","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3261","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"397948","networkId":"18","networkUserName":"KelvinS Onlineshop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3261","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"397944","networkId":"18","networkUserName":"KelvinS Onlineshop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3260","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"430640","networkId":"18","networkUserName":"KelvinS Onlineshop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3547","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"430637","networkId":"4","networkUserName":"kelvins-onlineshop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3547","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false},{"networkAuthId":"430638","networkId":"15","networkUserName":"KelvinS_Onlineshop","networkType":"0","networkKind":"0","networkTosGroupId":"","instant_sharing":"0","mandantId":"3547","expiredDate":"0000-00-00","owner_blog_user_id":false,"notAllow":false}],"auth_count":[5],"portale":[{"id":"1","name":"Facebook"},{"id":"2","name":"Twitter"},{"id":"12","name":"Instagram"},{"id":"6","name":"Pinterest"},{"id":"18","name":"Google My Business"},{"id":"3","name":"LinkedIn"},{"id":"19","name":"XING"},{"id":"17","name":"VKontakte"},{"id":"16","name":"Bloglovin"},{"id":"4","name":"Tumblr"},{"id":"11","name":"medium"},{"id":"14","name":"Torial"},{"id":"7","name":"Flickr"},{"id":"9","name":"Diigo"},{"id":"15","name":"Reddit"}],"mandanten":[]}');//B2S_Api_Post::post(B2S_PLUGIN_API_ENDPOINT, array('action' => 'getUserAuth', 'view_mode' => 'all', 'auth_count' => true, 'token' => B2S_PLUGIN_TOKEN, 'version' => B2S_PLUGIN_VERSION)));
        $result = json_decode(B2S_Api_Post::post(B2S_PLUGIN_API_ENDPOINT, array('action' => 'getUserAuth', 'view_mode' => 'all', 'auth_count' => true, 'token' => B2S_PLUGIN_TOKEN, 'version' => B2S_PLUGIN_VERSION)));
        return array('mandanten' => isset($result->mandanten) ? $result->mandanten : '',
            'auth' => isset($result->auth) ? $result->auth : '',
            'auth_count' => isset($result->auth_count) ? $result->auth_count : false,
            'portale' => isset($result->portale) ? $result->portale : '');
    }

    public function getCountSchedPostsByUserAuth($networkAuthId = 0) {
        global $wpdb;
        $countSched = $wpdb->get_results($wpdb->prepare("SELECT COUNT(b.id) AS count FROM b2s_posts b LEFT JOIN b2s_posts_network_details d ON (d.id = b.network_details_id) WHERE d.network_auth_id= %d AND b.hide = %d AND b.sched_date !=%s", $networkAuthId, 0, '0000-00-00 00:00:00'));
        if (is_array($countSched) && !empty($countSched) && isset($countSched[0]->count)) {
            if ((int) $countSched[0]->count > 0) {
                return (int) $countSched[0]->count;
            }
        }
        return false;
    }

    public function getSelectMandantHtml($data) {
        $select = '<select class="form-control b2s-network-mandant-select b2s-select">';
        $select .= '<optgroup label="' . __("Default", "blog2social") . '"><option value="-1" selected="selected">' . __('Show all', 'blog2social') . '</option>';
        $select .= '<option value="0">' . __('My profile', 'blog2social') . '</option></optgroup>';
        if (!empty($data)) {
            $select .='<optgroup id="b2s-network-select-more-client" label="' . __("Your profiles:", "blog2social") . '">';
            foreach ($data as $id => $name) {
                $select .= '<option value="' . $id . '">' . stripslashes($name) . '</option>';
            }
            $select .='</optgroup>';
        }
        $select .= '</select>';
        return $select;
    }

    public function getPortale($mandanten, $auth, $portale, $auth_count) {
        $convertAuthData = $this->convertAuthData($auth);

        foreach ($mandanten as $k => $v) {
            $this->mandantenId[] = $k;
        }

        $html = '<div class="col-md-12 b2s-network-details-container">';
        $html .= '<form id = "b2sSaveTimeSettings" method = "post">';
        $html .= '<input id = "action" type = "hidden" value = "b2s_save_user_time_settings" name = "action">';

        foreach ($this->mandantenId as $k => $mandant) {
            $html .= $this->getItemHtml($mandant, $mandanten, $convertAuthData, $portale, $auth_count);
        }
        $html .='</form>';
        $html .= '</div>';
        return $html;
    }

    public function getItemHtml($mandant, $mandantenData, $convertAuthData, $portale, $auth_count) {

        $html = '<ul class="list-group b2s-network-details-container-list" data-mandant-id="' . $mandant . '" style="display:' . ($mandant > 0 ? "none" : "block" ) . '">';
        foreach ($portale as $k => $portal) {
            if (!isset($convertAuthData[$mandant][$portal->id]) || empty($convertAuthData[$mandant][$portal->id])) {
                $convertAuthData[$mandant][$portal->id] = array();
            }
            $maxNetworkAccount = ($auth_count !== false && is_array($auth_count)) ? ((isset($auth_count[$portal->id])) ? $auth_count[$portal->id] : $auth_count[0]) : false;

            if ($mandant == -1) { //all
                $html .= $this->getPortaleHtml($portal->id, $portal->name, $mandant, $mandantenData, $convertAuthData, $maxNetworkAccount, true);
            } else {
                $html .= $this->getPortaleHtml($portal->id, $portal->name, $mandant, $mandantenData, $convertAuthData[$mandant][$portal->id], $maxNetworkAccount);
            }
        }
        $html .= '</ul>';

        return $html;
    }

    private function getPortaleHtml($networkId, $networkName, $mandantId, $mandantenData, $networkData, $maxNetworkAccount = false, $showAllAuths = false) {
        $containerMandantId = $mandantId;
        $mandantId = ($mandantId == -1) ? 0 : $mandantId;
        $sprache = substr(B2S_LANGUAGE, 0, 2);
        $html = '<li class="list-group-item" data-network-id="' . $networkId . '">';
        $html .='<div class="media">';
        if ($networkId != 8) {
            $html .='<img class="pull-left hidden-xs b2s-img-network" alt="' . $networkName . '" src="' . plugins_url('/assets/images/portale/' . $networkId . '_flat.png', B2S_PLUGIN_FILE) . '">';
        } else {
            $html .='<span class="pull-left hidden-xs b2s-img-network"></span>';
        }
        $html .='<div class="media-body network">';

        $html .= '<h4>' . ucfirst($networkName);

        if ($maxNetworkAccount !== false) {
            if ($networkId == 18) {
                $html .=' <a class="b2s-info-btn" data-target="#b2sInfoNetwork18" data-toggle="modal" href="#">Info</a>';
            }
        }
        if (isset($this->bestTimeInfo[$networkId]) && !empty($this->bestTimeInfo[$networkId]) && is_array($this->bestTimeInfo[$networkId]) && $networkId != 8) {
            $time = '';
            $slug = ($this->lang == 'de') ? __('Uhr', 'blog2social') : '';
            foreach ($this->bestTimeInfo[$networkId] as $k => $v) {
                $time .= B2S_Util::getTimeByLang($v[0], $this->lang) . '-' . B2S_Util::getTimeByLang($v[1], $this->lang) . $slug . ', ';
            }
            $html .= '<span class="hidden-xs hidden-sm b2s-sched-manager-best-time-info">(' . __('Best times', 'blog2social') . ': ' . substr($time, 0, -2) . ')</span>';
        }

        $html .= '<span class="pull-right">';

        $b2sAuthUrl = $this->authurl . '&portal_id=' . $networkId . '&transfer=' . (in_array($networkId, $this->oAuthPortal) ? 'oauth' : 'form' ) . '&mandant_id=' . $mandantId . '&version=3&affiliate_id=' . B2S_Tools::getAffiliateId();

        if (in_array($networkId, $this->allowProfil)) {
            $html .= ($networkId != 18 || (B2S_PLUGIN_USER_VERSION >= 2 && $networkId == 18)) ? '<a href="#" onclick="wop(\'' . $b2sAuthUrl . '&choose=profile\', \'Blog2Social Network\'); return false;" class="btn btn-primary btn-sm b2s-network-auth-btn">+ ' . __('Profile', 'blog2social') . '</a>' : '<a href="#" class="btn btn-primary btn-sm b2s-network-auth-btn b2s-btn-disabled" data-title="' . __('You want to connect a network profile?', 'blog2social') . '" data-toggle="modal"  data-type="auth-network" data-target="#b2sProFeatureModal">+ ' . __('Profile', 'blog2social') . ' <span class="label label-success">' . __("PREMIUM", "blog2social") . '</a>';
        }
        if (in_array($networkId, $this->allowPage)) {
            $html .= (B2S_PLUGIN_USER_VERSION > 1 || (B2S_PLUGIN_USER_VERSION == 0 && $networkId == 1) || (B2S_PLUGIN_USER_VERSION == 1 && ($networkId == 1 || $networkId == 10))) ? '<button onclick="wop(\'' . $b2sAuthUrl . '&choose=page\', \'Blog2Social Network\'); return false;" class="btn btn-primary btn-sm b2s-network-auth-btn">+ ' . __('Page', 'blog2social') . '</button>' : '<a href="#" class="btn btn-primary btn-sm b2s-network-auth-btn b2s-btn-disabled" data-title="' . __('You want to connect a network page?', 'blog2social') . '" data-toggle="modal"  data-type="auth-network" data-target="#' . ((B2S_PLUGIN_USER_VERSION == 0) ? 'b2sPreFeatureModal' : 'b2sProFeatureModal') . '">+ ' . __('Page', 'blog2social') . ' <span class="label label-success">' . __("PREMIUM", "blog2social") . '</a>';
        }
        if (in_array($networkId, $this->allowGroup)) {
            $name = ($networkId == 11) ? __('Publication', 'blog2social') : __('Group', 'blog2social');
            $html .= (B2S_PLUGIN_USER_VERSION > 1 || (B2S_PLUGIN_USER_VERSION == 1 && $networkId != 8)) ? '<button  onclick="wop(\'' . $b2sAuthUrl . '&choose=group\', \'Blog2Social Network\'); return false;" class="btn btn-primary btn-sm b2s-network-auth-btn">+ ' . $name . '</button>' : '<a href="#" class="btn btn-primary btn-sm b2s-network-auth-btn b2s-btn-disabled" data-toggle="modal" data-title="' . __('You want to connect a social media group?', 'blog2social') . '" data-type="auth-network" data-target="#' . ((B2S_PLUGIN_USER_VERSION == 0) ? 'b2sPreFeatureModal' : 'b2sProFeatureModal') . '">+ ' . $name . ' <span class="label label-success">' . __("PREMIUM", "blog2social") . '</span></a>';
        }
        if (array_key_exists($networkId, unserialize(B2S_PLUGIN_NETWORK_SETTINGS_TEMPLATE_DEFAULT))) {
            $html .= (B2S_PLUGIN_USER_VERSION >= 1) ? '<button onclick="return false;" class="btn btn-primary btn-sm b2s-network-auth-btn b2s-edit-template-btn" data-network-id="' . $networkId . '"><i class="glyphicon glyphicon-pencil"></i> ' . __('Edit Post Format', 'blog2social') . '</button>' : '<button onclick="return false;" class="btn btn-primary btn-sm b2s-network-auth-btn b2s-edit-template-btn b2s-btn-disabled" data-network-id="' . $networkId . '"><i class="glyphicon glyphicon-pencil"></i> ' . __('Edit Post Template', 'blog2social') . ' <span class="label label-success">' . __("PREMIUM", "blog2social") . '</span></button>';
        }

        $html .= '</span></h4>';


        $html .= '<div class="clearfix"></div>';
        $html .= '<ul class="b2s-network-item-auth-list" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" ' . (($showAllAuths) ? 'data-network-count="true"' : '') . '>';

        //First Line
        $html.='<li class="b2s-network-item-auth-list-li"  data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-view="' . (($containerMandantId == -1) ? 'all' : 'selected') . '">';
        $html.='<span class="b2s-network-auth-count">' . __("Connections", "blog2social") . ' <span class="b2s-network-auth-count-current" ' . (($showAllAuths) ? 'data-network-count-trigger="true"' : '') . '  data-network-id="' . $networkId . '"></span>/' . $maxNetworkAccount . '</span>';
        $html.='<span class="pull-right b2s-sched-manager-title hidden-xs"  data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '">' . __("Best Time Manager", "blog2social") . ' <a href="#" data-toggle="modal" data-target="#b2sInfoSchedTimesModal" class="b2s-info-btn b2s-load-settings-sched-time-default-info">' . __('Info', 'blog2social') . '</a></span>';
        $html.='</li>';


        if ($showAllAuths) {
            foreach ($this->mandantenId as $ka => $mandantAll) {
                $mandantName = isset($mandantenData->{$mandantAll}) ? ($mandantenData->{$mandantAll}) : __("My profile", "blog2social");
//                var_dump($networkData);
                if (isset($networkData[$mandantAll][$networkId]) && !empty($networkData[$mandantAll][$networkId])) {
                    $html .= $this->getAuthItemHtml($networkData[$mandantAll][$networkId], $mandantAll, $mandantName, $networkId, $b2sAuthUrl, $containerMandantId, $sprache);
                }
            }
        } else {
            $html .= $this->getAuthItemHtml($networkData, $mandantId, "", $networkId, $b2sAuthUrl, $containerMandantId, $sprache);
        }
//        exit;
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</li>';
        return $html;
    }

    private function getAuthItemHtml($networkData = array(), $mandantId, $mandantName, $networkId, $b2sAuthUrl = '', $containerMandantId = 0, $sprache = 'en') {
        $isEdit = false;
        $html = '';
        if (isset($networkData[0])) {
            foreach ($networkData[0] as $k => $v) {

                $isDeprecated = false;
                $notAllow = ($v['notAllow'] !== false) ? true : false;
                $isInterrupted = ($v['expiredDate'] != '0000-00-00' && $v['expiredDate'] <= date('Y-m-d')) ? true : false;


                $html .= '<li class="b2s-network-item-auth-list-li ' . (($isDeprecated) ? 'b2s-label-info-border-left deprecated' : (($notAllow) ? 'b2s-label-warning-border-left' : (($isInterrupted) ? 'b2s-label-danger-border-left' : ''))) . ' " data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="0">';
                $html .='<div class="pull-left">';

                if ($notAllow) {
                    $html.= '<div class="b2s-network-auth-list-info"><span class="glyphicon glyphicon-remove-circle"></span> ' . __('To reactivate this connection,', 'blog2social') . ' <a href="' . B2S_Tools::getSupportLink('affiliate') . '"target="_blank">' . __('please upgrade', 'blog2social') . '</a></div>';
                }
                if ($isInterrupted && !$notAllow) {
                    $html.= '<div class="b2s-network-auth-list-info"><span class="glyphicon glyphicon-remove-circle"></span> ' . __('Authorization is interrupted since', 'blog2social') . ' ' . ($sprache == 'en' ? $v['expiredDate'] : date('d.m.Y', strtotime($v['expiredDate']))) . '</div>';
                }
                if ($v['owner_blog_user_id'] !== false) {
                    $displayName = stripslashes(get_user_by('id', $v['owner_blog_user_id'])->display_name);
                    $html .='<div class="b2s-network-approved-from">' . __("Assigned by", "blog2social") . ' ' . ((empty($displayName) || $displayName == false) ? __("Unknown username", "blog2social") : $displayName) . '</div> ';
                }
                $html .= '<span class="b2s-network-item-auth-type">' . (($isDeprecated) ? '<span class="glyphicon glyphicon-exclamation-sign glyphicon-info"></span> ' : '') . __('Profile', 'blog2social') . '</span>: <span class="b2s-network-item-auth-user-name">' . stripslashes($v['networkUserName']) . '</span> ';

                if (!empty($mandantName)) {
                    $html .='<span class="b2s-network-mandant-name">(' . $mandantName . ')</span> ';
                }

                $html .='</div>';

                $html .='<div class="pull-right">';
                $html .= '<a class="b2s-network-item-auth-list-btn-delete b2s-add-padding-network-delete pull-right" data-network-type="0" data-network-id="' . $networkId . '" data-network-auth-id="' . $v['networkAuthId'] . '" href="#"><span class="glyphicon  glyphicon-trash glyphicon-grey"></span></a>';
                if (!$notAllow && !$isDeprecated) {
                    if ($v['owner_blog_user_id'] == false) {
                        $html .= '<a href="#" onclick="wop(\'' . $b2sAuthUrl . '&choose=profil&update=' . $v['networkAuthId'] . '\', \'Blog2Social Network\'); return false;" class="b2s-network-auth-btn b2s-network-auth-update-btn b2s-add-padding-network-refresh pull-right" data-network-auth-id="' . $v['networkAuthId'] . '"><span class="glyphicon  glyphicon-refresh glyphicon-grey"></span></a>';
                    } else {
                        $html .= '<span class="b2s-add-padding-network-placeholder-btn pull-right"></span>';
                    }
                    $html .='<a href="#" class="pull-right b2s-network-item-team-btn-manage b2s-add-padding-network-team pull-right" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-id="' . $networkId . '" data-network-type="0" data-network-mandant-id="' . $mandantId . '" data-connection-owner="' . (($v['owner_blog_user_id'] !== false) ? $v['owner_blog_user_id'] : '0') . '"><span class="glyphicon glyphicon-user glyphicon-grey"></span></a>';
                    if ($v['expiredDate'] == '0000-00-00' || $v['expiredDate'] > date('Y-m-d')) {
                        if (isset($this->modifyBoardAndGroup[$networkId])) {
                            if (in_array(0, $this->modifyBoardAndGroup[$networkId]['TYPE'])) {
                                $html .='<a href="#" class="pull-right b2s-modify-board-and-group-network-btn b2s-add-padding-network-edit" data-modal-title="' . $this->modifyBoardAndGroup[$networkId]['TITLE'] . '" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-id="' . $networkId . '" data-network-type="0"><span class="glyphicon glyphicon-pencil glyphicon-grey"></span></a>';
                                $isEdit = true;
                            }
                        }
                    }
                }
                //Sched Manager since V 5.1.0
                if (B2S_PLUGIN_USER_VERSION > 0) {
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-time-area pull-right ' . (!$isEdit ? 'b2s-sched-manager-add-padding' : '') . ' hidden-xs" style="' . (($notAllow) ? 'display:none;' : '') . '">
                        <input class="form-control b2s-box-sched-time-input b2s-settings-sched-item-input-time" type="text" value="' . $this->getUserSchedTime($v['networkAuthId'], $networkId, 0, 'time') . '" readonly="" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="0" data-network-container-mandant-id="' . $containerMandantId . '" name="b2s-user-sched-data[time][' . $v['networkAuthId'] . ']">
                        </span>';
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-day-area pull-right hidden-xs" style="' . (($notAllow) ? 'display:none;' : '') . '"><span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-item-input-day-btn-minus" data-network-auth-id="' . $v['networkAuthId'] . '">-</span> <span class="b2s-text-middle">+</span> <input type="text" class="b2s-sched-manager-item-input-day" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="0"  data-network-container-mandant-id="' . $containerMandantId . '" name="b2s-user-sched-data[delay_day][' . $v['networkAuthId'] . ']" value="' . $this->getUserSchedTime($v['networkAuthId'], $networkId, 0, 'day') . '" readonly> <span class="b2s-text-middle">' . __('Days', 'blog2social') . '</span> <span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-item-input-day-btn-plus" data-network-auth-id="' . $v['networkAuthId'] . '">+</span></span>';
                } else {
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-premium-area pull-right hidden-xs"><span class="label label-success"><a href="#" class="btn-label-premium" data-toggle="modal" data-target="#b2sInfoSchedTimesModal">' . __('PREMIUM', 'blog2social') . '</a></span></span>';
                }

                $html .='</div>';

                $html .= '<div class="clearfix"></div></li>';
            }
        }
        if (isset($networkData[1])) {
            foreach ($networkData[1] as $k => $v) {

                $isDeprecated = false;
                $notAllow = ($v['notAllow'] !== false) ? true : false;
                $isInterrupted = ($v['expiredDate'] != '0000-00-00' && $v['expiredDate'] <= date('Y-m-d')) ? true : false;

                $html .= '<li class="b2s-network-item-auth-list-li ' . (($isDeprecated) ? 'b2s-label-info-border-left deprecated' : (($notAllow) ? 'b2s-label-warning-border-left' : (($isInterrupted) ? 'b2s-label-danger-border-left' : ''))) . '" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="1">';
                $html .='<div class="pull-left">';

                if ($notAllow) {
                    $html.= '<div class="b2s-network-auth-list-info"><span class="glyphicon glyphicon-remove-circle"></span> ' . __('To reactivate this connection,', 'blog2social') . ' <a href="' . B2S_Tools::getSupportLink('affiliate') . '"target="_blank">' . __('please upgrade', 'blog2social') . '</a></div>';
                }
                if ($isInterrupted && !$notAllow) {
                    $html.= '<div class="b2s-network-auth-list-info">' . __('Authorization is interrupted since', 'blog2social') . ' ' . ($sprache == 'en' ? $v['expiredDate'] : date('d.m.Y', strtotime($v['expiredDate']))) . '</div>';
                }
                if ($v['owner_blog_user_id'] !== false) {
                    $displayName = stripslashes(get_user_by('id', $v['owner_blog_user_id'])->display_name);
                    $html .='<div class="b2s-network-approved-from">' . __("Assigned by", "blog2social") . ' ' . ((empty($displayName) || $displayName == false) ? __("Unknown username", "blog2social") : $displayName) . '</div> ';
                }
                $html .= '<span class="b2s-network-item-auth-type">' . (($isDeprecated) ? '<span class="glyphicon glyphicon-exclamation-sign glyphicon-info"></span> ' : '') . ($networkId == 19 && isset($this->networkKindName[$v['networkKind']]) ? $this->networkKindName[$v['networkKind']] . '-' : '') . __('Page', 'blog2social') . (($networkId == 19 && (int) $v['networkKind'] == 0) ? ' <span class="hidden-xs">(' . __('Employer Branding', 'blog2social') . ')</span>' : '') . '</span>: <span class="b2s-network-item-auth-user-name">' . stripslashes($v['networkUserName']) . '</span> ';

                if (!empty($mandantName)) {
                    $html .='<span class="b2s-network-mandant-name">(' . $mandantName . ')</span> ';
                }

                $html .='</div>';
                $html .='<div class="pull-right">';
                $html .= '<a class="b2s-network-item-auth-list-btn-delete b2s-add-padding-network-delete pull-right" data-network-type="1" data-network-id="' . $networkId . '" data-network-auth-id="' . $v['networkAuthId'] . '" href="#"><span class="glyphicon  glyphicon-trash glyphicon-grey"></span></a>';
                if (!$notAllow && !$isDeprecated) {
                    if ($v['owner_blog_user_id'] == false) {
                        $html .= '<a href="#" onclick="wop(\'' . $b2sAuthUrl . '&choose=page&update=' . $v['networkAuthId'] . '\', \'Blog2Social Network\'); return false;" class="b2s-network-auth-btn b2s-network-auth-update-btn b2s-add-padding-network-refresh pull-right" data-network-auth-id="' . $v['networkAuthId'] . '"><span class="glyphicon  glyphicon-refresh glyphicon-grey"></span></a>';
                    } else {
                        $html .= '<span class="b2s-add-padding-network-placeholder-btn pull-right"></span>';
                    }

                    $html .='<a href="#" class="pull-right b2s-network-item-team-btn-manage b2s-add-padding-network-team pull-right" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-id="' . $networkId . '" data-network-type="1" data-network-mandant-id="' . $mandantId . '" data-connection-owner="' . (($v['owner_blog_user_id'] !== false) ? $v['owner_blog_user_id'] : '0') . '"><span class="glyphicon glyphicon-user glyphicon-grey"></span></a>';
                    if ($v['expiredDate'] == '0000-00-00' || $v['expiredDate'] > date('Y-m-d')) {
                        if (isset($this->modifyBoardAndGroup[$networkId])) {
                            if (in_array(1, $this->modifyBoardAndGroup[$networkId]['TYPE'])) {
                                $html .='<a href="#" class="pull-right b2s-modify-board-and-group-network-btn b2s-add-padding-network-edit" data-modal-title="' . $this->modifyBoardAndGroup[$networkId]['TITLE'] . '" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-id="' . $networkId . '" data-network-type="1"><span class="glyphicon glyphicon-pencil glyphicon-grey"></span></a>';
                                $isEdit = true;
                            }
                        }
                    }
                }

                //Sched Manager since V 5.1.0
                if (B2S_PLUGIN_USER_VERSION > 0) {
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-time-area pull-right ' . (!$isEdit ? 'b2s-sched-manager-add-padding' : '') . ' hidden-xs" style="' . (($notAllow) ? 'display:none;' : '') . '">
                        <input class="form-control b2s-box-sched-time-input b2s-settings-sched-item-input-time" type="text" value="' . $this->getUserSchedTime($v['networkAuthId'], $networkId, 1, 'time') . '" readonly=""  data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="1" data-network-container-mandant-id="' . $containerMandantId . '" name="b2s-user-sched-data[time][' . $v['networkAuthId'] . ']">
                        </span>';
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-day-area pull-right hidden-xs" style="' . (($notAllow) ? 'display:none;' : '') . '"><span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-item-input-day-btn-minus" data-network-auth-id="' . $v['networkAuthId'] . '">-</span> <span class="b2s-text-middle">+</span> <input type="text" class="b2s-sched-manager-item-input-day" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="1" data-network-container-mandant-id="' . $containerMandantId . '"  name="b2s-user-sched-data[delay_day][' . $v['networkAuthId'] . ']" value="' . $this->getUserSchedTime($v['networkAuthId'], $networkId, 1, 'day') . '" readonly> <span class="b2s-text-middle">' . __('Days', 'blog2social') . '</span> <span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-item-input-day-btn-plus" data-network-auth-id="' . $v['networkAuthId'] . '">+</span></span>';
                } else {
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-premium-area pull-right hidden-xs"><span class="label label-success"><a href="#" class="btn-label-premium" data-toggle="modal" data-target="#b2sInfoSchedTimesModal">' . __('PREMIUM', 'blog2social') . '</a></span></span>';
                }

                $html .='</div>';

                $html .= '<div class="clearfix"></div></li>';
            }
        }
        if (isset($networkData[2])) {
            foreach ($networkData[2] as $k => $v) {

                $isDeprecated = false;
                $notAllow = ($v['notAllow'] !== false) ? true : false;
                $isInterrupted = ($v['expiredDate'] != '0000-00-00' && $v['expiredDate'] <= date('Y-m-d')) ? true : false;

                $html .= '<li class="b2s-network-item-auth-list-li ' . (($isDeprecated) ? 'b2s-label-info-border-left deprecated' : (($notAllow) ? 'b2s-label-warning-border-left' : (($isInterrupted) ? 'b2s-label-danger-border-left' : ''))) . '" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="2">';

                $html .='<div class="pull-left">';

                if ($notAllow) {
                    $html.= '<div class="b2s-network-auth-list-info"><span class="glyphicon glyphicon-remove-circle"></span> ' . __('To reactivate this connection,', 'blog2social') . ' <a href="' . B2S_Tools::getSupportLink('affiliate') . '"target="_blank">' . __('please upgrade', 'blog2social') . '</a></div>';
                }
                if ($isInterrupted && !$notAllow) {
                    $html.= '<div class="b2s-network-auth-list-info">' . __('Authorization is interrupted since', 'blog2social') . ' ' . ($sprache == 'en' ? $v['expiredDate'] : date('d.m.Y', strtotime($v['expiredDate']))) . '</div>';
                }
                if ($v['owner_blog_user_id'] !== false) {
                    $displayName = stripslashes(get_user_by('id', $v['owner_blog_user_id'])->display_name);
                    $html .='<div class="b2s-network-approved-from">' . __("Assigned by", "blog2social") . ' ' . ((empty($displayName) || $displayName == false) ? __("Unknown username", "blog2social") : $displayName) . '</div> ';
                }
                $name = ($networkId == 11) ? __('Publication', 'blog2social') : __('Group', 'blog2social');
                $html .= '<span class="b2s-network-item-auth-type">' . (($isDeprecated) ? '<span class="glyphicon glyphicon-exclamation-sign glyphicon-info"></span> ' : '') . $name . '</span>: <span class="b2s-network-item-auth-user-name">' . stripslashes($v['networkUserName']) . '</span> ';

                if (!empty($mandantName)) {
                    $html .='<span class="b2s-network-mandant-name">(' . $mandantName . ')</span> ';
                }
                $html .='</div>';
                $html .='<div class="pull-right">';
                $html .= '<a class="b2s-network-item-auth-list-btn-delete b2s-add-padding-network-delete pull-right" data-network-type="2" data-network-id="' . $networkId . '" data-network-auth-id="' . $v['networkAuthId'] . '" href="#"><span class="glyphicon  glyphicon-trash glyphicon-grey"></span></a>';
                if (!$notAllow && !$isDeprecated) {
                    if ($v['owner_blog_user_id'] == false) {
                        $html .= '<a href="#" onclick="wop(\'' . $b2sAuthUrl . '&choose=group&update=' . $v['networkAuthId'] . '\', \'Blog2Social Network\'); return false;" class="b2s-network-auth-btn b2s-network-auth-update-btn b2s-add-padding-network-refresh pull-right" data-network-auth-id="' . $v['networkAuthId'] . '"><span class="glyphicon  glyphicon-refresh glyphicon-grey"></span></a>';
                    } else {
                        $html .= '<span class="b2s-add-padding-network-placeholder-btn pull-right"></span>';
                    }
                    $html .='<a href="#" class="pull-right b2s-network-item-team-btn-manage b2s-add-padding-network-team pull-right" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-id="' . $networkId . '" data-network-type="2" data-network-mandant-id="' . $mandantId . '" data-connection-owner="' . (($v['owner_blog_user_id'] !== false) ? $v['owner_blog_user_id'] : '0') . '"><span class="glyphicon glyphicon-user glyphicon-grey"></span></a>';
                    if ($v['expiredDate'] == '0000-00-00' || $v['expiredDate'] > date('Y-m-d')) {
                        if (isset($this->modifyBoardAndGroup[$networkId])) {
                            if (in_array(2, $this->modifyBoardAndGroup[$networkId]['TYPE'])) {
                                $html .='<a href="#" class="pull-right b2s-modify-board-and-group-network-btn b2s-add-padding-network-edit" data-modal-title="' . $this->modifyBoardAndGroup[$networkId]['TITLE'] . '" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-id="' . $networkId . '" data-network-type="2"><span class="glyphicon glyphicon-pencil glyphicon-grey"></span></a>';
                                $isEdit = true;
                            }
                        }
                    }
                }

                //Sched Manager since V 5.1.0
                if (B2S_PLUGIN_USER_VERSION > 0) {
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-time-area pull-right ' . (!$isEdit ? 'b2s-sched-manager-add-padding' : '') . ' hidden-xs" style="' . (($notAllow) ? 'display:none;' : '') . '">
                        <input class="form-control b2s-box-sched-time-input b2s-settings-sched-item-input-time" type="text" value="' . $this->getUserSchedTime($v['networkAuthId'], $networkId, 2, 'time') . '" readonly="" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="2" data-network-container-mandant-id="' . $containerMandantId . '" name="b2s-user-sched-data[time][' . $v['networkAuthId'] . ']">
                        </span>';
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-day-area pull-right hidden-xs" style="' . (($notAllow) ? 'display:none;' : '') . '"><span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-item-input-day-btn-minus" data-network-auth-id="' . $v['networkAuthId'] . '">-</span> <span class="b2s-text-middle">+</span> <input type="text" class="b2s-sched-manager-item-input-day" data-network-auth-id="' . $v['networkAuthId'] . '" data-network-mandant-id="' . $mandantId . '" data-network-id="' . $networkId . '" data-network-type="2" data-network-container-mandant-id="' . $containerMandantId . '"  name="b2s-user-sched-data[delay_day][' . $v['networkAuthId'] . ']" value="' . $this->getUserSchedTime($v['networkAuthId'], $networkId, 2, 'day') . '" readonly> <span class="b2s-text-middle">' . __('Days', 'blog2social') . '</span> <span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-item-input-day-btn-plus" data-network-auth-id="' . $v['networkAuthId'] . '">+</span></span>';
                } else {
                    $html .='<span data-network-auth-id="' . $v['networkAuthId'] . '" class="b2s-sched-manager-premium-area pull-right hidden-xs"><span class="label label-success"><a href="#" class="btn-label-premium" data-toggle="modal" data-target="#b2sInfoSchedTimesModal">' . __('PREMIUM', 'blog2social') . '</a></span></span>';
                }

                $html .='</div>';

                $html .= '<div class="clearfix"></div></li>';
            }
        }
        return $html;
    }

    private function convertAuthData($auth) {
        $convertAuth = array();
        foreach ($auth as $k => $value) {
            $convertAuth[$value->mandantId][$value->networkId][$value->networkType][] = array(
                'networkAuthId' => $value->networkAuthId,
                'networkUserName' => $value->networkUserName,
                'expiredDate' => $value->expiredDate,
                'networkKind' => $value->networkKind,
                'notAllow' => (isset($value->notAllow) ? $value->notAllow : false),
                'owner_blog_user_id' => (isset($value->owner_blog_user_id) ? $value->owner_blog_user_id : false)
            );
        }
        return $convertAuth;
    }

    //New >V5.1.0 Seeding
    private function getUserSchedTime($network_auth_id = 0, $network_id = 0, $network_type = 0, $type = 'time') { //type = time,day
        //new > v5.1.0
        if ($this->userSchedData !== false) {
            if (is_array($this->userSchedData) && isset($this->userSchedData['delay_day'][$network_auth_id]) && isset($this->userSchedData['time'][$network_auth_id]) && !empty($this->userSchedData['time'][$network_auth_id])) {
                if ($type == 'time') {
                    $slug = ($this->lang == 'en') ? 'h:i A' : 'H:i';
                    return date($slug, strtotime(date('Y-m-d ' . $this->userSchedData['time'][$network_auth_id] . ':00')));
                }
                if ($type == 'day') {
                    return (int) $this->userSchedData['delay_day'][$network_auth_id];
                }
            }
        }
        //old < 5.1.0 load data
        if (!empty($this->userSchedDataOld) && is_array($this->userSchedDataOld)) {
            if ($type == 'time') {
                foreach ($this->userSchedDataOld as $k => $v) {
                    if ((int) $network_id == (int) $v->network_id && (int) $network_type == (int) $v->network_type) {
                        $slug = ($this->lang == 'en') ? 'h:i A' : 'H:i';
                        return date($slug, strtotime(date('Y-m-d ' . $v->sched_time . ':00')));
                    }
                }
            }
        }
        if ($type == 'day') {
            return 0;
        }
        return null;
    }

    //Old < 5.1.0
    private function getSchedDataByUser() {
        global $wpdb;
        $saveSchedData = null;
        //if exists
        if ($wpdb->get_var("SHOW TABLES LIKE 'b2s_post_sched_settings'") == 'b2s_post_sched_settings') {
            $saveSchedData = $wpdb->get_results($wpdb->prepare("SELECT network_id, network_type, sched_time FROM b2s_post_sched_settings WHERE blog_user_id= %d", B2S_PLUGIN_BLOG_USER_ID));
        }
        return $saveSchedData;
    }

    public function getNetworkAuthAssignment($networkAuthId = 0, $networkId = 0, $networkType = 0) {
        global $wpdb;
        $blogUserTokenResult = $wpdb->get_results("SELECT token FROM `b2s_user`");
        $blogUserToken = array();
        foreach ($blogUserTokenResult as $k => $row) {
            array_push($blogUserToken, $row->token);
        }
        $data = array('action' => 'getTeamAssignUserAuth', 'token' => B2S_PLUGIN_TOKEN, 'networkAuthId' => $networkAuthId, 'blogUser' => $blogUserToken);
        $networkAuthAssignment = json_decode(B2S_Api_Post::post(B2S_PLUGIN_API_ENDPOINT, $data, 30), true);
        if (isset($networkAuthAssignment['result']) && $networkAuthAssignment['result'] !== false) {
            $doneIds = array();
            $assignList = '<ul class="b2s-network-item-auth-list" id="b2s-approved-user-list"><li class="b2s-network-item-auth-list-li b2s-bold">' . __('Connection currently assigned to', 'blog2social') . '</li>';
            if (isset($networkAuthAssignment['assignList']) && is_array($networkAuthAssignment['assignList']) && !empty($networkAuthAssignment['assignList'])) {
                $options = new B2S_Options((int) B2S_PLUGIN_BLOG_USER_ID);
                $optionUserTimeZone = $options->_getOption('user_time_zone');
                $userTimeZone = ($optionUserTimeZone !== false) ? $optionUserTimeZone : get_option('timezone_string');
                $userTimeZoneOffset = (empty($userTimeZone)) ? get_option('gmt_offset') : B2S_Util::getOffsetToUtcByTimeZone($userTimeZone);
                foreach ($networkAuthAssignment['assignList'] as $k => $listUser) {
                    array_push($doneIds, $listUser['assign_blog_user_id']);
                    if (get_userdata($listUser['assign_blog_user_id']) !== false) {
                        $current_user_date = date((strtolower(substr(B2S_LANGUAGE, 0, 2)) == 'de') ? 'd.m.Y' : 'Y-m-d', strtotime(B2S_Util::getUTCForDate($listUser['created_utc'], $userTimeZoneOffset)));
                        $displayName = stripslashes(get_user_by('id', $listUser['assign_blog_user_id'])->display_name);
                        $assignList .= '<li class="b2s-network-item-auth-list-li">';
                        $assignList .= '<div class="pull-left" style="padding-top: 5px;"><span>' . ((empty($displayName) || $displayName == false) ? __("Unknown username", "blog2social") : $displayName) . '</span></div>';
                        $assignList .= '<div class="pull-right"><span style="margin-right: 10px;">' . $current_user_date . '</span> <button class="b2s-network-item-auth-list-btn-delete btn btn-danger btn-sm" data-assign-network-auth-id="' . $listUser['assign_network_auth_id'] . '" data-network-auth-id="' . $networkAuthId . '" data-network-id="' . $networkId . '" data-network-type="' . $networkType . '" data-blog-user-id="' . $listUser['assign_blog_user_id'] . '">' . __('delete', 'blog2social') . '</button></div>';
                        $assignList .= '<div class="clearfix"></div></li>';
                    }
                }
            }
            $assignList .= '</ul>';

            $select = '<select class="form-control b2s-select" id="b2s-select-assign-user">';
            if (isset($networkAuthAssignment['userList']) && !empty($networkAuthAssignment['userList'])) {
                foreach ($networkAuthAssignment['userList'] as $k => $listUser) {
                    if ((int) $listUser != B2S_PLUGIN_BLOG_USER_ID && !in_array($listUser, $doneIds)) {
                        array_push($doneIds, $listUser);
                        $userDetails = get_option('B2S_PLUGIN_USER_VERSION_' . $listUser);
                        if (isset($userDetails['B2S_PLUGIN_USER_VERSION']) && (int) $userDetails['B2S_PLUGIN_USER_VERSION'] == 3) {
                            $displayName = stripslashes(get_user_by('id', $listUser)->display_name);
                            $select .= '<option value="' . $listUser . '">' . ((empty($displayName) || $displayName == false) ? __("Unknown username", "blog2social") : $displayName) . '</option>';
                        }
                    }
                }
            }
            $select .= '</select>';

            return array('result' => true, 'userSelect' => $select, 'assignList' => $assignList);
        }
        return array('result' => false);
    }

    public function getEditTemplateForm($networkId) {
        require_once(B2S_PLUGIN_DIR . 'includes/Options.php');
        $options = new B2S_Options(get_current_user_id());
        $post_template = $options->_getOption("post_template");
        $linkNoCache = $options->_getOption("link_no_cache");
        if (B2S_PLUGIN_USER_VERSION >= 1 && $post_template != false && isset($post_template[$networkId]) && !empty($post_template[$networkId])) {
            $schema = $post_template[$networkId];
        } else {
            $schema = unserialize(B2S_PLUGIN_NETWORK_SETTINGS_TEMPLATE_DEFAULT)[$networkId];
        }

        $html = '<div class="row">';
        $html .= '<div class="col-sm-12">';
        $html .= '<div class="alert alert-success b2s-edit-template-save-success" style="display: none;">' . __('Successfully saved', 'blog2social') . '</div>';
        $html .= '<div class="alert alert-success b2s-edit-template-save-failed" style="display: none;">' . __('Failed to save', 'blog2social') . '</div>';
        $html .= '<div class="alert alert-success b2s-edit-template-load-default-failed" style="display: none;">' . __('Failed to load the default template', 'blog2social') . '</div>';
        $html .= '</div>';
        $html .= '</div>';
        if (B2S_PLUGIN_USER_VERSION < 1) {
            $html .= '<div class="row">';
            $html .= '<div class="col-sm-12">';
            $html .= '<div class="alert alert-info"><i class="glyphicon glyphicon-info-sign"></i> ' . __('This is a Premium Feature', 'blog2social') . '</div>';
            $html .= '</div>';
            $html .= '</div>';
        }
        $html .= '<div class="row">';
        $html .= '<div class="col-sm-12">';
        if (count($schema) > 1 || $networkId == 19) {
            $html .= '<div class="pull-left ' . ((B2S_PLUGIN_USER_VERSION < 1) ? 'b2s-btn-disabled' : '') . '">';
            $html .= '<ul class="nav nav-pills">';
            $html .= '<li class="active"><a href="#b2s-template-profile" class="b2s-template-profile" data-toggle="tab">' . __('Profile', 'blog2social') . '</a></li>';
            if (isset($schema[1]) && !empty($schema[1])) {
                $html .= '<li><a href="#b2s-template-page" class="b2s-template-page" data-toggle="tab">' . __('Page', 'blog2social') . '</a></li>';
            }
            if (isset($schema[2]) && !empty($schema[2])) {
                $html .= '<li><a href="#b2s-template-group" class="b2s-template-group" data-toggle="tab">' . __('Group', 'blog2social') . '</a></li>';
            }
            $html .= '</ul>';
            $html .= '</div>';
            if ($networkId == 1) {
                $html .= '<div class="pull-right"><input id="link-no-cache" type="checkbox" ' . (($linkNoCache == 1) ? 'checked' : '') . ' name="no_cache"> <label for="link-no-cache">' . __('Activate Instant Caching', 'blog2social') . '</label> <a href="#" data-toggle="modal" data-target="#b2sInfoNoCache" class="b2s-info-btn vertical-middle del-padding-left">' . __('Info', 'Blog2Social') . '</a></div>';
            }
            $html .= '<br>';
            $html .= '<hr>';
        }
        if (B2S_PLUGIN_USER_VERSION < 1) {
            $html .= '<div class="b2s-btn-disabled">';
        }
        $html .= '<div class="tab-content clearfix">';
        $html .= '<div class="tab-pane active b2s-template-tab-0" id="b2s-template-profile">';
        $html .= $this->getEditTemplateFormContent($networkId, 0, $schema);
        $html .= '</div>';
        if (isset($schema[1]) && !empty($schema[1])) {
            $html .= '<div class="tab-pane b2s-template-tab-1" id="b2s-template-page">';
            $html .= $this->getEditTemplateFormContent($networkId, 1, $schema);
            $html .= '</div>';
        }
        if (isset($schema[2]) && !empty($schema[2])) {
            $html .= '<div class="tab-pane b2s-template-tab-2" id="b2s-template-group">';
            $html .= $this->getEditTemplateFormContent($networkId, 2, $schema);
            $html .= '</div>';
        }
        $html .= '</div>';
        if (B2S_PLUGIN_USER_VERSION < 1) {
            $html .= '</div>';
        }
        $html .= '</div>';
        $html .= '</div>';

        return $html;
    }

    public function getEditTemplateFormContent($networkId, $networkType, $schema) {
        $defaultTemplate = unserialize(B2S_PLUGIN_NETWORK_SETTINGS_TEMPLATE_DEFAULT);
        $min = $defaultTemplate[$networkId][$networkType]['short_text']['range_min'];
        $limit = $defaultTemplate[$networkId][$networkType]['short_text']['limit'];

        //V5.6.1
        if (!isset($schema[$networkType]['short_text']['excerpt_range_max'])) {
            $schema[$networkType]['short_text']['excerpt_range_max'] = $defaultTemplate[$networkId][$networkType]['short_text']['excerpt_range_max'];
        }

        $content = '<div class="row">';
        $content .= '<div class="col-md-12 media-heading">';
        $content .= '<span class="b2s-edit-template-section-headline">' . __('Format', 'blog2social') . '</span> <a href="#" data-toggle="modal" data-network-id="' . $networkId . '" data-target="#b2sInfoFormat" class="b2s-info-btn del-padding-left">' . __('Info', 'Blog2Social') . '</a>';
        $content .= '<button class="pull-right btn btn-primary btn-xs b2s-edit-template-load-default" data-network-type="' . $networkType . '">' . __('Load default settings', 'blog2social') . '</button>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12">';
        if ($schema[$networkType]['format'] == 0) {
            $content .= '<button class="btn btn-primary btn-sm b2s-edit-template-link-post pull-left" data-network-type="' . $networkType . '">' . (($networkId != 12) ? __('Link', 'blog2social') : __('Image with frame', 'blog2social')) . '</button>';
            $content .= '<button class="btn btn-light btn-sm b2s-edit-template-image-post pull-left" data-network-type="' . $networkType . '">' . (($networkId != 12) ? __('Image', 'blog2social') : __('Image cut out', 'blog2social')) . '</button>';
        } else {
            $content .= '<button class="btn btn-light btn-sm b2s-edit-template-link-post pull-left" data-network-type="' . $networkType . '">' . (($networkId != 12) ? __('Link', 'blog2social') : __('Image with frame', 'blog2social')) . '</button>';
            $content .= '<button class="btn btn-primary btn-sm b2s-edit-template-image-post pull-left" data-network-type="' . $networkType . '">' . (($networkId != 12) ? __('Image', 'blog2social') : __('Image cut out', 'blog2social')) . '</button>';
        }
        $content .= '<input type="hidden" class="b2s-edit-template-post-format" value="' . $schema[$networkType]['format'] . '" data-network-type="' . $networkType . '">';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<br>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12 media-heading">';
        $content .= '<span class="b2s-edit-template-section-headline">' . __('Content', 'blog2social') . '</span> <a href="#" data-toggle="modal" data-target="#b2sInfoContent" class="b2s-info-btn del-padding-left">' . __('Info', 'Blog2Social') . '</a>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12">';
        $content .= '<div class="b2s-padding-bottom-5">'
                . '<button type="button" draggable="true" class="btn btn-primary btn-xs b2s-edit-template-content-post-title b2s-edit-template-content-post-item" data-network-type="' . $networkType . '">{TITLE}</button>'
                . '<button type="button" draggable="true" class="btn btn-primary btn-xs b2s-edit-template-content-post-excerpt b2s-edit-template-content-post-item" data-network-type="' . $networkType . '">{EXCERPT}</button>'
                . '<button type="button" draggable="true" class="btn btn-primary btn-xs b2s-edit-template-content-post-content b2s-edit-template-content-post-item" data-network-type="' . $networkType . '">{CONTENT}</button>'
                . '<button type="button" draggable="true" class="btn btn-primary btn-xs b2s-edit-template-content-post-keywords b2s-edit-template-content-post-item" data-network-type="' . $networkType . '">{KEYWORDS}</button>'
                . '<button type="button" class="btn btn-primary btn-xs b2s-edit-template-content-clear-btn pull-right" data-network-type="' . $networkType . '">' . __('clear', 'blog2social') . '</button>'
                . '</div>';
        $content .= '<textarea class="b2s-edit-template-post-content" style="width: 100%;" data-network-type="' . $networkType . '" ' . ((B2S_PLUGIN_USER_VERSION < 1) ? 'readonly="true"' : '') . '>' . $schema[$networkType]['content'] . '</textarea>';
        $content .= '<input class="b2s-edit-template-content-selection-start" data-network-type="' . $networkType . '" type="hidden" value="0">';
        $content .= '<input class="b2s-edit-template-content-selection-end" data-network-type="' . $networkType . '" type="hidden" value="0">';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12 b2s-edit-template-link-info">';
        $content .= '<i class="glyphicon glyphicon-info-sign"></i> ' . __('The link will be added automatically at the end of the post.', 'blog2social');
        if ((int) $limit != 0) {
            $content .= '<br><i class="glyphicon glyphicon-info-sign"></i> ' . __('Network limit', 'blog2social') . ': ' . $limit . ' ' . __('characters', 'blog2social');
        }
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<br>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12 media-heading">';
        $content .= '<span class="b2s-edit-template-section-headline">' . __('Character limit', 'blog2social') . ' (CONTENT, EXCERPT)</span> <a href="#" data-toggle="modal" data-target="#b2sInfoCharacterLimit" class="b2s-info-btn del-padding-left">' . __('Info', 'Blog2Social') . '</a>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12">';
        $content .= '<div class="form-group">';
        $content .= '<label class="col-sm-2 control-label b2s-edit-template-character-limit-label">{CONTENT}</label> <input type="number" class="b2s-edit-template-range" data-network-type="' . $networkType . '" value="' . $schema[$networkType]['short_text']['range_max'] . '" min="1" max="' . (($schema[$networkType]['short_text']['limit']) ? $schema[$networkType]['short_text']['limit'] : '') . '" ' . ((B2S_PLUGIN_USER_VERSION < 1) ? 'readonly="true"' : '') . '>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12">';
        $content .= '<div class="form-group">';
        $content .= '<label class="col-sm-2 control-label b2s-edit-template-character-limit-label">{EXCERPT}</label> <input type="number" class="b2s-edit-template-excerpt-range" data-network-type="' . $networkType . '" value="' . $schema[$networkType]['short_text']['excerpt_range_max'] . '" min="1" max="' . (($schema[$networkType]['short_text']['limit']) ? $schema[$networkType]['short_text']['limit'] : '') . '" ' . ((B2S_PLUGIN_USER_VERSION < 1) ? 'readonly="true"' : '') . '>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<div class="row">';
        $content .= '<div class="col-md-12 b2s-edit-template-link-info">';
        $content .= '<i class="glyphicon glyphicon-info-sign"></i> ' . __('recommended length', 'blog2social') . ': ' . $min . ' ' . __('characters', 'blog2social') . (((int) $limit != 0) ? '; ' . __('Network limit', 'blog2social') . ': ' . $limit . ' ' . __('characters', 'blog2social') : '');
        $content .= '</div>';
        $content .= '</div>';
        $content .= '<hr>';
        $content .= '<br>';

        $content .= $this->networkPreview($networkId, $networkType, $schema);

        return $content;
    }

    private function networkPreview($networkId, $networkType, $schema) {
        $domain = get_home_url();
        $title = get_bloginfo('title');
        $desc = get_bloginfo('description');
        $preview = '';
        switch ($networkId) {
            case '1':
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<span class="b2s-edit-template-section-headline">' . __('Preview', 'blog2social') . ':</span>';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-8 b2s-edit-template-preview-border b2s-edit-template-preview-border-1">';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<img class="b2s-edit-template-preview-profile-img-1" src="' . plugins_url('/assets/images/b2s@64.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-10">';
                $preview .= '<span class="b2s-edit-template-preview-profile-name-1">Blog2Social</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-link-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 0) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-content-1">';
                $preview .= '<span class="b2s-edit-template-preview-content" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-image-border-1">';
                $preview .= '<img class="b2s-edit-template-preview-link-image b2s-edit-template-preview-link-image-1" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-link-meta-box-1">';
                $preview .= '<span>' . $domain . '</span><br>';
                $preview .= '<span class="b2s-edit-template-preview-link-title">' . $title . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-image-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 1) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-content-1">';
                $preview .= '<span class="b2s-edit-template-preview-content" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-image-border-1">';
                $preview .= '<img class="b2s-edit-template-preview-image-image b2s-edit-template-preview-image-image-1" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<img class="b2s-edit-template-preview-like-icons-1" src="' . plugins_url('/assets/images/settings/like-icons-1.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                break;
            case '2':
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<span class="b2s-edit-template-section-headline">' . __('Preview', 'blog2social') . ':</span>';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-8">';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<img class="b2s-edit-template-preview-profile-img-2" src="' . plugins_url('/assets/images/b2s@64.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-10 b2s-edit-template-preview-2">';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<span class="b2s-edit-template-preview-profile-name-2">Blog2Social</span> <span class="b2s-edit-template-preview-profile-handle-2">@blog2social</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-link-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 0) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<span class="b2s-edit-template-preview-content b2s-edit-template-preview-content-2" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row b2s-edit-template-preview-link-meta-box-2">';
                $preview .= '<div class="col-sm-3 b2s-edit-template-preview-link-meta-box-image-2">';
                $preview .= '<img class="b2s-edit-template-preview-link-image b2s-edit-template-preview-link-image-2" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-9" style="padding-top: 12px;">';
                $preview .= '<span>' . $title . '</span><br>';
                $preview .= '<span class="b2s-edit-template-preview-link-meta-box-desc-2">' . $desc . '</span><br>';
                $preview .= '<span class="b2s-edit-template-preview-link-meta-box-domain-2">' . $domain . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-image-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 1) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<span class="b2s-edit-template-preview-content b2s-edit-template-preview-content-2" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<img class="b2s-edit-template-preview-image-image b2s-edit-template-preview-image-image-2" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<img class="b2s-edit-template-preview-like-icons-2" src="' . plugins_url('/assets/images/settings/like-icons-2.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                break;
            case '3':
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<span class="b2s-edit-template-section-headline">' . __('Preview', 'blog2social') . ':</span>';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-8 b2s-edit-template-preview-border b2s-edit-template-preview-border-3">';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<img class="b2s-edit-template-preview-profile-img-3" src="' . plugins_url('/assets/images/b2s@64.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-10">';
                $preview .= '<span class="b2s-edit-template-preview-profile-name-3">Blog2Social</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-link-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 0) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-content-3">';
                $preview .= '<span class="b2s-edit-template-preview-content" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-image-border-3">';
                $preview .= '<img class="b2s-edit-template-preview-link-image b2s-edit-template-preview-link-image-3" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row b2s-edit-template-preview-link-meta-box-3">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<span class="b2s-edit-template-preview-link-meta-box-title-3">' . $title . '</span><br>';
                $preview .= '<span class="b2s-edit-template-preview-link-meta-box-domain-3">' . $domain . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-image-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 1) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-content-3">';
                $preview .= '<span class="b2s-edit-template-preview-content" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-image-border-3">';
                $preview .= '<img class="b2s-edit-template-preview-image-image b2s-edit-template-preview-image-image-3" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<img class="b2s-edit-template-preview-like-icons-3" src="' . plugins_url('/assets/images/settings/like-icons-3.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                break;
            case '12':
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<span class="b2s-edit-template-section-headline">' . __('Preview', 'blog2social') . ':</span>';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-8 b2s-edit-template-preview-border b2s-edit-template-preview-border-12">';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<img class="b2s-edit-template-preview-profile-img-12" src="' . plugins_url('/assets/images/b2s@64.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-10 b2s-edit-template-preview-profile-name-12">';
                $preview .= '<span>Blog2Social</span>';
                $preview .= '<span class="pull-right b2s-edit-template-preview-dots-12">...</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-image-border-12">';
                $preview .= '<img class="b2s-edit-template-preview-image-12 b2s-edit-template-link-preview b2s-edit-template-image-frame" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 0) ? '' : 'style="display: none;"') . ' src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '<img class="b2s-edit-template-preview-image-12 b2s-edit-template-image-preview b2s-edit-template-image-cut" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 1) ? '' : 'style="display: none;"') . ' src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<img class="b2s-edit-template-preview-like-icons-12" src="' . plugins_url('/assets/images/settings/like-icons-12.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<span class="b2s-edit-template-preview-content-profile-name-12">Blog2Social</span><span class="b2s-edit-template-preview-content b2s-edit-template-preview-content-12" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                break;
            case '19':
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<span class="b2s-edit-template-section-headline">' . __('Preview', 'blog2social') . ':</span>';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-8 b2s-edit-template-preview-border b2s-edit-template-preview-border-19">';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-2">';
                $preview .= '<img class="b2s-edit-template-preview-profile-img-19" src="' . plugins_url('/assets/images/b2s@64.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-10">';
                $preview .= '<span class="b2s-edit-template-preview-profile-name-19">Blog2Social</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-link-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 0) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row b2s-edit-template-preview-header-19">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-content-19">';
                $preview .= '<span class="b2s-edit-template-preview-content" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-4 b2s-edit-template-preview-image-border-19">';
                $preview .= '<img class="b2s-edit-template-preview-link-image b2s-edit-template-preview-link-image-19" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '<div class="col-sm-8 b2s-edit-template-preview-link-meta-box-19">';
                $preview .= '<span class="b2s-edit-template-preview-link-meta-box-title-19">' . $title . '</span><br>';
                $preview .= '<span class="b2s-edit-template-preview-link-meta-box-desc-19">' . $desc . '</span><br>';
                $preview .= '<span class="b2s-edit-template-preview-link-meta-box-domain-19">' . $domain . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="b2s-edit-template-image-preview" data-network-type="' . $networkType . '" ' . (((int) $schema[$networkType]['format'] == 1) ? '' : 'style="display: none;"') . '>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-content-19">';
                $preview .= '<span class="b2s-edit-template-preview-content" data-network-type="' . $networkType . '">' . preg_replace("/\n/", "<br>", $schema[$networkType]['content']) . '</span>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12 b2s-edit-template-preview-image-border-19">';
                $preview .= '<img class="b2s-edit-template-preview-image-image b2s-edit-template-preview-image-image-19" src="' . plugins_url('/assets/images/no-image.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '<div class="row">';
                $preview .= '<div class="col-sm-12">';
                $preview .= '<img class="b2s-edit-template-preview-like-icons-19" src="' . plugins_url('/assets/images/settings/like-icons-19.png', B2S_PLUGIN_FILE) . '">';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                $preview .= '</div>';
                break;
            default:
                break;
        }
        return $preview;
    }

}
