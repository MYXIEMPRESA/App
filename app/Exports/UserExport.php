<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class UserExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        $user = User::whereNotIn('user_type',['admin','user'])->get();
        return $user;
    }
    
    public function map($user): array
    {
        $auth_user = auth()->user();
        $email = $auth_user->hasRole('admin') ? $user->email : maskSensitiveInfo('email', $user->email);
        $contact_number = $auth_user->hasRole('admin') ? $user->contact_number : maskSensitiveInfo('contact_number', $user->contact_number);
        return [
            $user->first_name,
            $user->last_name,
            $email,
            $contact_number,
            $user->status,
        ];
    }

    public function headings(): array
    {
        return [
            __('message.first_name'),
            __('message.last_name'),
            __('message.email'),
            __('message.contact_number'),
            __('message.status'),
        ];
    }
  
}