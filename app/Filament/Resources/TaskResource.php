<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TaskResource\Pages;
use App\Filament\Resources\TaskResource\RelationManagers;
use App\Models\Task;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TaskResource extends Resource
{
    protected static ?string $model = Task::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make("name")
                    ->required(),
                Forms\Components\TextInput::make("description"),
                Forms\Components\Select::make("user_id")
                    ->relationship("user", "name")
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\DatePicker::make("starting")
                    ->maxDate(now())
                    ->required(),
                Forms\Components\DatePicker::make("ending")
                    ->minDate(now())
                    ->required(),
                Forms\Components\DatePicker::make("completed_at")
                    ->minDate(now()),
                Forms\Components\Checkbox::make("complete"),
                Forms\Components\Select::make("next_task_id")
                    ->options(Task::all()->pluck("name", "id"))
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make("parent_task_id")
                    ->options(Task::all()->pluck("name", "id"))
                    ->searchable()
                    ->preload(),
                Forms\Components\Select::make("board_id")
                    ->relationship("board", "name")
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
                Tables\Columns\TextColumn::make("started_at")
                    ->sortable(),
                Tables\Columns\TextColumn::make("ending")
                    ->sortable(),
                Tables\Columns\TextColumn::make("completed_at")
                    ->sortable(),
                Tables\Columns\TextColumn::make("next_task_id"),
                Tables\Columns\TextColumn::make("parent_task_id"),
                Tables\Columns\TextColumn::make("board.name")
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
            'index' => Pages\ListTasks::route('/'),
            'create' => Pages\CreateTask::route('/create'),
            'edit' => Pages\EditTask::route('/{record}/edit'),
        ];
    }
}
