<?php

namespace Dpods\Uid\Services;

/**
 * Class UidService
 */
class UIDService
{
    const ALPHA_NUM = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    /**
     * @param null $prefix
     * @param int $length
     * @return string
     */
    public static function newUid($prefix = null, $length = 16) : string
    {
        $uid = '';

        if ($prefix && strlen($prefix) > 0) {
            $uid = $prefix . '_';
        }

        for ($i = 0; $i < $length; $i++) {
            $index = mt_rand() % strlen(self::ALPHA_NUM);
            $uid .= substr(self::ALPHA_NUM, $index, 1);
        }

        return $uid;
    }
}

