<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicStudentResource\Pages;
use App\Filament\Resources\TopicResource\RelationManagers;
use App\Models\Choice;
use App\Models\Topic;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TopicStudentResource extends Resource
{
    protected static ?string $model = Topic::class;

    protected static ?string $navigationIcon = 'phosphor-files';
    protected static ?string $navigationGroup = 'Topics';
    protected static ?string $slug = 'topics-student';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    TextInput::make('title')
                    ->required(),
                    RichEditor::make('description')
                    ->required(),
                    TextInput::make('technology'),
                    Select::make('user_id')
                    ->relationship('teacher', 'name')
                    ->required(),
                   
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('teacher.name')->searchable(),
            ])
            ->filters([
                SelectFilter::make('teacher')->relationship('teacher', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('Registration')
                ->color('success')
                ->icon('heroicon-o-check')
                ->action(fn (Topic $record ) => Choice::create(['student_id'=>auth()->id(),'teacher_id'=>$record['user_id'],'topic_id'=>$record['id'],'comment'=>'hahahaha']))
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getRelations(): array
    {
        return [
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTopicsStudent::route('/'),
            'create' => Pages\CreateTopicStudent::route('/create'),
            'edit' => Pages\EditTopicStudent::route('/{record}/edit'),
        ];
    }    
}
