<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValueRequest;
use App\Uploaders\ImageUploader;
use App\Value;
use Illuminate\Http\Request;

class ValuesController extends Controller
{
	protected $defaultImage;

	public function __construct()
	{
		$this->detaultImage = asset('static/images/image_no_available.png');
	}

	public function all()
	{
		$values = Value::orderBy('id', 'ASC')->get();

		foreach ($values as $key => $value) {
			if ($value->image_thumb == '') {
				$value->image_thumb = $this->defaultImage;
			}
		}
		return response()->json($values, 200);
	}

	public function show($id)
	{
		$value = Value::find($id);
		return response()->json($value, 200);
	}

	public function updatePublished($id)
	{
		try {
			$value = Value::find($id);
			if ($value->published == 1) {
				$value->published = 0;
			} else{
				$value->published = 1;
			}
			$value->save();

			return response()->json(['success' => true], 200);

		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function delete($id)
	{
		try {
			$value = Value::find($id);

			$functionUpload = new ImageUploader();

			$functionUpload->delete($value->image_path,$value->image);

			$functionUpload->delete($value->image_thumb_path,$value->image_thumb);

			$value->delete();
			return response()->json(['success' => true], 200);

		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function store(ValueRequest $request)
	{
		try {
			$value = new Value();
			$data = $request->all();
			$value->fill($data);
			$value->slug = str_slug($request->title);
			$value->published = true;

			if ($request->hasFile('value_image')) {
				$img = $request->value_image;

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company/values',$img,'png',500);

				$value->image = $functionUpload->getDropboxUrl();
				$value->image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company/values',$img,'png',300);

				$value->image_thumb = $functionUpload->getDropboxUrl();
				$value->image_thumb_path = $functionUpload->getDropboxPath();
			}
			$value->save();

			return response()->json(['success' => true], 200);

		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}

	}

	public function update($id, ValueRequest $request)
	{
		try {
			$value = Value::find($id);
			$data = $request->all();
			$value->fill($data);
			$value->slug = str_slug($request->title);

			if ($request->hasFile('value_image')) {
				$img = $request->value_image;

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company/values',$img,'png',500);

				$functionUpload->delete($value->image_path,$value->image);

				$value->image = $functionUpload->getDropboxUrl();
				$value->image_path = $functionUpload->getDropboxPath();

				$functionUpload->upload('/company/values',$img,'png',300);

				$functionUpload->delete($value->image_thumb_path,$value->image_thumb);

				$value->image_thumb = $functionUpload->getDropboxUrl();
				$value->image_thumb_path = $functionUpload->getDropboxPath();
			}
			$value->save();

			return response()->json(['success' => true], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}
}
