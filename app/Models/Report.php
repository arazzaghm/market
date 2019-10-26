<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'model_type',
        'model_id',
        'type_id',
        'user_id',
        'title',
        'description',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function model()
    {
        return $this->belongsTo($this->model_type, 'model_id');
    }
}
