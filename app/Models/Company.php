<?php

namespace App\Models;

use App\Formatters\PhoneNumberFormatter;
use App\Traits\FormatCreatedAdDateTrait;
use App\Traits\ReportableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Company extends Model implements HasMedia
{
    use FormatCreatedAdDateTrait, HasMediaTrait;

    protected $fillable = ['name', 'email', 'phone', 'description'];

    /**
     * User.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Posts.
     *
     * @return HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Gets formatted phone number.
     *
     * @return string
     */
    public function getFormattedPhoneNumber(): string
    {
        $phoneNumber = new PhoneNumberFormatter($this->phone);

        return $phoneNumber->format();
    }
}
