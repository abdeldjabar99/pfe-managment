<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherTopicResource\Pages;
use App\Filament\Resources\TeacherTopicResource\RelationManagers;
use App\Models\TeacherTopic;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeacherTopicResource extends Resource
{
    protected static ?string $model = TeacherTopic::class;

    protected static ?string $navigationIcon = 'phosphor-files';
    protected static ?string $navigationGroup = 'Topics Mangment';

    protected static ?string $pluralModelLabel = 'My Topics';

    public static $searchable = ['name'];

    public static $sort = ['name' => 'asc'];

    public static $perPageOptions = [10, 25, 50];

    public static $defaultPerPage = 10;
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
                    Select::make('special_id')
                    ->relationship('special', 'name')
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
            'index' => Pages\ListTeacherTopics::route('/'),
            'create' => Pages\CreateTeacherTopic::route('/create'),
            'edit' => Pages\EditTeacherTopic::route('/{record}/edit'),
        ];
    }    
}
