<?php

namespace App\Filament\Resources\TransactionResource\Pages;

use App\Filament\Resources\TransactionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Widgets\TransactionOverview;

class ListTransactions extends ListRecords
{
    protected static string $resource = TransactionResource::class;

 public function getHeaderWidgets(): array
{
    return [
        TransactionOverview::class,
    ];
}

    // protected function getHeaderActions(): array
    // {
    //     return [
    //         Actions\CreateAction::make(),
    //     ];
    // }
}
