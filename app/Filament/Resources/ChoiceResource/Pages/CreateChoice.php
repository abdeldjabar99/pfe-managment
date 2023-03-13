<?php

namespace App\Filament\Resources\ChoiceResource\Pages;

use App\Filament\Resources\ChoiceResource;
use App\Models\Topic;
use Filament\Pages\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateChoice extends CreateRecord
{
    protected static string $resource = ChoiceResource::class;

    protected function handleRecordCreation(array $data): Model
    {
        $topic=Topic::find($data['topic_id']);
        $data['teacher_id'] = $topic->user_id;

        return static::getModel()::create($data);
    }
}
