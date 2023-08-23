<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class InternesRelationManager extends RelationManager
{
    protected static string $relationship = 'internes';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('date_naissance')
                        ->required()
                        ->maxLength(255),
                    Forms\Components\DatePicker::make('date_naissance')
                        ->date()
                        ->maxDate(now())
                        ->required(),
                    Forms\Components\TextInput::make('lieu_naissance')
                        ->required(),
                    Forms\Components\TextInput::make('adresse')
                        ->required(),
                    Forms\Components\TextInput::make('telephone')
                        ->tel()
                        ->required(),
                    Forms\Components\TextInput::make('urgence_telephone')
                        ->tel()
                        ->required(),
                ])->columns(2)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('date_naissance')
            ->columns([
                Tables\Columns\TextColumn::make('date_naissance')
                    ->date()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('lieu_naissance')
                    ->searchable(),
                Tables\Columns\TextColumn::make('adresse')
                    ->searchable(),
                Tables\Columns\TextColumn::make('telephone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('urgence_telephone')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
