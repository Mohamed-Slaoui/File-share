<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File_Tag extends Model
{
    use HasFactory;

    protected $fillable = ["file_id", "tag_id"];

    public function file(){
        return $this->belongsTo(File::class);
    }

    public function tag(){
        return $this->belongsTo(Tag::class);
    }
}
