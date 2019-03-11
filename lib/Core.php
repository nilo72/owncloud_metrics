<?php
/**
 * @author Oliver Neumann <oli@hebbelweg.de>
 *
 * @copyright Copyright (c) 2018, ownCloud GmbH
 * @license AGPL-3.0
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */

namespace OCA\Metrics_API;

use OC\OCS\Result;
use OCP\IUserManager;

class Core {
	/** @var \OCP\App\IAppManager */
	private $userManager;

	/**
	 * @param IUserManager $userManager
	 */
	public function __construct(IUserManager $userManager) {
		$this->userManager = $userManager;
	}

	/**
	 * @param array $parameters
	 * @return OC_OCS_Result
	 */
	public function getUserReport($parameters) {
		$users = $this->countUsers();
		return new Result([
			'users' => $users
		]);
	}

	private function countUsers() {
		return $this->userManager->countUsers();
	}
}