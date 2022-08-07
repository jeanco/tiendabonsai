<?php

namespace App\Http\Controllers\Admin;

use App\Campaign;
use App\Http\Controllers\Controller;
use App\Uploaders\ImageUploader;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
  public function all(Request $request, $id_category)
  { 
    $campaigns = Campaign::all()->where('category_id','=',$id_category);
    foreach ($campaigns as $key => $value) {
      $value->title= strip_tags($value->title);
    }
    return $campaigns;
  }

  public function show($id)
  {
    $campaign = Campaign::find($id);
    return $campaign;
  }

  public function store(Request $request)
  {
    $data = $request->all();
    $campaign = new Campaign();
    $campaign->fill($data);
    $campaign->published = true;

    if ($request->is_blank == 'true') {
      $campaign->is_blank = true;
    } else if ($request->is_blank == 'false') {
      $campaign->is_blank = false;
    }

    $functionUpload = new ImageUploader();

    if ($request->hasFile('cover')) {
      
      $img = $request->cover;

      $functionUpload->upload('/company/campaigns/images', $img, 'png', 1600);

      $campaign->image = $functionUpload->getDropboxUrl();
      $campaign->image_path = $functionUpload->getDropboxPath();
    }

    if ($request->hasFile('image_thumb')) {

      $img_thumb = $request->image_thumb;

      $functionUpload->upload('/company/campaigns/images', $img_thumb, 'png', 900);
      $campaign->image_thumb = $functionUpload->getDropboxUrl();
      $campaign->image_thumb_path = $functionUpload->getDropboxPath();
    }

    $campaign->save();
    return;
  }

  public function update($id, Request $request)
  {
    $data = $request->all();

    $campaign = Campaign::find($id);
    $campaign->fill($data);
    if ($request->is_blank == 'true') {
      $campaign->is_blank = true;
    } else if ($request->is_blank == 'false') {
      $campaign->is_blank = false;
    }

    $functionUpload = new ImageUploader();

    if ($request->hasFile('cover')) {

      $img = $request->cover;

      $functionUpload->upload('/company/campaigns/images', $img, 'png', 1600);
      $functionUpload->delete($campaign->image_path, $campaign->image);

      $campaign->image = $functionUpload->getDropboxUrl();
      $campaign->image_path = $functionUpload->getDropboxPath();

    }

    if ($request->hasFile('image_thumb')) {

      $image_thumb = $request->image_thumb;

      $functionUpload->upload('/company/campaigns/images', $image_thumb, 'png', 900);
      $functionUpload->delete($campaign->image_thumb_path, $campaign->image_thumb);
      $campaign->image_thumb = $functionUpload->getDropboxUrl();
      $campaign->image_thumb_path = $functionUpload->getDropboxPath();

    }

    $campaign->save();
    return;
  }

  public function updatePublished($id)
  {
    $campaign = Campaign::find($id);
    $campaign->published = ($campaign->published == 1) ? 0 : 1;
    $campaign->save();
    return;
  }

  public function delete($id)
  {
    $campaign = Campaign::find($id);
    $functionUpload = new ImageUploader();
    $functionUpload->delete($campaign->image_path, $campaign->image);
    $functionUpload->delete($campaign->image_thumb_path, $campaign->image_thumb);
    $campaign->delete();
    return;

  }
}
