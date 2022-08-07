<?php

namespace App\Uploaders;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class ImageUploader extends DropboxUploader {

    public function process($img, $fileType, $thumb = null)
    {
        // create an image manager instance with favored driver
        $manager = new ImageManager(array('driver' => 'gd'));

        $image = $manager->make($img);

        if ($thumb) {
            $image->widen($thumb);
        }

        $image->encode($fileType, 50);

        return $image;
    }
}
