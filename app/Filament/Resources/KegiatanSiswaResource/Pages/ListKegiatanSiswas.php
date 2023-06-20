<?php

namespace App\Filament\Resources\KegiatanSiswaResource\Pages;

use App\Filament\Resources\KegiatanSiswaResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListKegiatanSiswas extends ListRecords
{
    protected static string $resource = KegiatanSiswaResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
