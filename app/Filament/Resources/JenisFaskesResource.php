<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JenisFaskesResource\Pages;
use App\Filament\Resources\JenisFaskesResource\RelationManagers;
use App\Models\JenisFaskes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;


class JenisFaskesResource extends Resource
{
    protected static ?string $model = JenisFaskes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->required()
                ->maxLength(255)
                ->label('Nama Jenis Faskes'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('nama')->searchable()->sortable(),
            TextColumn::make('created_at')->dateTime()->label('Dibuat'),

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
            'index' => Pages\ListJenisFaskes::route('/'),
            'create' => Pages\CreateJenisFaskes::route('/create'),
            'edit' => Pages\EditJenisFaskes::route('/{record}/edit'),
        ];
    }
}
