<?php

namespace App\Filament\Resources;

use App\Enums\TypeChamber;
use App\Filament\Resources\LocationResource\Pages;
use App\Filament\Resources\LocationResource\RelationManagers;
use App\Models\Location;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class LocationResource extends Resource
{
    protected static ?string $model = Location::class;

    protected static ?string $navigationGroup = 'Internat';

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\Select::make('chambre_id')
                        ->relationship('chambre', 'nom_chamber')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
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
                            ])->columns(2),
                        ])
                        ->required(),
                    Forms\Components\DatePicker::make('date_debut')
                        ->required(),
                    Forms\Components\DatePicker::make('date_fin')
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Prenom')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.username')
                    ->label('Nom d\'utilisateur')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('chambre.nom_chamber')
                    ->label('Chambre')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_debut')
                    ->label('Date de début')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_fin')
                    ->label('Date de fin')
                    ->date()
                    ->sortable(),
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
            'index' => Pages\ListLocations::route('/'),
            'create' => Pages\CreateLocation::route('/create'),
            'edit' => Pages\EditLocation::route('/{record}/edit'),
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
