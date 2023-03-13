<?php

namespace App\Filament\Resources\ChoiceResource\Pages;

use App\Filament\Resources\ChoiceResource;
use App\Models\Topic;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Database\Eloquent\Model;

class EditChoice extends EditRecord
{
    protected static string $resource = ChoiceResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function handleRecordUpdate(Model $record, array $data): Model
    {
        $topic=Topic::find($data['topic_id']);
        $data['teacher_id'] = $topic->user_id;
        $record->update($data);
        return $record;
    }

}
