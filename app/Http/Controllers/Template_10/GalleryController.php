<?php

namespace App\Http\Controllers\Template_10;

use App\Gallery;
use App\Content;
use App\GalleryCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Uploaders\ImageUploader;
use Session;


class GalleryController extends Controller {

	public function all() {

		$company_id = $this->get_company_id_of_user_logged();
		
		$galleries = Gallery::whereCompanyId($company_id)->get();

		return $galleries;
	}

	public function show() {
		$galleries = Gallery::all();
		return view('template_10.service.index', compact('galleries'));
	}

	public function store(GalleryRequest $request) {
		$data = $request->all();
		$data['slug'] = str_slug($data['title']);
		$data['published'] = true;
		
		$gallery = new Gallery();
		$gallery->fill($data);
		$gallery->company_id = $this->get_company_id_of_user_logged();

		if ($request->hasFile('image')) {

			$img = $request->image;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/galleries/images', $img, 'png');

			$gallery->image = $functionUpload->getDropboxUrl();
			$gallery->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/company/galleries/images', $img, 'png', 350);
			$gallery->image_thumb = $functionUpload->getDropboxUrl();
			$gallery->image_thumb_path = $functionUpload->getDropboxPath();
		}

		$gallery->save();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha creado la galería.']);
	}

	public function update($id, GalleryRequest $request) {

		$data = $request->all();
		$data['slug'] = str_slug($data['title']);
		$data['published'] = true;

		$gallery = Gallery::find($id);
		$gallery->fill($data);

		if ($request->hasFile('image')) {

			$img = $request->image;

			$functionUpload = new ImageUploader();
			$functionUpload->upload('/company/galleries/images', $img, 'png');

			$functionUpload->delete($gallery->image_path, $gallery->image);

			$gallery->image = $functionUpload->getDropboxUrl();
			$gallery->image_path = $functionUpload->getDropboxPath();

			$functionUpload->upload('/company/galleries/images', $img, 'png', 350);
			$functionUpload->delete($gallery->image_thumb_path, $gallery->image_thumb);

			$gallery->image_thumb = $functionUpload->getDropboxUrl();
			$gallery->image_thumb_path = $functionUpload->getDropboxPath();
		}

		$gallery->save();
		return;
	}

	public function delete($id) {

		$gallery = Gallery::find($id);
		$functionUpload = new ImageUploader();
		$functionUpload->delete($gallery->image_path, $gallery->image);
		$functionUpload->delete($gallery->image_thumb_path, $gallery->image_thumb);
		$gallery->delete();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha eliminado el registro'], 200);

	}

	public function update_published($id) {
		$notice = Gallery::find($id);

		$notice->published = ($notice->published == 1) ? 0 : 1;
		$notice->save();
		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha cambiado el estado'], 200);
	}

	public function show_view() {
		$gallery_categories = GalleryCategory::wherePublished(1)
			->with(['galleries' => function ($query) {
				$query->wherePublished(1);
			}])->get();




		$path = $this->get_current_company_path();

		return view("{$path}.gallery.index", compact('gallery_categories'));
	}

	public function show_view_perfil($slug) {

		/*$service = Service::whereSlug($slug_service)
			->first();*/

		

		$galleries_perfil = Gallery::whereSlug($slug)
			->wherePublished(1)
			->with('photos')->get();


		//$date_time = Carbon::createFromFormat('d/m/Y', $products[0]->date)->format('Y-m-d');


		//$carbon = new \Carbon\Carbon();
			//setlocale(LC_ALL,"es_ES");
		//$date_time = Carbon::parse(strtotime($products[0]->date))->formatLocalized("%A %d de %B del %Y");  

	/*	setlocale(LC_ALL, 'es_ES');
		$fecha = Carbon::parse($products[0]->date);
		$fecha->format("F"); // Inglés.
		$date_time = $fecha->formatLocalized('%A %d de %B del %Y');// mes en idioma español

		
    */

    

		//$video = Content::whereModel_type(1)->where('type', '=', 2)->where('deleted_at', '=', null)->get();


      /*  if ($galleries_perfil[0]->link) {
            

            $video=$galleries_perfil[0]->link;
            $url_parsed_arr = parse_url($video);
            $video_gallery = substr($url_parsed_arr['query'], 2);
            //dd($video);

        } else {
            $video_gallery='';
        }
*/



		//return view("{$path}.gallery.perfil.index", compact('galleries_perfil','video_gallery'));
		return view('template_10.service.perfil.index', compact('galleries_perfil'));
	}

	
}
