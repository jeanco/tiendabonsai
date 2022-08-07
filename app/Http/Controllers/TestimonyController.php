<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestimonyRequest;
use App\Http\Requests\TestimonyUpdateRequest;
use App\Testimony;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class TestimonyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function landing()
    {
        $testimonies = Testimony::wherePublished(true)->get();

        $data = [];
        foreach ($testimonies as $key => $testimony) {
            $data[] = [
                'imageUrl' => $testimony->image,
                'description' => $testimony->description,
                'fullName' => $testimony->full_name,
                'city' => $testimony->city
            ];
        }
        return response()->json(['data' => $data], 200);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonies = Testimony::wherePublished(true)->get();

        $data = [];
        foreach ($testimonies as $key => $testimony) {
            $data[] = [
                'imageUrl' => $testimony->image,
                'title' => $testimony->title
            ];
        }

        return response()->json(['data' => $data], 200);
    }

    public function all()
    {
        $testimonies = Testimony::all();
        return response()->json($testimonies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonyRequest $request)
    {
        try {
            $data = $request->all();
            $testimony = new Testimony();
            $testimony->fill($data);

            if ($request->hasFile('image')) {
                $img = $request->image;

                $functionUpload = new ImageUploader();
                $functionUpload->upload('/company/testimonies',$img,'png',400);

                $testimony->image = $functionUpload->getDropboxUrl();
                $testimony->image_path = $functionUpload->getDropboxPath();
            }
            $testimony->published = true;
            $testimony->save();

            return response()->json(['success' => true], 200);
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
    public function show($id)
    {
        $testimony = Testimony::find($id);
        return response()->json($testimony, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonyUpdateRequest $request, $id)
    {
        try {
            $testimony = Testimony::find($id);
            $testimony->fill($request->all());

            if ($request->hasFile('image')) {
                    $img = $request->image;

                    $functionUpload = new ImageUploader();
                    $functionUpload->upload('/company/testimonies',$img,'png',400);
                    $functionUpload->delete($testimony->image_path, $testimony->image);

                    $testimony->image = $functionUpload->getDropboxUrl();
                    $testimony->image_path = $functionUpload->getDropboxPath();
            }
            $testimony->save();
            return response()->json(['success' =>  true], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false], 200);
        }
    }

    public function updatePublish(Request $request)
    {
        try {
            $lastStatus = $request->lastStatus;
            $testimony = Testimony::find($request->testimonyId);

            if ($lastStatus == true) {
                $testimony->published = false;
                $testimony->save();
            } else {
                $testimony->published = true;
                $testimony->save();
            }
            return response()->json(['success' => true], 200);
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
    public function destroy($id)
    {
        //
    }

    public function delete($id)
    {
        try {
            $testimony = Testimony::find($id);
            $functionUpload = new ImageUploader();
            $functionUpload->delete($testimony->image_path, $testimony->image);
            $testimony->delete();

            return response()->json(['success' => true], 200);
        } catch (Exception $e) {
            return response()->json(['success' => false], 200);
        }
    }
}
