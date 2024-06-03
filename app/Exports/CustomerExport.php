<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;


class CustomerExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $type;

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function collection()
    {
        if ($this->type == 'customer') {
            $user = User::where('user_type', 'user')->whereNULL('is_agent')->whereNULL('is_builder')->get();
        }
        if ($this->type == 'agent') {
            $user = User::where('user_type', 'user')->where('is_agent', 1)->get();
        }
        if ($this->type == 'builder') {
            $user = User::where('user_type','user')->where('is_builder',1)->get();
        }
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