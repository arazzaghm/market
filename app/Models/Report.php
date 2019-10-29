<?php

namespace App\Models;

use App\Formatters\DateFormatter;
use App\Traits\FormatModelTypeTrait;
use App\Traits\ViewedTrait;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use FormatModelTypeTrait, ViewedTrait;

    protected $fillable = [
        'model_type',
        'model_id',
        'type_id',
        'user_id',
        'title',
        'description',
        'is_viewed',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function model()
    {
        return $this->belongsTo($this->model_type, 'model_id')->first();
    }

    public function type()
    {
        return $this->belongsTo(ReportType::class, 'type_id');
    }

    public function formatCreatedAtDate(): string
    {
        $date = new DateFormatter($this->created_at);

        return $date->format();
    }

    public function subjectIsPost(): bool
    {
        return $this->model()->getTable() == 'posts';
    }

    public function subjectIsUser(): bool
    {
        return $this->model()->getTable() == 'users';
    }
}
