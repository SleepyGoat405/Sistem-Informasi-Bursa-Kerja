<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LowonganResource\Pages;
use App\Models\Lowongan;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;


class LowonganResource extends Resource
{
    protected static ?string $model = Lowongan::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('perusahaan_id')
                    ->label('Perusahaan')
                    ->relationship('perusahaan', 'nama')
                    ->required(),

                TextInput::make('posisi')
                    ->label('Posisi')
                    ->required()
                    ->maxLength(255),

                TextInput::make('judul_pekerjaan')
                    ->label('Judul Pekerjaan')
                    ->required()
                    ->maxLength(255),

                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required(),

                TextInput::make('gaji')
                    ->label('Gaji')
                    ->numeric()
                    ->maxLength(15),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('perusahaan.nama')
                    ->label('Perusahaan')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('posisi')
                    ->label('Posisi')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('deskripsi')
                    ->label('Deskripsi'),

                TextColumn::make('gaji')
                    ->label('Gaji')
                    ->sortable(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLowongans::route('/'),
            'create' => Pages\CreateLowongan::route('/create'),
            'edit' => Pages\EditLowongan::route('/{record}/edit'),
        ];
    }
}
