<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LamaranResource\Pages;
use App\Models\Lamaran;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class LamaranResource extends Resource
{
    protected static ?string $model = Lamaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('lowongan_id')
                    ->relationship('lowongan', 'judul_pekerjaan')->required(),
                Select::make('pengguna_id')
                    ->relationship('pengguna', 'nama')->required(),
                Textarea::make('catatan'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('lowongan.judul_pekerjaan')->label('Lowongan')->sortable()->searchable(),
                TextColumn::make('pengguna.name')->label('Pengguna')->sortable()->searchable(),
                TextColumn::make('catatan'),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLamarans::route('/'),
            'create' => Pages\CreateLamaran::route('/create'),
            'edit' => Pages\EditLamaran::route('/{record}/edit'),
        ];
    }
}