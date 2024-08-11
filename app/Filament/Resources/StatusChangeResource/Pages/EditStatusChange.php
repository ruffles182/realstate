<?php

namespace App\Filament\Resources\StatusChangeResource\Pages;

use App\Filament\Resources\StatusChangeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatusChange extends EditRecord
{
    protected static string $resource = StatusChangeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
