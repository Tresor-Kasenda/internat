<?php

namespace App\Filament\Resources;

use App\Enums\MovementVisit;
use App\Enums\VisitType;
use App\Filament\Resources\MovementResource\Pages;
use App\Filament\Resources\MovementResource\RelationManagers;
use App\Models\Movement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MovementResource extends Resource
{
    protected static ?string $model = Movement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('visit_id')
                        ->label('Visite')
                        ->relationship('visit', 'visite_title')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\Section::make()->schema([
                                Forms\Components\Select::make('user_id')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('visite_title')
                                    ->required(),
                                Forms\Components\Toggle::make('status')
                                    ->required(),
                                Forms\Components\Textarea::make('description')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        ])
                        ->required(),
                    Forms\Components\DatePicker::make('movement_date')
                        ->date()
                        ->required(),
                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->preload()
                        ->options([
                            MovementVisit::VALIDE->value => 'valider',
                            MovementVisit::REFUSE->value => 'refuser',
                        ])
                        ->required(),
                    Forms\Components\Select::make('type')
                        ->string('Type')
                        ->preload()
                        ->options([
                            VisitType::EXTERNE->value => 'externe',
                            VisitType::INTERNE->value => 'interne',
                        ])
                        ->required(),
                    Forms\Components\TimePicker::make('heure_arriver')
                        ->time()
                        ->required(),
                    Forms\Components\TimePicker::make('heure_sortie')
                        ->time()
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('visit.visite_title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('movement_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('heure_arriver'),
                Tables\Columns\TextColumn::make('heure_sortie'),
                Tables\Columns\TextColumn::make('type')
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
            'index' => Pages\ListMovements::route('/'),
            'create' => Pages\CreateMovement::route('/create'),
            'edit' => Pages\EditMovement::route('/{record}/edit'),
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
