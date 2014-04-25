<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

abstract class ModWowBlueTrackerHelper
{
    public static function getAjax()
    {
        $module = JModuleHelper::getModule('mod_' . JFactory::getApplication()->input->get('module'));

        if (empty($module)) {
            return false;
        }

        JFactory::getLanguage()->load($module->module);

        $params = new JRegistry($module->params);
        $params->set('ajax', 0);

        ob_start();

        require(dirname(__FILE__) . '/' . $module->module . '.php');

        return ob_get_clean();
    }

    public static function getData(JRegistry &$params)
    {
        if ($params->get('ajax')) {
            return;
        }

        $url = 'http://blue.mmo-champion.com/rss/?language=' . $params->get('language', 'en-US');

        $cache = JFactory::getCache('wow', 'output');
        $cache->setCaching(1);
        $cache->setLifeTime($params->get('cache_time', 60) * 60);

        $key = md5($url);

        if (!$result = $cache->get($key)) {
            try {
                $http = JHttpFactory::getHttp();
                $http->setOption('userAgent', 'Joomla! ' . JVERSION . '; WoW Blue Tracker; php/' . phpversion());

                $result = JHttpFactory::getHttp()->get($url, null, $params->get('timeout', 10));
            } catch (Exception $e) {
                return $e->getMessage();
            }

            $cache->store($result, $key);
        }

        if ($result->code != 200) {
            return __CLASS__ . ' HTTP-Status ' . JHtml::_('link', 'http://wikipedia.org/wiki/List_of_HTTP_status_codes#' . $result->code, $result->code, array('target' => '_blank'));
        }


        $result->body = simplexml_load_string($result->body);

        if (!($result->body instanceof SimpleXMLElement)) {
            return JText::_('ERROR');
        }

        $output = array();
        foreach ($result->body->channel->item as $item) {
            if ($params->get('topics', 1)) {
                if (strpos((string)$item->description, '[Blue Topic]') === 0) {
                    $item->description = str_replace('[Blue Topic]', '', (string)$item->description);
                    $output[] = $item;
                }
            } else {
                $output[] = $item;
            }

            if (count($output) >= $params->get('rows', 10)) {
                break;
            }
        }

        return $output;
    }
}