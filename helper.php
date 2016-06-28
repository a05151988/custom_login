<?php
defined('_JEXEC') or die;

class ModCustomLoginHelper
{
    public static function loginAjax(){
        $site = JFactory::getApplication('site');

        JRequest::checkToken() OR ModCustomLoginHelper::ajaxResonse(JText::_('JINVALID_TOKEN'));
        $options = array();

        $options['remember'] = JRequest::getBool('remember', false);

        $credentials = array();
        $username = JRequest::getString('username','','USERNAME');
        $password = JRequest::getString('password','','RAW');
        $credentials['username'] = $username;
        $credentials['password'] = $password;

        $error = $site->login($credentials, $options);
        ModCustomLoginHelper::ajaxResonse($error);
    }

    public static function ajaxResonse($message){
        echo json_encode($message);
        die;
    }
}
