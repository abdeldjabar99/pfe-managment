<?php

namespace App\Filament\Resources\TopicStudentResource\Pages;

use App\Filament\Resources\TopicStudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTopicStudent extends EditRecord
{
    protected static string $resource = TopicStudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
