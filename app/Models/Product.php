<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['vendor_id', 'category_id', 'name', 'description', 'amount'];

    /**
     * Field validation rules
     * 
     * @return Array
     */
    public function rules()
    {
        return [
            'vendor_id' => 'exists:vendors,id',
            'category_id' => 'exists:categories,id',
            'name' => 'required|min:5|max:50',
            'description' => 'required|min:10|max:2000',
            'amount' => 'numeric'
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
            'vendor_id.exists' => 'O fornecedor informado não existe',
            'category_id.exists' => 'A categoria informada não existe',
            'name.required' => 'O nome deve ser informado',
            'name.min' => 'O Nome deve ter no mínimo 5 caracteres',
            'name.max' => 'O Nome deve ter no máximo 50 caracteres',
            'description.required' => 'Uma descrição deve ser informada',
            'description.min' => 'A descrição deve ter no mínimo 10 caracateres',
            'description.max' => 'A descrição deve ter no máximo 2000 caracteres',
            'amount.numeric' => 'A quantidade deve ser um valor numérico'
        ];
    }

    public function vendor()
    {
        return $this->belongsTo('App\Models\Vendor');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
