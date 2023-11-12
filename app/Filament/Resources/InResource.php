<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InResource\Pages;
use App\Filament\Resources\InResource\RelationManagers;
use App\Models\In;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class InResource extends Resource
{
    protected static ?string $pluralModelLabel = 'In';

    protected static ?int $navigationSort = 1;

    protected static ?string $model = In::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Repeater::make('Items')
                            ->relationship()
                            ->schema([
                                Select::make('item_id')
                                    ->label('Item Name')
                                    ->options(Item::query()->pluck('name', 'id'))
                                    ->required()
                                    ->reactive()
                                    ->searchable(),
                                TextInput::make('quantity')->numeric()->required(),
                            ])
                            ->columns()
                    ]),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID'),
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
            'index' => Pages\ListIns::route('/'),
            'create' => Pages\CreateIn::route('/create'),
            'edit' => Pages\EditIn::route('/{record}/edit'),
        ];
    }
}
