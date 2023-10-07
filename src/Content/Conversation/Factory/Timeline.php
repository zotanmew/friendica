<?php
/**
 * @copyright Copyright (C) 2010-2023, the Friendica project
 *
 * @license GNU AGPL version 3 or any later version
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 */

namespace Friendica\Content\Conversation\Factory;

use Friendica\Capabilities\ICanCreateFromTableRow;
use Friendica\Content\Conversation\Entity\Timeline as TimelineEntity;
use Friendica\Content\Conversation\Repository\UserDefinedChannel;
use Friendica\Core\Config\Capability\IManageConfigValues;
use Friendica\Core\L10n;
use Psr\Log\LoggerInterface;

class Timeline extends \Friendica\BaseFactory
{
	/** @var L10n */
	protected $l10n;
	/** @var IManageConfigValues The config */
	protected $config;
	/** @var UserDefinedChannel */
	protected $channelRepository;

	public function __construct(UserDefinedChannel $channel, L10n $l10n, LoggerInterface $logger, IManageConfigValues $config)
	{
		parent::__construct($logger);

		$this->channelRepository = $channel;
		$this->l10n              = $l10n;
		$this->config            = $config;
	}
}
