<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseCreateRequest extends FormRequest
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
            "date" => "required|date",
            "type_id" => "nullable|exists:types,id",
            "category_id" => "nullable|exists:categories,id",
            "amount" => "required|numeric",
            "comment" => "nullable|string|max:3000",
            "company_id" => "required|exists:companies,id",
            "project_id" => "nullable|exists:projects,id",
            "employee_id" => "nullable|exists:employees,id",
            "note" => "nullable|string|max:250",
            "receipt" => "nullable",
        ];
    }
}
