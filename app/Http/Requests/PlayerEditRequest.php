<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerEditRequest extends FormRequest
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
            
				"sportsid" => "filled",
				"playernamenepali" => "filled|string",
				"playernameenglish" => "filled|string",
				"permanentaddress" => "filled",
				"temporaryaddress" => "nullable",
				"dob" => "filled|date",
				"citizenshipno" => "filled|string",
				"qualification" => "nullable|string",
				"weight" => "nullable|numeric",
				"height" => "nullable|numeric",
				"schoolname" => "nullable|string",
				"playercontact" => "nullable|string",
				"fathersname" => "nullable|string",
				"mothersname" => "nullable|string",
				"parentscontact" => "nullable|string",
				"coachname" => "nullable|string",
				"coachcontact" => "nullable|string",
				"signature" => "nullable",
				"photo" => "nullable",
				"isapproved" => "nullable|numeric",
            
        ];
    }

	public function messages()
    {
        return [
			
            //using laravel default validation messages
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            //eg = 'name' => 'trim|capitalize|escape'
        ];
    }
}
