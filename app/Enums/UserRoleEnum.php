<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserRoleEnum extends Enum
{
    public const ADMIN = 1;
    public const APPLICANT = 2;
    public const HR = 3;
}
