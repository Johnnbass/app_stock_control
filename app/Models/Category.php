<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    /**
     * Field validation rules
     * 
     * @return Array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:5|max:50',
            'description' => 'max:100'
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
            'name.min' => 'O Nome deve ter no mínimo 5 caracteres',
            'name.max' => 'O Nome deve ter no máximo 50 caracteres',
            'description.max' => 'A descrição deve ter no máximo 100 caracteres'
        ];
    }
}
