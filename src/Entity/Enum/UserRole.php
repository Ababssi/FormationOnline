<?php

declare(strict_types=1);

namespace App\Entity\Enum;

enum UserRole: string
{
    case ROLE_STUDENT = 'ROLE_STUDENT';
    case ROLE_TEACHER = 'ROLE_TEACHER';
    case ROLE_ADMIN = 'ROLE_ADMIN';
    case ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';
    case ROLE_CO_TEACHER = 'ROLE_CO-TEACHER';
    case ROLE_COURSE_CREATOR = 'ROLE_COURSE_CREATOR';
    case ROLE_REVIEWER = 'ROLE_REVIEWER';
    case ROLE_MENTOR = 'ROLE_MENTOR';
    case ROLE_GUEST = 'ROLE_GUEST';
}