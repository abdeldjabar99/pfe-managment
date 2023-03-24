<?php

namespace App\Filament\Resources\TeacherTopicResource\Pages;

use App\Filament\Resources\TeacherTopicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeacherTopic extends EditRecord
{
    protected static string $resource = TeacherTopicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
