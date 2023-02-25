<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id';

    protected $keyType = 'string';
    protected $fillable = [
        'title',
        'description',
        'level',
        'number_pages',
        'author_id',
    ];

    const LEVEL_EASY = 'EASY';
    const LEVEL_MEDIUM = 'MEDIUM';
    const LEVEL_HARD = 'HARD';

    const LANG_FR = 'FR';
    const LANG_ENG = 'ENG';
    const LANG_ITA = 'ITA';
    const LANG_DE = 'DE';
    const LANG_ESP = 'ESP';

    public static function getBookLang(): array
    {
        return [
          self::LANG_FR,
          self::LANG_ENG,
          self::LANG_ITA,
          self::LANG_DE,
          self::LANG_ESP
        ];
    }
    public static function getBookLevels(): array
    {
        return [
            self::LEVEL_EASY,
            self::LEVEL_MEDIUM,
            self::LEVEL_HARD
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(Auth::class);
    }
}
