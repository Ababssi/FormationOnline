<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum UserStatus: string
{
    case ACTIVE = 'ACTIVE';
    case INACTIVE = 'INACTIVE';
    case DELETED = 'DELETED';
    case BLOCKED = 'BLOCKED';
    case PENDING = 'PENDING';
    case SUSPENDED = 'SUSPENDED';
    case GRACE_PERIOD = 'GRACE_PERIOD';
    case EXPIRED = 'EXPIRED';
    case PENDING_DELETION = 'PENDING_DELETION';
    case PENDING_ACTIVATION = 'PENDING_ACTIVATION';
    case PENDING_APPROVAL = 'PENDING_APPROVAL';
    case PENDING_REVIEW = 'PENDING_REVIEW';
    case PENDING_VERIFICATION = 'PENDING_VERIFICATION';
}