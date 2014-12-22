<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 - 2015 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

class ModWowBlueTrackerHelper extends WoWModuleAbstract
{
    protected function getInternalData()
    {
        try {
            $result = WoW::getInstance()->getAdapter('MMOChampion')->getData($this->params->module->get('language', 'en-US'));
        } catch (Exception $e) {
            return $e->getMessage();
        }

        $output = array();
        foreach ($result->body->channel->item as $item) {
            if ($this->params->module->get('topics', 1)) {
                if (strpos((string)$item->description, '[Blue Topic]') === 0) {
                    $item->description = str_replace('[Blue Topic]', '', (string)$item->description);
                    $output[] = $item;
                }
            } else {
                $output[] = $item;
            }

            if (count($output) >= $this->params->module->get('rows', 10)) {
                break;
            }
        }

        return $output;
    }
}