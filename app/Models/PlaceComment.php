<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceComment extends Model
{
    use HasFactory;

    protected $table = 'place_comments';

    protected $fillable = ['name', 'email', 'comment', 'place_id'];

    public function reply()
    {
        return $this->hasOne(PlaceCommentReply::class, 'comment_id', 'id');
    }
}
