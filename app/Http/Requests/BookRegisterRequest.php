<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Book;

class BookRegisterRequest extends FormRequest
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'isbn' => 'required|digits:13',
		];
	}

	public function withValidator($validator)
	{
		$validator->after(function ($validator) {
			$book = Book::where('isbn', $this->input('isbn'))->exists();
			if ($book) {
				$validator->errors()->add('isbn', '既にその書籍は登録されています。');
			}
		});
	}

	public function messages()
	{
		return [
			'isbn.required' => __('common.message.register_failed'),
			'isbn.digits' => __('common.message.register_failed'),
		];
	}
}
