<?php

namespace App\Filament\Resources\TeacherChoiceResource\Pages;

use App\Filament\Resources\TeacherChoiceResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTeacherChoices extends ManageRecords
{
    protected static string $resource = TeacherChoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
