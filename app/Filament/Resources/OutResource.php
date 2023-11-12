<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OutResource\Pages;
use App\Filament\Resources\OutResource\RelationManagers;
use App\Models\Item;
use App\Models\Out;
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

class OutResource extends Resource
{
    protected static ?string $pluralModelLabel = 'Out';

    protected static ?int $navigationSort = 2;

    protected static ?string $model = Out::class;

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
            'index' => Pages\ListOuts::route('/'),
            'create' => Pages\CreateOut::route('/create'),
            'edit' => Pages\EditOut::route('/{record}/edit'),
        ];
    }
}
