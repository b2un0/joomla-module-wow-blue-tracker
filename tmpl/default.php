<?php

/**
 * @author     Branko Wilhelm <branko.wilhelm@gmail.com>
 * @link       http://www.z-index.net
 * @copyright  (c) 2014 Branko Wilhelm
 * @license    GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

defined('_JEXEC') or die;

JFactory::getDocument()->addStyleSheet(JUri::base(true) . '/modules/' . $module->module . '/tmpl/default.css');
?>
<?php if ($params->get('ajax')) : ?>
    <div class="mod_wow_blue_tracker ajax"></div>
<?php else: ?>
    <div class="mod_wow_blue_tracker">
        <?php foreach ($posts as $post): ?>
            <?php echo JHtml::link((string)$post->link, (string)$post->title, array('target' => '_blank')); ?>
            <pre><?php # print_r($post); ?></pre>
        <?php endforeach; ?>
    </div>
<?php endif; ?>