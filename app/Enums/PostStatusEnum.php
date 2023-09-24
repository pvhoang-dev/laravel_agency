<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;


final class PostStatusEnum extends Enum
{
    public const PENDING = 1;
    public const ADMIN_PENDING = 2;
    public const ADMIN_APPROVED = 3;

    public static function getByRole() : int
    {
        if(isSuperAdmin()){
            return self::ADMIN_APPROVED;
        }

        if(isAdmin()){
            return self::ADMIN_PENDING;
        }

        return self::PENDING;
    }
}
