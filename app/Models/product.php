<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    // Jika nama tabel sudah sesuai konvensi Laravel ("products"), ini sebenarnya tidak perlu
    protected $table = 'products';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'sku',
        'price',
        'stock',
        'product_category_id',
        'image_url',
        'is_active'
    ];

    // Relasi ke kategori produk
    public function category()
    {
        return $this->belongsTo(Categories::class, 'product_category_id');
    }
}