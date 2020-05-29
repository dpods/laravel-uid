<?php

namespace Dpods\Uid\Traits;

use Dpods\Uid\Services\UIDService;

trait UID
{
    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->uid = UidService::newUid(self::$uidPrefix);
        });
    }

    /**
     * @param string $uid
     * @return static
     */
    public static function findByUid($uid)
    {
        return static::where('uid', '=', $uid)->get()->first();
    }
}
