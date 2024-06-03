<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;


class ImportCustomer implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // \Log::info($row);    
        $user = new User([
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'email' => $row['email'],
            'password' => bcrypt($row['password']),
            'username' => $row['username'] ?? $row['email'],
            'contact_number' => $row['contact_number'],
            'status' => $row['status'],
            'user_type' => $row['user_type'] ?? 'user',
            'display_name' => $row['first_name'].' '.$row['last_name'],
        ]);

        $user->save();

        $user->assignRole($row['user_type'] ?? 'user');

        return $user;
    }

    public function headingRow(): int
    {
        return 1;
    }
}
