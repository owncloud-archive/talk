<?php
/**
 * owncloud - talk
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author Vincent Petry <pvince81@owncloud.com>
 * @copyright Vincent Petry 2014
 */
namespace OCA\Talk;

use \OCA\Talk\AppInfo\Application;

$app = new Application();

$c = $app->getContainer();

$c->query('API')->addScript('settings');

$tmpl = new \OCP\Template($c->query('AppName'), 'settings-admin');

$tmpl->assign('url', $c->query('Config')->getAppValue($c->query('AppName'), 'url', 'http://localhost:8080'));

return $tmpl->fetchPage();
