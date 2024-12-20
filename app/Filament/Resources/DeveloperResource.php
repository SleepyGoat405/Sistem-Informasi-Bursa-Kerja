<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeveloperResource\Pages;
use App\Models\Developer;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class DeveloperResource extends Resource
{
    protected static ?string $model = Developer::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';
    protected static ?string $navigationLabel = 'Developers';
    protected static ?string $pluralLabel = 'Developers';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nim')
                    ->label('NIM')
                    ->required()
                    ->maxLength(10),
                TextInput::make('nama')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),
                TextInput::make('jurusan')
                    ->label('Jurusan')
                    ->required()
                    ->maxLength(255),
                TextInput::make('prodi')
                    ->label('Program Studi')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('gambar')
                    ->label('Foto')
                    ->image()
                    ->directory('developers')
                    ->maxSize(10240),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->label('NIM')->searchable()->sortable(),
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('jurusan')->label('Jurusan'),
                TextColumn::make('prodi')->label('Program Studi'),
                ImageColumn::make('gambar')->label('Foto')->circular(),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListDevelopers::route('/'),
            'create' => Pages\CreateDeveloper::route('/create'),
            'edit' => Pages\EditDeveloper::route('/{record}/edit'),
        ];
    }
}
