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

namespace OCA\Talk\AppInfo;


use \OCP\AppFramework\App;
use \OCP\IContainer;

use \OCA\Talk\Controller\PageController;


class Application extends App {


	public function __construct (array $urlParams=array()) {
		parent::__construct('talk', $urlParams);

		$container = $this->getContainer();

		/**
		 * Controllers
		 */
		$container->registerService('PageController', function(IContainer $c) {
			return new PageController(
				$c->query('AppName'), 
				$c->query('Request'),
				$c->query('Config'),
				$c->query('UserId')
			);
		});

		$container->registerService('Config', function(IContainer $c) {
			return $c->getServer()->getConfig();
		});

		/**
		 * Core
		 */
		$container->registerService('UserId', function(IContainer $c) {
			return \OCP\User::getUser();
		});		
		
	}


}
