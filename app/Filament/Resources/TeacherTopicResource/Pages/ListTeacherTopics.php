<?php

namespace App\Filament\Resources\TeacherTopicResource\Pages;

use App\Filament\Resources\TeacherTopicResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListTeacherTopics extends ListRecords
{
    protected static string $resource = TeacherTopicResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
