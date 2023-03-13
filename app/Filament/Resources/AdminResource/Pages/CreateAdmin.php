<?php

namespace App\Filament\Resources\AdminResource\Pages;

use App\Filament\Resources\AdminResource;
use App\Models\Role;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class CreateAdmin extends CreateRecord
{
    
    protected static string $resource = AdminResource::class;
    
    protected function handleRecordCreation(array $data): Model
    {
        $data['password']=Hash::make($data['password']);
        $data['role_id'] = Role::ADMIN;

        return static::getModel()::create($data);
    }
}
