<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Product;
use App\Post;
use stdClass;

class WebController extends Controller
{
	protected $description;
	protected $imageUrl;
	protected $companyName;
	protected $twitterPage;
	protected $title;

	public function __construct()
	{
		$company = Company::first();
		$this->description = $company->description_company;
		$this->imageUrl = (count($img  = $this->getOneRandomImage(1,1,null)) ? $img->resource_thumb : "https://dl.dropboxusercontent.com/u/82668656/IMAGEN1.png" );
		$this->companyName = $company->name_company;
		$this->twitterPage = $company->twitter;
		$this->title = $company->name_company;
	}

  public function getIndex ($categorySlug = null, $subCategorySlug = null)
  {
    $head = new stdClass;

    // Meta Company
    $head->description = $this->description;
    $head->imageUrl = $this->imageUrl;
    $head->companyName = $this->companyName;
    $head->twitterPage = $this->twitterPage;
    $head->title = $this->title;
    $head->url = url()->current();
    // End Meta Company

    return view('landing.index', compact('head'));
  }

  public function getIndexItem ($itemSlug = null)
  {
    $head = new stdClass;

    if ($itemSlug != null) {
      $item = Product::where('slug',$itemSlug)->first();
      if (count($item)) {
          $head->description = substr(strip_tags($item->description), 0, 100).'...';
          $head->imageUrl = (count($img  = $this->getOneRandomImage($item->id,2,null)) ? $img->resource_thumb : "https://dl.dropboxusercontent.com/u/82668656/IMAGEN1.png" );
          $head->companyName = $this->companyName;
          $head->twitterPage = $this->twitterPage;
          $head->title = $item->name;
          $head->url = route('item', $itemSlug);
      }
      else {
        return redirect()->route('catalog');
      }
    }
    if ($itemSlug == null) {
      return redirect()->route('catalog');
    }
    return view('landing.index', compact('head'));
  }

  public function getIndexPost ($postSlug)
  {
    $head = new stdClass;
		if ($postSlug != null) {
			$post = Post::where('slug',$postSlug)->first();
			if (count($post)) {
				$head->description = substr(strip_tags($post->content), 0, 100).'...';
				$head->imageUrl = (count($img  = $this->getOneRandomImage($post->id,3,null)) ? $img->resource_thumb : "https://dl.dropboxusercontent.com/u/82668656/IMAGEN1.png" );
				$head->companyName = $this->companyName;
				$head->twitterPage = $this->twitterPage;
				$head->title = $post->title;
				$head->url = route('post', $postSlug);
      }
      else {
        return redirect()->route('posts');
      }
    }
      return view('landing.index', compact('head'));
    }
  }
