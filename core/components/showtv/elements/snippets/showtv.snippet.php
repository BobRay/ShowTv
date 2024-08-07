<?php
/**
 * ShowTv snippet for ShowTv extra
 *
 * Copyright 2012-2024 by Bob Ray <https://bobsguides.com>
 * Created on 12-20-2012
 *
 * ShowTv is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or (at your option) any later
 * version.
 *
 * ShowTv is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * ShowTv; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 *
 * @package showtv
 */

/**
 * Description
 * -----------
 * Show any TV, anywhere
 *
 * Variables
 * ---------
 * @var $modx modX
 * @var $scriptProperties array
 *
 * @package showtv
 **/

/* ShowTv snippet */

/* Make it run in either MODX 2 or MODX 3 */
$prefix = $modx->getVersionData()['version'] >= 3
    ? 'MODX\Revolution\\'
    : '';

$output = '';

$rid = $modx->getOption('resourceID', $scriptProperties, '');
$tvId = $modx->getOption('tvID', $scriptProperties, '');

/* For debugging */

/*
$output .= '<br>Prefix: ' . $prefix . '<br>';
$output .= '<br>TV ID: ' . $tvId . '<br>';
$output .= '<br>Resource ID: ' . $rid . '<br>';
*/

$render = $modx->getOption('render', $scriptProperties, false);

if (is_numeric($tvId)) {
    $tv = $modx->getObject($prefix . 'modTemplateVar', $tvId);
} else {
    $tv = $modx->getObject($prefix . 'modTemplateVar', array('name' => $tvId));
}

if ($tv) {
    $output .= $render
        ? $tv->renderOutput($rid)
        : $tv->getValue($rid);
} else {
    $output .= "TV Not Found";
}

return $output;
