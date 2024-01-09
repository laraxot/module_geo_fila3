<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

// use GeneaLabs\LaravelModelCaching\Traits\Cachable;
// //use Laravel\Scout\Searchable;

use Illuminate\Database\Eloquent\Model;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model
{
    use Updater;

    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    protected $perPage = 30;

    // use Searchable;
    // use Cachable;

    /**
     * @var string[]
     */
    protected $fillable = ['id'];
<<<<<<< HEAD

=======
>>>>>>> dev
    /**
     * @var array<string, string>
     */
    protected $casts = ['published_at' => 'datetime', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
<<<<<<< HEAD

=======
>>>>>>> dev
    /**
     * @var string
     */
    protected $primaryKey = 'id';
<<<<<<< HEAD

=======
>>>>>>> dev
    /**
     * @var bool
     */
    public $incrementing = true;
<<<<<<< HEAD

=======
>>>>>>> dev
    /**
     * @var array<int, string>
     */
    protected $hidden = [
        // 'password'
    ];
<<<<<<< HEAD

=======
>>>>>>> dev
    /**
     * @var bool
     */
    public $timestamps = true;
<<<<<<< HEAD

=======
>>>>>>> dev
    protected $connection = 'geo';
}
