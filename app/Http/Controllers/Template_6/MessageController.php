<?php

namespace App\Http\Controllers\Template_6;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewProductoStoreRequest;
use App\Message;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller {

	public function messages_from_blog($post_id) {

		$messages = Message::whereModuleTypeId(1)
			->whereCategoriesId($post_id)
			->with('replies.user.customer')
			->with('user.customer')
			->where('response', NULL)
			->get();

		return $messages;
	}

	public function store_blog_message(Request $request) {
		$message = new Message;

		$message->user_id = Auth::user()->id;
		$message->module_type_id = 1;
		$message->categories_id = $request->categories_id;
		$message->title = '';
		$message->message = $request->message;
		$message->response = ($request->root) ? $request->root : NULL;
		$message->slug = '';
		$message->point = 0;
		$message->status = 1;
		$message->date = Carbon::now()->format('Y-m-d');
		$message->hour = Carbon::now()->format('H:i:s');
		$message->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha registrado el mensaje'], 201);
	}

	public function view_leave_review() {
		// $path = $this->get_current_company_path();
		return view('template_6.catalog.perfil.leave_review', compact(''));
	}

	public function store_review(ReviewProductoStoreRequest $request) {

		$message = new Message;

		$message->user_id = Auth::user()->id;
		$message->module_type_id = 2;
		$message->categories_id = $request->product_id;
		$message->title = $request->title;
		$message->message = $request->message;
		$message->slug = str_slug($request->title);
		$message->point = $request->point;
		$message->status = 1;
		$message->date = Carbon::now()->format('Y-m-d');
		$message->hour = Carbon::now()->format('H:i:s');
		$message->save();

		return response()->json(['title' => 'Operación Exitosa', 'message' => 'Se ha registrado su opinión'], 201);
	}
}
