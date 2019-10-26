<?php

namespace App\Models;

use App\Formatters\DateFormatter;
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

    public function isViewed()
    {
        return $this->is_viewed == true;
    }

    public function isNotViewed()
    {
        return !$this->isViewed() ? true : false;
    }

    public function makeViewed()
    {
        $this->update(['is_viewed' => true]);
    }

    public function makeNotViewed()
    {
        $this->update(['is_viewed' => false]);
    }

    public static function notViewed()
    {
        return self::where('is_viewed', false);
    }

    public static function countNotViewed()
    {
        return self::notViewed()->count();
    }
}
