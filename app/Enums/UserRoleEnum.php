<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    public const SUPER_ADMIN = 1;
    public const ADMIN = 2;
    public const APPLICANT = 3;
    public const HR = 4;

    public static function getRolesForRegister()
    {
        return [
            'applicant' => self::APPLICANT,
            'hr' => self::HR,
        ];
    }
}
