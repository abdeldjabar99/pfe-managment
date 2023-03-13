<?php

namespace App\Filament\Resources\TopicStudentResource\Pages;

use App\Filament\Resources\TopicStudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Routing\Router;

class ListTopicsStudent extends ListRecords
{
    protected static string $resource = TopicStudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }


}
