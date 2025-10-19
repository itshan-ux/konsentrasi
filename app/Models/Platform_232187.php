<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Platform_232187 extends Model
{
    protected $table = 'platforms_232187';
    protected $primaryKey = 'id_232187';

    protected $fillable = ['name_232187', 'base_url_232187'];

    public function posts()
    {
        return $this->hasMany(Post_232187::class, 'platform_id_232187');
    }
}
