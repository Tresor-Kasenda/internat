<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PromotionResource\Pages;
use App\Filament\Resources\PromotionResource\RelationManagers;
use App\Models\Promotion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PromotionResource extends Resource
{
    protected static ?string $model = Promotion::class;

    protected static ?string $navigationGroup = 'Internat';

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('faculty_id')
                        ->label('Faculté')
                        ->relationship('faculty', 'name')
                        ->searchable()
                        ->preload()
                        ->createOptionForm([
                            Forms\Components\Section::make()->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required(),
                                Forms\Components\RichEditor::make('description')
                                    ->minLength(2)
                                    ->columnSpanFull(),
                            ]),
                        ])
                        ->required(),
                    Forms\Components\Select::make('user_id')
                        ->label('Eleve')
                        ->relationship('user', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    Forms\Components\TextInput::make('name')
                        ->label('Nom de la promotion')
                        ->required(),
                    Forms\Components\DatePicker::make('annee_academic')
                        ->label('Année académique')
                        ->date()
                        ->required(),
                    Forms\Components\RichEditor::make('description')
                        ->label('Description')
                        ->columnSpanFull()
                        ->required(),
                ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('faculty.name')
                    ->label('Faculté')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Eleve')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nom de la promotion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('annee_academic')
                    ->label('Année académique')
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
            'index' => Pages\ListPromotions::route('/'),
            'create' => Pages\CreatePromotion::route('/create'),
            'edit' => Pages\EditPromotion::route('/{record}/edit'),
        ];
    }
}
