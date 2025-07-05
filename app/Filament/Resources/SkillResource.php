<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?string $navigationGroup = 'Content Management';

    protected static ?string $navigationLabel = 'Skills';

    protected static ?string $pluralLabel = 'Skills';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Skill Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(2),

                        Forms\Components\Select::make('category')
                            ->required()
                            ->options(Skill::CATEGORIES)
                            ->native(false),

                        Forms\Components\FileUpload::make('logo')
                            ->label('Technology Logo')
                            ->image()
                            ->directory('skills/logos')
                            ->disk('public')
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '1:1',
                                '2:1',
                            ])
                            ->maxSize(2048) // 2MB
                            ->acceptedFileTypes(['image/png', 'image/jpg', 'image/jpeg', 'image/svg+xml'])
                            ->helperText('Upload logo teknologi (PNG, JPG, JPEG, SVG). Maksimal 2MB.')
                            ->columnSpan(2),

                        Forms\Components\Select::make('proficiency_level')
                            ->required()
                            ->options(Skill::PROFICIENCY_LEVELS)
                            ->default(3)
                            ->native(false),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->helperText('Urutan tampilan (semakin kecil semakin atas)'),

                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->helperText('Aktifkan untuk menampilkan di portfolio'),

                        Forms\Components\Textarea::make('description')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Deskripsi singkat tentang skill ini...'),
                    ])
                    ->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('logo')
                    ->label('Logo')
                    ->disk('public')
                    ->size(40)
                    ->circular()
                    ->defaultImageUrl(url('/images/default-skill-logo.png')),

                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable()
                    ->weight('medium'),

                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn(string $state): string => match ($state) {
                        'backend' => 'success',
                        'frontend' => 'info',
                        'database' => 'warning',
                        'tools' => 'gray',
                        'mobile' => 'purple',
                        'devops' => 'orange',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(string $state): string => Skill::CATEGORIES[$state] ?? $state)
                    ->sortable(),

                Tables\Columns\TextColumn::make('proficiency_level')
                    ->label('Level')
                    ->badge()
                    ->color(fn(int $state): string => match ($state) {
                        1 => 'gray',
                        2 => 'warning',
                        3 => 'info',
                        4 => 'success',
                        5 => 'danger',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn(int $state): string => Skill::PROFICIENCY_LEVELS[$state] ?? 'Unknown')
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->sortable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options(Skill::CATEGORIES)
                    ->multiple(),

                Tables\Filters\SelectFilter::make('proficiency_level')
                    ->options(Skill::PROFICIENCY_LEVELS)
                    ->multiple(),

                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->boolean()
                    ->trueLabel('Active Only')
                    ->falseLabel('Inactive Only')
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('activate')
                        ->label('Activate Selected')
                        ->icon('heroicon-o-check')
                        ->color('success')
                        ->action(fn($records) => $records->each->update(['is_active' => true]))
                        ->requiresConfirmation(),
                    Tables\Actions\BulkAction::make('deactivate')
                        ->label('Deactivate Selected')
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->action(fn($records) => $records->each->update(['is_active' => false]))
                        ->requiresConfirmation(),
                ]),
            ])
            ->defaultSort('sort_order', 'asc')
            ->poll('30s');
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'view' => Pages\ViewSkill::route('/{record}'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes();
    }
}
