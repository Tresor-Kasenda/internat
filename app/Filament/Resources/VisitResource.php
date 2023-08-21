<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VisitResource\Pages;
use App\Filament\Resources\VisitResource\RelationManagers;
use App\Models\Visit;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class VisitResource extends Resource
{
    protected static ?string $model = Visit::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('user_id')
                        ->label('Personne à visiter')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->label('Email du visiteur')
                        ->email()
                        ->required(),
                    Forms\Components\DatePicker::make('date_visit')
                        ->label('Date de la visite')
                        ->minDate(now())
                        ->required(),
                    Forms\Components\TimePicker::make('heure_arriver')
                        ->label('Heure d\'arrivée')
                        ->format('HH:mm')
                        ->datalist([
                            '09:00',
                            '10:00',
                            '11:00',
                            '12:00',
                            '12:30',
                            '15:00',
                            '15:30',
                            '16:00',
                        ])
                        ->required(),
                    Forms\Components\TimePicker::make('heure_sortie')
                        ->label('Heure de sortie')
                        ->format('HH:mm')
                        ->datalist([
                            '09:00',
                            '10:00',
                            '11:00',
                            '12:00',
                            '12:30',
                            '15:00',
                            '15:30',
                            '16:00',
                        ])
                        ->required(),
                    Forms\Components\Toggle::make('status')
                        ->label('Statut')
                        ->inline(false)
                        ->required(),
                    Forms\Components\Textarea::make('description')
                        ->label('Motif de la visite')
                        ->columnSpanFull('full'),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_visit')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('heure_arriver')
                    ->searchable(),
                Tables\Columns\TextColumn::make('heure_sortie')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
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
            'index' => Pages\ListVisits::route('/'),
            'create' => Pages\CreateVisit::route('/create'),
            'edit' => Pages\EditVisit::route('/{record}/edit'),
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
