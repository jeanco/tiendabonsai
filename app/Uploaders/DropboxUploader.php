<?php

namespace App\Uploaders;

use App\Content;
use App\Product;
use App\ProductPresentation;
use Exception;
use League\Flysystem\Filesystem;
use Spatie\Dropbox\Client;
use Spatie\FlysystemDropbox\DropboxAdapter as Adapter;

abstract class DropboxUploader {

	protected $dropboxClient;

	protected $dropboxPath;
	protected $dropboxUrl;

	function __construct() {

		$env_ = env('DROPBOX_REFRESH_TOKEN');
		if($env_ != null && $env_!= '')
            {
                $REFRESH_TOKEN = env('DROPBOX_REFRESH_TOKEN');
                $APP_KEY = env('DROPBOX_APP_KEY');
                $SECRET_KEY = env('DROPBOX_SECRET_KEY');
                 //dd($APP_KEY);

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, 'https://api.dropbox.com/oauth2/token');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=".$REFRESH_TOKEN);
                curl_setopt($ch, CURLOPT_USERPWD, $APP_KEY . ':' . $SECRET_KEY);

                $headers = array();
                $headers[] = 'Content-Type: application/x-www-form-urlencoded';
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

                $TOKEN = curl_exec($ch);

                if (curl_errno($ch)) {
                    echo 'Error:' . curl_error($ch);
                }

                curl_close($ch);

                $TOKEN = json_decode($TOKEN)->access_token;

                //dd($TOKEN);
            }
            else
            {
                $TOKEN = env('DROPBOX_TOKEN');
            }

		$this->dropboxClient = new Client($TOKEN);
		//$this->dropboxClient = new Client(env('DROPBOX_TOKEN'));



	}

	abstract protected function process($img, $fileType, $thumb = null);

	public function upload($path, $file, $fileType, $thumb = null) {
		$file = $this->process($file, $fileType, $thumb);

		$uploader = new Filesystem(new Adapter($this->dropboxClient, $path));

		$dropboxFileName = time() . "-" . time() . "." . $fileType;
		$this->dropboxPath = $path . '/' . $dropboxFileName;

		try {
			$uploadFile = $uploader->put($dropboxFileName, (string) $file);
			$urlObject = $this->dropboxClient->createSharedLinkWithSettings($this->dropboxPath, ["requested_visibility" => "public"]);
			$this->dropboxUrl = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $urlObject['url']);

			return true;
		} catch (Exception $e) {
			return false;
		}
	}

	public function getting($path){
		$urls = [];
		$uploader = new Filesystem(new Adapter($this->dropboxClient, $path));
		$images = $uploader->listContents();

		foreach ($images as $key => $image) {

			$filename_arr = explode('_', $image['filename']);

			if ($filename_arr[0]) {
				$product = Product::whereSku($filename_arr[0])->first();

				if (count($product)) {
					try {
						$urlObject = $this->dropboxClient->createSharedLinkWithSettings($path."/".$image['path'], ["requested_visibility" => "public"]);

						$product_path = $path."/".$image['path'];
						$product_url = str_replace("www.dropbox.com", "dl.dropboxusercontent.com", $urlObject['url']);

						#Save depending wether is main or not
						$model_id = $product->id;
						$color_id = 0;
						if (!$product->is_main_product) {
							$model_id = $product->main_product_id;

							$presentation = ProductPresentation::whereProductId($product->id)
								->where('main_product_id', $product->main_product_id)
								->first();
							$color_id = $presentation->color_id;
						}

						$content = new Content();
						$content->content = "Img imported";
						$content->resource = $product_url;
						$content->resource_path = $product_path;
						$content->resource_thumb = $product_url;
						$content->resource_thumb_path = $product_path;
						$content->model_id = $model_id;
						$content->model_type = 2;
						$content->color_id = $color_id;
						$content->type = 1;
						$content->save();
					} catch (Exception $e) {
					}
				}

			}



		}

		return "ok";

	}

	public function getDropboxPath() {
		return $this->dropboxPath;
	}

	public function getDropboxUrl() {
		return $this->dropboxUrl;
	}

	public function delete($path, $url) {

		if (!empty($url)) {
			if (!is_null($url)) {
				$ok = get_headers($url);
				if ($ok[0] == 'HTTP/1.0 200 OK') {
					if ($path) {
						// try {
						$delete = $this->dropboxClient->delete($path);
						return true;
						// } catch (Exception $e) {
						// 	return true;
						// }
					}
				}
			}
		}
		return false;
	}
}
