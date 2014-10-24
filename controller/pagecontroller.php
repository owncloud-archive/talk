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

namespace OCA\Talk\Controller;


use \OCP\IConfig;
use \OCP\IRequest;
use \OCP\AppFramework\Http\TemplateResponse;
use \OCP\AppFramework\Controller;

class PageController extends Controller {

	private $userId;
	private $config;

    public function __construct($appName, IRequest $request, IConfig $config, $userId){
        parent::__construct($appName, $request);
		$this->userId = $userId;
		$this->config = $config;
    }


    /**
     * CAUTION: the @Stuff turn off security checks, for this page no admin is
     *          required and no CSRF check. If you don't know what CSRF is, read
     *          it up in the docs or you might create a security hole. This is
     *          basically the only required method to add this exemption, don't
     *          add it to any other method if you don't exactly know what it does
     *
     * @NoAdminRequired
     * @NoCSRFRequired
     */
    public function index() {
        $params = array('url' => $this->config->getAppValue($this->appName, 'url', 'http://localhost:8080'));
        return new TemplateResponse('talk', 'main', $params);  // templates/main.php
    }


    /**
     * Simply method that posts back the payload of the request
     * @NoAdminRequired
     */
    public function doEcho($echo) {
        return array('echo' => $echo);
    }


}
