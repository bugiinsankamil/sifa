<?php

namespace App\Filament\Resources\RefBranchResource\Pages;

use App\Filament\Resources\RefBranchResource;
use App\Traits\RedirectIndex;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRefBranch extends CreateRecord
{
    use RedirectIndex;

    protected static string $resource = RefBranchResource::class;
}
