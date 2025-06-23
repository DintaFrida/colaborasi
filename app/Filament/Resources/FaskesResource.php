<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaskesResource\Pages;
use App\Filament\Resources\FaskesResource\RelationManagers;
use App\Models\Faskes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;



class FaskesResource extends Resource
{
    protected static ?string $model = Faskes::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->required()
                ->maxLength(255),
            TextInput::make('nama_pengelola')
                ->maxLength(255),
            Textarea::make('alamat')
                ->rows(2),
            TextInput::make('website')
                ->url()
                ->maxLength(255),
            TextInput::make('email')
                ->email()
                ->maxLength(255),
            Select::make('kabkota_id')
                ->relationship('kabkota', 'nama')
                ->searchable()
                ->required(),
            Select::make('jenis_faskes_id')
                ->relationship('jenisFaskes', 'nama')
                ->searchable()
                ->required(),
            Select::make('kategori_id')
                ->relationship('kategori', 'nama')
                ->searchable()
                ->required(),
            TextInput::make('rating')
                ->numeric()
                ->step(1),
            TextInput::make('latitude')
                ->numeric(),
            TextInput::make('longitude')
                ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
             TextColumn::make('nama')->searchable(),
            TextColumn::make('nama_pengelola'),
            TextColumn::make('alamat')->limit(30)->wrap()->label('Alamat'),
            TextColumn::make('kabkota.nama')->label('Kab/Kota'),
            TextColumn::make('jenisFaskes.nama')->label('Jenis Faskes'),
            TextColumn::make('kategori.nama')->label('Kategori'),
            TextColumn::make('rating'),
            TextColumn::make('latitude'),
            TextColumn::make('longitude'),
            TextColumn::make('created_at')->dateTime()->sortable(),



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
            'index' => Pages\ListFaskes::route('/'),
            'create' => Pages\CreateFaskes::route('/create'),
            'edit' => Pages\EditFaskes::route('/{record}/edit'),
        ];
    }
}
