<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChoiceResource\Pages;
use App\Filament\Resources\ChoiceResource\RelationManagers;
use App\Models\Choice;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChoiceResource extends Resource
{
    protected static ?string $model = Choice::class;

    protected static ?string $navigationIcon = 'phosphor-files';
    protected static ?string $navigationGroup = 'Topics Mangment';

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
                ToggleColumn::make('is_accpted'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListChoices::route('/'),
            'create' => Pages\CreateChoice::route('/create'),
            'edit' => Pages\EditChoice::route('/{record}/edit'),
        ];
    }    
}
