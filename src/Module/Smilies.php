<?php

namespace Friendica\Module;

use Friendica\BaseModule;
use Friendica\Core\Renderer;
use Friendica\Core\System;

/**
 * Prints the possible Smilies of this node
 */
class Smilies extends BaseModule
{
	public static function content()
	{
		$smilies = \Friendica\Content\Smilies::getList();
		$count = count(defaults($smilies, 'texts', []));

		$tpl = Renderer::getMarkupTemplate('smilies.tpl');
		return Renderer::replaceMacros($tpl, [
			'$count'   => $count,
			'$smilies' => $smilies,
		]);
	}

	public static function rawContent()
	{
		$app = self::getApp();
		$smilies = \Friendica\Content\Smilies::getList();

		if (!empty($app->argv[1]) && ($app->argv[1] === "json")) {
			$results = [];
			for ($i = 0; $i < count($smilies['texts']); $i++) {
				$results[] = ['text' => $smilies['texts'][$i], 'icon' => $smilies['icons'][$i]];
			}
			System::jsonExit($results);
		}
	}
}
