<?php

namespace App\Enums\Employee;

use  App\Supports\Enum;

enum EmployeeRoles: int {
    use enum;

    case Staff = 1;
    case Manager = 2;
}
