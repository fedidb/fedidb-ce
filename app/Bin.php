<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
	protected $visible = ['id', 'shortcode'];
	protected $hidden = ['private_key', 'meta'];

	const EXAMPLE_PHOTO = '/static/ec/cristian-morales-wyEqdnW22Ag-unsplash.jpg';

	public function shortcodeUrl()
	{
		return url('/rb/' . $this->shortcode);
	}

	public function actorUrl($suffix = null)
	{
		if($this->private_key == null) {
			$pkiConfig = [
				'digest_alg'       => 'sha512',
				'private_key_bits' => 2048,
				'private_key_type' => OPENSSL_KEYTYPE_RSA,
			];
			$pki = openssl_pkey_new($pkiConfig);
			openssl_pkey_export($pki, $pki_private);
			$pki_public = openssl_pkey_get_details($pki);
			$pki_public = $pki_public['key'];

			$this->private_key = $pki_private;
			$this->public_key = $pki_public;
			$this->save();
		}

		return url('/actor/' . $this->shortcode . $suffix);
	}

	public function inboxUrl()
	{
		return $this->actorUrl('/inbox');
	}

	public function outboxUrl()
	{
		return $this->actorUrl('/outbox');
	}

	public function logs()
	{
		return $this->hasMany(BinLog::class);
	}
}
