<?php

namespace App\Filament\Resources\TeacherTopicResource\Pages;

use App\Filament\Resources\TeacherTopicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateTeacherTopic extends CreateRecord
{
    protected static string $resource = TeacherTopicResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $data['user_id'] = auth()->id();

        return static::getModel()::create($data);
    }
}
