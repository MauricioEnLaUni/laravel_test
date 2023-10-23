<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BoardResource\Pages;
use App\Filament\Resources\BoardResource\RelationManagers;
use App\Models\Board;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BoardResource extends Resource
{
    protected static ?string $model = Board::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make("description")
                    ->maxLength(255),
                Forms\Components\Select::make("user_id")
                    ->relationship("user", "name")
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\Select::make("project_id")
                    ->relationship("project", "name")
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make("name")
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make("user_id")
                            ->relationship("user", "name")
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\DatePicker::make("started_at")
                            ->maxDate(now())
                            ->required(),
                        Forms\Components\DatePicker::make("ends")
                            ->minDate(now())
                            ->required(),
                        Forms\Components\Checkbox::make("complete"),
                        Forms\Components\Select::make("project_type_id")
                            ->relationship("project_type", "name")
                            ->searchable()
                            ->preload()
                            ->required(),
                    ])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make("description"),
                Tables\Columns\TextColumn::make("user.name")
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make("project.name")
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListBoards::route('/'),
            'create' => Pages\CreateBoard::route('/create'),
            'edit' => Pages\EditBoard::route('/{record}/edit'),
        ];
    }
}
