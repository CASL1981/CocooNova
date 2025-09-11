<?php

namespace App\Livewire\Forms;

use Illuminate\Validation\Rule;
use Livewire\Form;

class UserForm extends Form
{
    public $identification = '';

    public $name = '';

    public $lastname = '';

    public $area = '';

    public $email = '';

    public $status = '';

    public $role_id = '';

    public $destination = '';

    public $password = '';

    public $selected_id = 0;

    protected function rules()
    {
        return [
            'identification' => ['required', 'string','min:7', 'max:12',
                                'regex:/^\\d{7,12}$/',
                                Rule::unique('users', 'identification')->ignore($this->selected_id)],
            'name'           => 'required|min:3|max:100',
            'lastname'       => 'required|min:3|max:100',
            'email'          => ['required', 'max:100', 'email', Rule::unique('users')->ignore($this->selected_id)],
            'area'           => 'required|in:Administrativa,Comercial,Farmacia,Financiero',
            'status'         => 'nullable',
            'role_id'        => 'nullable',
            'destination'    => 'nullable',
        ];
    }
}