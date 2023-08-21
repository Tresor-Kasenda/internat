<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Filament\Resources\InterneResource\Pages;
use App\Models\Interne;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class InterneResource extends Resource
{
    protected static ?string $model = Interne::class;

    protected static ?string $navigationIcon = 'heroicon-o-globe-alt';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('user_id')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\Section::make()->schema([
                                Forms\Components\TextInput::make('username')
                                    ->unique()
                                    ->required(),
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\TextInput::make('numtel')
                                    ->unique()
                                    ->tel(),
                                Forms\Components\TextInput::make('adresse'),
                                Forms\Components\TextInput::make('email')
                                    ->email()
                                    ->unique()
                                    ->maxLength(255)
                                    ->required(),
                                Forms\Components\TextInput::make('password')
                                    ->password()
                                    ->dehydrateStateUsing(fn($state) => Hash::make($state))
                                    ->dehydrated(fn($state) => filled($state))
                                    ->required(),
                                Forms\Components\Select::make('role')
                                    ->label('Role')
                                    ->multiple()
                                    ->relationship('roles', 'name')
                                    ->preload()
                                    ->required(),
                                Forms\Components\Toggle::make('status')
                                    ->inline(false)
                                    ->required(),
                            ])->columns(2),
                        ])
                        ->required(),
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
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
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

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInternes::route('/'),
            'create' => Pages\CreateInterne::route('/create'),
            'edit' => Pages\EditInterne::route('/{record}/edit'),
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
