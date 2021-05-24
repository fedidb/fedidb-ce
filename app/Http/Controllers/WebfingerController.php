<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bin;
use Illuminate\Support\Str;

class WebfingerController extends Controller
{
	public function webfinger(Request $request)
	{
		$this->validate($request, [
			'resource' => 'required|string|min:1'
		]);

		$wf = $this->normalizeProfileUrl($request->input('resource'));
		$domain = config('fedidb.app_domain');

		if($wf['domain'] !== $domain) {
			abort(400);
		}

		$bin = Bin::whereShortcode($wf['username'])->firstOrFail();
		$url = $bin->actorUrl();
		$sub = 'acct:' . $bin->shortcode . '@' . $domain;
		$res = [
			'subject' => $sub,
			'aliases' => [
				$url
			],
			'links' => [
				[
					'rel' => 'http://webfinger.net/rel/profile-page',
					'type' => 'text/html',
					'href' => $bin->shortcodeUrl()
				],
				[
					'rel' => 'self',
					'type' => 'application/activity+json',
					'href' => $url
				]
			]
		];

		return response()->json($res, 200, [], JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
	}

	protected function normalizeProfileUrl($url)
	{
		if (Str::startsWith($url, 'acct:')) {
			$url = str_replace('acct:', '', $url);
		}

		if (!Str::contains($url, '@') && filter_var($url, FILTER_VALIDATE_URL)) {
			$parsed = parse_url($url);
			$username = str_replace(['/', '\\', '@'], '', $parsed['path']);

			return ['domain' => $parsed['host'], 'username' => $username];
		}
		$parts = explode('@', $url);
		$username = null;
		$domain = null;

		foreach ($parts as $part) {
			if (empty($part)) {
				continue;
			}

			if (Str::contains($part, '.')) {
				$domain = filter_var($part, FILTER_VALIDATE_URL) ?
				parse_url($part, PHP_URL_HOST) :
				$part;
			} else {
				$username = $part;
			}
		}

		return ['domain' => $domain, 'username' => $username];
	}
}
