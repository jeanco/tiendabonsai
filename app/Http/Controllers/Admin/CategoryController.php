<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Product;
use App\Subcategory;
use App\Uploaders\ImageUploader;
use Auth;

class CategoryController extends Controller {
	public function all() {
		$categories = Category::orderBy('id', 'ASC')->get();
		return $categories;
	}

	public function show($id) {
		$category = Category::find($id);
		return $category;
	}

	public function getSubcategories($id) {
		$category = Category::with('subcategories')->find($id);
		return $category->subcategories;
	}

	public function getFirst() {
		$category = Category::first();
		return $category;
	}

	public function getFirstSubcategory($category_id) {
		$subcategory = Subcategory::where('category_id', $category_id)
			->first();
		return $subcategory;
	}

	public function getProductsByCategoryAndSubcategory($category_id, $subcategory_id) {

		$user = Auth::user();
		$company_id = $user->company_id;

		$products = Product::where('category_id', $category_id)
			->where('subcategory_id', $subcategory_id)
			->with('random_image')
			->whereCompanyId($company_id)
			->get();

		return $products;
	}

	public function store(CategoryCreateRequest $request) {
		$data = $request->all();
		$category = new Category();
		$category->fill($data);
		$category->slug = str_slug($data['name']);

		$functionUpload = new ImageUploader();

		if ($request->hasFile('category_image')) {

			$img = $request->category_image;

			$functionUpload->upload('/categories', $img, 'png', 600);

			$category->image = $functionUpload->getDropboxUrl();
			$category->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/categories', $img, 'png', 300);
			$category->image_thumb = $functionUpload->getDropboxUrl();
			$category->image_thumb_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('category_icon')) {

			$icon = $request->category_icon;

			$functionUpload->upload('/categories', $icon, 'png', 600);

			$category->icon = $functionUpload->getDropboxUrl();
			$category->icon_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('category_icon_white')) {

			$icon_white = $request->category_icon_white;

			$functionUpload->upload('/categories', $icon_white, 'png', 600);

			$category->icon_white = $functionUpload->getDropboxUrl();
			$category->icon_white_path = $functionUpload->getDropboxPath();
		}

		$category->save();
		return;

	}

	public function update($id, CategoryUpdateRequest $request) {
		$data = $request->all();
		$category = Category::find($id);
		$category->fill($data);
		$category->slug = str_slug($data['name']);

		$functionUpload = new ImageUploader();

		if ($request->hasFile('category_image')) {

			$img = $request->category_image;

			$functionUpload->upload('/categories', $img, 'png', 600);
			$functionUpload->delete($category->image_path, $category->image);

			$category->image = $functionUpload->getDropboxUrl();
			$category->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/categories', $img, 'png', 300);
			$functionUpload->delete($category->image_thumb_path, $category->image_thumb);
			$category->image_thumb = $functionUpload->getDropboxUrl();
			$category->image_thumb_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('category_icon')) {

			$icon = $request->category_icon;

			$functionUpload->upload('/categories', $icon, 'png', 600);
			$functionUpload->delete($category->icon_path, $category->icon);

			$category->icon = $functionUpload->getDropboxUrl();
			$category->icon_path = $functionUpload->getDropboxPath();
		}

		if ($request->hasFile('category_icon_white')) {

			$icon_white = $request->category_icon_white;

			$functionUpload->upload('/categories', $icon_white, 'png', 600);
			$functionUpload->delete($category->icon_white_path, $category->icon_white);

			$category->icon_white = $functionUpload->getDropboxUrl();
			$category->icon_white_path = $functionUpload->getDropboxPath();
		}

		$category->save();
		return;

	}

	public function delete($id) {

		$category = Category::with('products')
			->with('subcategories')
			->find($id);

		if (count($category->products) || count($category->subcategories)) {
			return response()->json(['success' => false, 'message' => 'Esta categoría tiene productos o subcategorìas'], 400);
		} else {
			$functionUpload = new ImageUploader();

			$functionUpload->delete($category->image_path, $category->image);
			$functionUpload->delete($category->image_thumb_path, $category->image_thumb);
			$functionUpload->delete($category->icon_path, $category->icon);
			$functionUpload->delete($category->icon_white_path, $category->icon_white);

			$category->delete();
			return;

		}

	}

}
