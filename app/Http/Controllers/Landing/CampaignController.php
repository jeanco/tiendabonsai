<?php

namespace App\Http\Controllers\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Campaign;

class CampaignController extends Controller
{
  public function all()
  {
    $campaigns = Campaign::where('published', 1)->get();

    $t = [];

    foreach ($campaigns as $i => $campaign) {
      $t[] = array(
        // 'backgroundUrl' => $campaign->cover,
        // 'backgroundUrlThumb' => $campaign->cover_thumb,
        'title' => $campaign->title,
        'subtitle' => $campaign->subtitle,
        'content' => $campaign->content,
        'imageUrl' => $campaign->image,
        'imageUrlThumb' => $campaign->image_thumb,
        'linkText' => $campaign->link_text,
        'linkUrl' => $campaign->link,
        'isBlank' => (boolean) $campaign->is_blank,
      );
    }

    return response()->json(['data' => $t], 200);
  }
}
