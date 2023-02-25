<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Author extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $keyType = 'string';

    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'rank',
        'phone',
        'mail',
        'date_of_birth',
        'email_verified_at',
    ];

    protected $casts = [
        'mail_verified_at' => 'datetime',
        'verified_at' => 'datetime',
    ];

    protected $hidden = [
        'verified_at',
        'mail_verified_at',
    ];

    const RANK_JUNIOR = 'JUNIOR';
    const RANK_MEDIUM = 'MEDIUM';
    const RANK_SENIOR = 'SENIOR';

    const NATIONALITY_FR = 'FR';
    const NATIONALITY_ENG = 'ENG';
    const NATIONALITY_ITA = 'ITA';
    const NATIONALITY_DE = 'DE';
    const NATIONALITY_ESP = 'ESP';

    public static function getNationalities(): array
    {
        return [
          self::NATIONALITY_FR,
          self::NATIONALITY_DE,
          self::NATIONALITY_ENG,
          self::NATIONALITY_ITA,
          self::NATIONALITY_ESP,
        ];
    }
    public static function getRanks(): array
    {
        return [
            self::RANK_JUNIOR,
            self::RANK_MEDIUM,
            self::RANK_SENIOR
        ];
    }

    protected function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
