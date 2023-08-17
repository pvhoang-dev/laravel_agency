<?php

namespace App\Models;

use App\Enums\ObjectLanguageTypeEnum;
use App\Enums\PostCurrencySalaryEnum;
use App\Enums\PostStatusEnum;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Post extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'company_id',
        'job_title',
        'city',
        'status',
        'district',
        'remotable',
        'can_parttime',
        'min_salary',
        'max_salary',
        'currency_salary',
        'requirement',
        'start_date',
        'end_date',
        'number_applicants',
        'status',
        'is_pinned',
        'slug',
    ];

    //    protected $appends = [
    //        'currency_salary_code',
    //    ];

    protected static function booted(): void
    {
        static::creating(static function ($object) {
            $object->user_id = user()->id;
            $object->status = 1;
        });
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'job_title'
            ]
        ];
    }

    public function getCurrencySalaryCodeAttribute(): string
    {
        return PostCurrencySalaryEnum::getKey($this->currency_salary);
    }

    public function getStatusNameAttribute(): string
    {
        return PostStatusEnum::getKey($this->status);
    }

    public function getLocationAttribute(): string
    {
        if(!empty($this->district)){
            return $this->district . ' - ' . $this->city;
        }

        return $this->city;
    }
    public function languages() : morphToMany
    {
        return $this->morphToMany(
            Language::class,
            'object',
            ObjectLanguage::class,
            'object_id',
            'language_id'
        );
    }

    public function company() : belongsTo
    {
        return $this->belongsTo(Company::class);
    }
}