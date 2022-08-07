<?php

namespace App\Uploaders;

class PdfUploader extends DropboxUploader {

	public function process($file, $fileType, $thumb = null) {
		// create an image manager instance with favored driver
		$file = file_get_contents($file);

		return $file;
	}
}
