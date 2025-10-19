<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic_232187 extends Model
{
    protected $table = 'topics_232187';
    protected $primaryKey = 'id_232187';

    protected $fillable = [
        'post_id_232187', 'topic_name_232187'
    ];

    public function post()
    {
        return $this->belongsTo(Post_232187::class, 'post_id_232187');
    }
}
