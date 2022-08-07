<?php

namespace App\Http\Controllers\Template_15;

use App\Campaign;
use App\Category;
use App\Company;
use App\Agreetment;
use App\Entities\CompanyCategory;
use App\Http\Controllers\Controller;
use App\Post;
use App\Product;
use App\Content;
use App\Service;
use App\Subcategory;
use App\Value;
use Illuminate\Contracts\View\View;
use Carbon\Carbon;
use Jenssegers\Date\Date;

class ComplaintBookController extends Controller {
  public function show_view()  {
      return view('template_15.complaints_book.index');
  }
}
