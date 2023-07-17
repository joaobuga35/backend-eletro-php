<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Eletros extends Model
{
    use HasFactory, HasUuids;

    /**
    * @var string $table
    */
    protected $table = 'eletros';

    public static $brands = ['LG', 'Samsung', 'Fischer', 'Brastemp', 'Electrolux'];
    /**
    * @var array $fillable
    */

    protected $fillable = [
        'name',
        'image',
        'description',
        'tension',
        'brand',
        'price'
    ];
}
