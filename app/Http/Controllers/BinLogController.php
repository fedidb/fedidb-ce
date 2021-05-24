<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Bin;
use App\BinLog;
use Illuminate\Support\Str;

class BinLogController extends Controller
{
	public function view(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);

		$binlog = [
			'home' => $bin->shortcodeUrl() . '/log/' . $log->id,
			'object' => json_encode(json_decode($log->object), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)
		];
		return view('services.request-bin.log-viewer', compact('bin', 'log', 'binlog'));
	}

	public function viewObject(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);
		$binlog = [
			'home' => $bin->shortcodeUrl() . '/log/' . $log->id,
			'object' => json_encode(json_decode($log->object), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)
		];
		return view('services.request-bin.log.object', compact('bin', 'log', 'binlog'));
	}

	public function viewHeaders(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);
		$binlog = [
			'home' => $bin->shortcodeUrl() . '/log/' . $log->id,
			'object' => json_encode(json_decode($log->headers), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)
		];
		return view('services.request-bin.log.headers', compact('bin', 'log', 'binlog'));
	}

	public function viewObjectJson(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);

		return response(json_encode(json_decode($log->object), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))->header('Content-Type', 'application/json');
	}

	public function viewHeadersJson(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);

		return response(json_encode(json_decode($log->headers), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))->header('Content-Type', 'application/json');
	}

	public function viewActor(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);
		$binlog = [
			'home' => $bin->shortcodeUrl() . '/log/' . $log->id,
			'object' => json_encode(json_decode($log->actor), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES)
		];
		return view('services.request-bin.log.actor', compact('bin', 'log', 'binlog'));
	}

	public function viewActorJson(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);

		return response(json_encode(json_decode($log->actor), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES))->header('Content-Type', 'application/json');
	}

	public function viewDebug(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);
		$binlog = [
			'home' => $bin->shortcodeUrl() . '/log/' . $log->id,
		];
		return view('services.request-bin.log.debug', compact('bin', 'log', 'binlog'));
	}

	public function viewDebugJson(Request $request, $bin, $id)
	{
		$bin = Bin::whereShortcode($bin)->whereScope('public')->firstOrFail();
		$log = BinLog::whereBinId($bin->id)->findOrFail($id);

		return response('{}')->header('Content-Type', 'application/json');
	}
}
