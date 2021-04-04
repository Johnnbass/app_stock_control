<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'address'];

    /**
     * Field validation rules
     * 
     * @return Array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'email',
            'address' => 'required|min:10|max:200'
        ];
    }

    /**
     * Rules feedback texts
     * 
     * @return Array
     */
    public function feedback()
    {
        return [
            'name.required' => 'O nome deve ser informado',
            'name.min' => 'O Nome deve ter no mínimo 3 caracteres',
            'name.max' => 'O Nome deve ter no máximo 50 caracteres',
            'email.email' => 'Deve ser informado um e-mail válido',
            'address.required' => 'O endereço deve ser informado',
            'address.min' => 'O Endereço deve ter no mínimo 10 caracteres',
            'address.max' => 'O Endereço deve ter no máximo 200 caracteres'
        ];
    }
}
