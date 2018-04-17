<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user()
    {
        return $this->hasOne( User::class);
    }

    public function picture()
    {
        return $this->hasOne(picture::class);
    }

    protected $fillable = ['id_user', 'id_picture'];
    public $timestamps = false;
}