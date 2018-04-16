<?php
namespace App;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function user_bde()
    {
        return $this->hasOne(user_bde::class);
    }

    public function picture()
    {
        return $this->hasOne(picture::class);
    }

    protected $fillable = ['id_user', 'id_picture'];
    public $timestamps = false;
}