<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TopicResource\Pages;
use App\Filament\Resources\TopicResource\RelationManagers;
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

class TopicResource extends Resource
{
    protected static ?string $model = Topic::class;

    protected static ?string $navigationIcon = 'phosphor-files';
    protected static ?string $navigationGroup = 'Topics Mangment';
    public static function label()
    {
        return __('Topics');
    }

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
                    Select::make('user_id')
                    ->relationship('teacher', 'name')
                    ->required(),
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
                TextColumn::make('special.name')->searchable(),

                ])
            ->filters([
                SelectFilter::make('teacher')->relationship('teacher', 'name'),
                SelectFilter::make('special')->relationship('special', 'name')

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
            'index' => Pages\ListTopics::route('/'),
            'create' => Pages\CreateTopic::route('/create'),
            'edit' => Pages\EditTopic::route('/{record}/edit'),
        ];
    }    
}
