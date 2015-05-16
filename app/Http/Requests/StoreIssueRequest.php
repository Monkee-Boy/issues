<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreIssueRequest extends Request {

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
			'title' => 'required',
			'content' => 'required',
			'assignedto' => 'required',
			'priority_id' => 'required',
			'project_id' => 'required',
			'createdby_id' => 'required',
		];
	}

}
