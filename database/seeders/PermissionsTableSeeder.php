<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'category_create',
            ],
            [
                'id'    => 18,
                'title' => 'category_edit',
            ],
            [
                'id'    => 19,
                'title' => 'category_show',
            ],
            [
                'id'    => 20,
                'title' => 'category_delete',
            ],
            [
                'id'    => 21,
                'title' => 'category_access',
            ],
            [
                'id'    => 22,
                'title' => 'service_create',
            ],
            [
                'id'    => 23,
                'title' => 'service_edit',
            ],
            [
                'id'    => 24,
                'title' => 'service_show',
            ],
            [
                'id'    => 25,
                'title' => 'service_delete',
            ],
            [
                'id'    => 26,
                'title' => 'service_access',
            ],
            [
                'id'    => 27,
                'title' => 'patient_create',
            ],
            [
                'id'    => 28,
                'title' => 'patient_edit',
            ],
            [
                'id'    => 29,
                'title' => 'patient_show',
            ],
            [
                'id'    => 30,
                'title' => 'patient_delete',
            ],
            [
                'id'    => 31,
                'title' => 'patient_access',
            ],
            [
                'id'    => 32,
                'title' => 'employe_create',
            ],
            [
                'id'    => 33,
                'title' => 'employe_edit',
            ],
            [
                'id'    => 34,
                'title' => 'employe_show',
            ],
            [
                'id'    => 35,
                'title' => 'employe_delete',
            ],
            [
                'id'    => 36,
                'title' => 'employe_access',
            ],
            [
                'id'    => 37,
                'title' => 'session_create',
            ],
            [
                'id'    => 38,
                'title' => 'session_edit',
            ],
            [
                'id'    => 39,
                'title' => 'session_show',
            ],
            [
                'id'    => 40,
                'title' => 'session_delete',
            ],
            [
                'id'    => 41,
                'title' => 'session_access',
            ],
            [
                'id'    => 42,
                'title' => 'session_line_create',
            ],
            [
                'id'    => 43,
                'title' => 'session_line_edit',
            ],
            [
                'id'    => 44,
                'title' => 'session_line_show',
            ],
            [
                'id'    => 45,
                'title' => 'session_line_delete',
            ],
            [
                'id'    => 46,
                'title' => 'session_line_access',
            ],
            [
                'id'    => 47,
                'title' => 'payment_create',
            ],
            [
                'id'    => 48,
                'title' => 'payment_edit',
            ],
            [
                'id'    => 49,
                'title' => 'payment_show',
            ],
            [
                'id'    => 50,
                'title' => 'payment_delete',
            ],
            [
                'id'    => 51,
                'title' => 'payment_access',
            ],
            [
                'id'    => 52,
                'title' => 'invoice_create',
            ],
            [
                'id'    => 53,
                'title' => 'invoice_edit',
            ],
            [
                'id'    => 54,
                'title' => 'invoice_show',
            ],
            [
                'id'    => 55,
                'title' => 'invoice_delete',
            ],
            [
                'id'    => 56,
                'title' => 'invoice_access',
            ],
            [
                'id'    => 57,
                'title' => 'appointment_create',
            ],
            [
                'id'    => 58,
                'title' => 'appointment_edit',
            ],
            [
                'id'    => 59,
                'title' => 'appointment_show',
            ],
            [
                'id'    => 60,
                'title' => 'appointment_delete',
            ],
            [
                'id'    => 61,
                'title' => 'appointment_access',
            ],
            [
                'id'    => 62,
                'title' => 'setting_menu_access',
            ],
            [
                'id'    => 63,
                'title' => 'profile_password_edit',
            ],
            [
                'id'    => 64,
                'title' => 'invoice_print',
            ],
        ];

        Permission::insert($permissions);
    }
}
