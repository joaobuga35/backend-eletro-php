<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\BrandsEnum;

class Eletros extends Model
{
    use HasFactory, HasUuids;

    /**
    * @var string $table
    */
    protected $table = 'eletros';


    /**
    * @var array $fillable
    */

    protected $fillable = [
        'name',
        'image',
        'description',
        'tension',
        'brand'
    ];

    protected $casts = [
        'brand' => BrandsEnum::class
    ];
}
