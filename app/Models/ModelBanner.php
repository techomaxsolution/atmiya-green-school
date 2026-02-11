<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelBanner extends Model
{
    protected $table = 'model_banners';
    protected $primaryKey = 'id';

    protected $fillable =['image', 'status'];
    use HasFactory;
}
