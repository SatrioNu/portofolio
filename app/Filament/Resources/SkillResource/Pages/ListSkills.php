<?php

namespace App\Filament\Resources\SkillResource\Pages;

use App\Filament\Resources\SkillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Skill;

class ListSkills extends ListRecords
{
    protected static string $resource = SkillResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All Skills')
                ->badge(Skill::count()),

            'backend' => Tab::make('Backend')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('category', 'backend'))
                ->badge(Skill::where('category', 'backend')->count()),

            'frontend' => Tab::make('Frontend')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('category', 'frontend'))
                ->badge(Skill::where('category', 'frontend')->count()),

            'database' => Tab::make('Database')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('category', 'database'))
                ->badge(Skill::where('category', 'database')->count()),

            'tools' => Tab::make('Tools')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('category', 'tools'))
                ->badge(Skill::where('category', 'tools')->count()),

            'active' => Tab::make('Active')
                ->modifyQueryUsing(fn(Builder $query) => $query->where('is_active', true))
                ->badge(Skill::where('is_active', true)->count()),
        ];
    }
}
