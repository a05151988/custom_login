<?php

defined('_JEXEC') or die;
$params->def('greeting', 1);
$user	          = JFactory::getUser();
$type             = (!$user->get('guest')) ? 'logout' : 'login';
$layout           = $params->get('layout', 'default');
$return           = urlencode(base64_encode(JURI::current()));
if (!$user->guest)
{
    $layout .= '_logout';
}

require JModuleHelper::getLayoutPath('mod_customlogin', $layout);
