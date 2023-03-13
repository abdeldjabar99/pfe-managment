<?php

namespace App\Filament\Resources\TopicStudentResource\Pages;

use App\Filament\Resources\TopicStudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateTopicStudent extends CreateRecord
{
    protected static string $resource = TopicStudentResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
