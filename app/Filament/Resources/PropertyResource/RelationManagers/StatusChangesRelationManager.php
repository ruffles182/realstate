<?php

namespace App\Filament\Resources\PropertyResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatusChangesRelationManager extends RelationManager
{
    protected static string $relationship = 'statusChanges';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('status_id')
                //     ->required()
                //     ->maxLength(255),
                Forms\Components\Select::make('property_id')
                    ->required()
                    ->relationship('property', 'code')
                    ->preload()
                    ->searchable(),
                Forms\Components\Select::make('status_id')
                    ->required()
                    ->relationship('status', 'name')
                    ->preload()
                    ->searchable(),
                Forms\Components\TextInput::make('currency')
                        ->required()
                        ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('status')
            ->columns([
                Tables\Columns\TextColumn::make('created_at')->label('Date'),
                Tables\Columns\TextColumn::make('status.name'),
                Tables\Columns\TextColumn::make('property.name'),
                Tables\Columns\TextColumn::make('currency'),
                Tables\Columns\TextColumn::make('price'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
