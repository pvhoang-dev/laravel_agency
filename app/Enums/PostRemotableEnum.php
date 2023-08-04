<?php declare(strict_types=1);

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PostRemotableEnum extends Enum
{
    public const REMOTE_ONLY = '1';
    public const OFFICE_ONLY = '2';
    public const DYNAMIC = '3';
}
