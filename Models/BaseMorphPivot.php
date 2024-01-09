<?php

declare(strict_types=1);

namespace Modules\Geo\Models;

use Illuminate\Database\Eloquent\Relations\MorphPivot;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseMorphPivot.
 */
abstract class BaseMorphPivot extends MorphPivot
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

    /**
     * @var array
     */
    protected $appends = [];
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
     * @var bool
     */
    public $timestamps = true;
<<<<<<< HEAD

=======
>>>>>>> dev
    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'post_id', 'post_type',
        'related_type',
        'user_id',
        'note',
    ];
<<<<<<< HEAD

    protected $connection = 'geo';

=======
    protected $connection = 'geo';
>>>>>>> dev
    protected $casts = ['created_at' => 'datetime', 'updated_at' => 'datetime', 'deleted_at' => 'datetime'];
}
