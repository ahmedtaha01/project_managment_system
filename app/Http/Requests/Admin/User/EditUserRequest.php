<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class EditUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $users = User::where('admin_id',auth()->user()->id)->pluck('id')->toArray();
        return auth()->guard('admin')->check() && in_array($this->user_id,$users);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image'     => 'mimes:png,jpg|max:8192',
            'name'      => 'required|max:255',
            'position'  => 'required|string|min:3|max:60',
            'email'     => 'required|unique:users,email,'.$this->user_id,
        ];
    }
}
