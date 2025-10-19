<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post_232187 extends Model
{
    protected $table = 'posts_232187';
    protected $primaryKey = 'id_232187';

    protected $fillable = [
        'platform_id_232187',
        'user_name_232187',
        'content_232187',
        'created_at_232187',
        'captured_at_232187'
    ];

    public function platform()
    {
        return $this->belongsTo(Platform_232187::class, 'platform_id_232187');
    }

    public function sentiment()
    {
        return $this->hasOne(Sentiment_232187::class, 'post_id_232187');
    }

    public function topics()
    {
        return $this->hasMany(Topic_232187::class, 'post_id_232187');
    }
}
