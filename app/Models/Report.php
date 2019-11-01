<?php

namespace App\Models;

use App\Formatters\DateFormatter;
use App\Traits\FormatCreatedAdDateTrait;
use App\Traits\FormatModelTypeTrait;
use App\Traits\ViewedTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Report extends Model
{
    use FormatModelTypeTrait, ViewedTrait, FormatCreatedAdDateTrait;

    protected $fillable = [
        'model_type',
        'model_id',
        'type_id',
        'user_id',
        'title',
        'description',
        'is_viewed',
    ];

    /**
     * Sender.
     *
     * @return BelongsTo
     */
    public function sender()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Model.
     *
     * @return Model|BelongsTo|object|null
     */
    public function model()
    {
        return $this->belongsTo($this->model_type, 'model_id')->first();
    }

    /**
     * Type.
     *
     * @return BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ReportType::class, 'type_id');
    }

    /**
     * Checks if report is about post.
     *
     * @return bool
     */
    public function subjectIsPost(): bool
    {
        return $this->model()->getTable() == 'posts';
    }

    /**
     * Checks if report is about user.
     *
     * @return bool
     */
    public function subjectIsUser(): bool
    {
        return $this->model()->getTable() == 'users';
    }
}
