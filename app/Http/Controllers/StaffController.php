<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffSaveRequest;
use App\Staff;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class StaffController extends Controller {

	public function by_place($place_id)
	{
		$staff = Staff::wherePlaceId($place_id)
			->get();
		return $staff;
	}

	public function index() {
		$testimonies = Testimony::wherePublished(true)->get();

		$data = [];
		foreach ($testimonies as $key => $testimony) {
			$data[] = [
				'imageUrl' => $testimony->image,
				'title' => $testimony->title,
			];
		}

		return response()->json(['data' => $data], 200);
	}

	public function all() {
		$staff = Staff::all();
		return response()->json($staff);
	}

	public function store(StaffSaveRequest $request) {
		try {
			$data = $request->all();
			$staff = new Staff();
			$staff->fill($data);

			if ($request->hasFile('image')) {
				$img = $request->image;

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company/staff', $img, 'png', 400);

				$staff->image = $functionUpload->getDropboxUrl();
				$staff->image_path = $functionUpload->getDropboxPath();
			}

			$staff->save();

			return response()->json(['success' => true, 'message' => 'Se ha creado'], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$staff = Staff::find($id);
		return response()->json($staff, 200);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StaffSaveRequest $request, $id) {
		try {
			$staff = Staff::find($id);
			$staff->fill($request->all());

			if ($request->hasFile('image')) {
				$img = $request->image;

				$functionUpload = new ImageUploader();
				$functionUpload->upload('/company/testimonies', $img, 'png', 400);
				$functionUpload->delete($staff->image_path, $staff->image);

				$staff->image = $functionUpload->getDropboxUrl();
				$staff->image_path = $functionUpload->getDropboxPath();
			}
			$staff->save();
			return response()->json(['success' => true, 'message' => 'Se ha actualizado'], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	public function updatePublish($id, Request $request) {
		try {
			$staff = Staff::find($id);
			$staff->published = !$staff->published;
			$staff->save();
			return response()->json(['success' => true, 'message' => 'Se ha cambiado el estado'], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		//
	}

	public function delete($id) {
		try {
			$staff = Staff::find($id);
			$functionUpload = new ImageUploader();
			$functionUpload->delete($staff->image_path, $staff->image);
			$staff->delete();

			return response()->json(['success' => true, 'message' => 'Se ha eliminado'], 200);
		} catch (Exception $e) {
			return response()->json(['success' => false], 200);
		}
	}
}
