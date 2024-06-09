<?php

namespace TomatoPHP\FilamentAccounts\Filament\Resources\TeamResource\Pages;

use TomatoPHP\FilamentAccounts\Filament\Resources\TeamResource;
use TomatoPHP\FilamentAccounts\Models\Team;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTeam extends EditRecord
{
    protected static string $resource = TeamResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        if(isset($data['is_achieve']) && $data['is_achieve']){
            $teams = Team::all();
            foreach ($teams as $team){
                $team->is_achieve = false;
                $team->save();
            }
        }

        return $data; // TODO: Change the autogenerated stub
    }
}
