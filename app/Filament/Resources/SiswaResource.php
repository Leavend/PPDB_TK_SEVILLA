<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    protected static ?string $navigationGroup = 'Data Sekolah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nik')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('nama_lengkap')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_panggilan')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tinggal_bersama')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tahun_ajar')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenjang')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jumlah_saudara')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tempat_lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('tanggal_lahir')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('anak_ke')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jenis_kelamin')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('agama')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nik'),
                Tables\Columns\TextColumn::make('nama_lengkap'),
                Tables\Columns\TextColumn::make('nama_panggilan'),
                Tables\Columns\TextColumn::make('tinggal_bersama'),
                Tables\Columns\TextColumn::make('tahun_ajar'),
                Tables\Columns\TextColumn::make('jenjang'),
                Tables\Columns\TextColumn::make('jumlah_saudara'),
                Tables\Columns\TextColumn::make('tempat_lahir'),
                Tables\Columns\TextColumn::make('tanggal_lahir'),
                Tables\Columns\TextColumn::make('anak_ke'),
                Tables\Columns\TextColumn::make('jenis_kelamin'),
                Tables\Columns\TextColumn::make('agama'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'view' => Pages\ViewSiswa::route('/{record}'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
