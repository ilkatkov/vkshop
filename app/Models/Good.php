<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Good extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'category_id',
        'manufacturer_id',
        'description',
        'link',
        'image',
        'purchased',
        'created_at',
        'updated_at'
    ];

    /**
     * Категория товара
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Производитель товара
     */
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id');
    }

}
