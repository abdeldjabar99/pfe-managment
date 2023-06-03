<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherChoiceResource\Pages;
use App\Filament\Resources\TeacherChoiceResource\RelationManagers;
use App\Models\TeacherChoice;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\IconColumn;


class TeacherChoiceResource extends Resource
{
    protected static ?string $model = TeacherChoice::class;

    protected static ?string $navigationIcon = 'phosphor-files';
    protected static ?string $navigationGroup = 'Topics Mangment';

    protected static ?string $pluralModelLabel = 'Choices My Topics';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                ->schema([
                    Select::make('topic_id')
                    ->relationship('topic', 'title')
                    ->required(),
                    RichEditor::make('comment')
                    ->required(),
                    Select::make('student_id')
                    ->relationship('student', 'name')
                    ->required(),
                    Toggle::make('is_accpted'),

                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('topic.title')
                ->searchable(),
                TextColumn::make('teacher.name')->searchable(),
                TextColumn::make('student.name')->searchable()
                ->searchable(),
                IconColumn::make('is_binome')
                ->boolean(),
                TextColumn::make('created_at')->label('date choice'),
                ToggleColumn::make('is_accpted'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageTeacherChoices::route('/'),
        ];
    }    
}
