<?php

namespace App\Models;

use App\Formatters\PhoneNumberFormatter;
use App\Interfaces\HasReports;
use App\Traits\FormatCreatedAdDateTrait;
use App\Traits\Reportable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Company extends Model implements HasMedia, HasReports
{
    use FormatCreatedAdDateTrait, HasMediaTrait, Reportable;

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

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('small')
            ->fit('crop', 300, 300);
        $this->addMediaConversion('medium')
            ->width(600);
    }

    public function getLogoUrl($size = 'small')
    {
        return $this->getFirstMedia('logo')
            ? $this->getFirstMediaUrl('logo', 'small')
            : asset('img/default_post_picture.jpg');
    }
}
