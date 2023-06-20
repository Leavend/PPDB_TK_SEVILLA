<?php

namespace App\Filament\Resources\KegiatanSiswaResource\Pages;

use App\Filament\Resources\KegiatanSiswaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKegiatanSiswa extends EditRecord
{
    protected static string $resource = KegiatanSiswaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
