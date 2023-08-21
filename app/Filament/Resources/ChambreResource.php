<?php

namespace App\Filament\Resources;

use App\Enums\TypeChamber;
use App\Filament\Resources\ChambreResource\Pages;
use App\Filament\Resources\ChambreResource\RelationManagers;
use App\Models\Chambre;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ChambreResource extends Resource
{
    protected static ?string $model = Chambre::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\TextInput::make('nom_chamber')
                        ->label('Nom de la chambre')
                        ->required(),
                    Forms\Components\TextInput::make('numero_chamber')
                        ->label('Numéro de la chambre')
                        ->required()
                        ->numeric(),
                    Forms\Components\Select::make('type_chamber')
                        ->label('Type de chambre')
                        ->searchable()
                        ->options([
                            TypeChamber::SIMPLE->value => 'Single',
                            TypeChamber::DOUBLE->value => 'Double',
                        ])
                        ->required(),
                    Forms\Components\Textarea::make('description')
                        ->label('Description')
                        ->columnSpanFull('full'),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nom_chamber')
                    ->searchable(),
                Tables\Columns\TextColumn::make('numero_chamber')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_chamber')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListChambres::route('/'),
            'create' => Pages\CreateChambre::route('/create'),
            'edit' => Pages\EditChambre::route('/{record}/edit'),
        ];
    }

    public static function getPermissionPrefixes(): array
    {
        return [
            'view',
            'view_any',
            'create',
            'update',
            'delete',
            'delete_any',
        ];
    }
}
