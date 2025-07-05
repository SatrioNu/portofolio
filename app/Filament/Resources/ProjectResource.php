<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Filament\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Content Management';
    protected static ?string $navigationLabel = 'Projects';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->rows(5)
                    ->maxLength(1000),
                FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('project-images')
                    ->visibility('public')
                    ->imagePreviewHeight('150')
                    ->maxSize(2048) // 2MB max
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->downloadable()
                    ->previewable(false) // Disable preview untuk menghindari loading error
                    ->openable(false), // Disable open untuk menghindari error
                TextInput::make('link')
                    ->label('Project URL')
                    ->placeholder('https://example.com')
                    ->helperText('Enter the full URL including https://')
                    ->url()
                    ->suffixIcon('heroicon-m-link'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')->searchable()->sortable(),
                TextColumn::make('description')->limit(30),
                ImageColumn::make('image')
                    ->label('Thumbnail')
                    ->disk('public')
                    ->height(50)
                    ->width(50)
                    ->defaultImageUrl(url('/images/placeholder.png'))
                    ->circular(),
                TextColumn::make('link')
                    ->label('Link')
                    ->url(fn($record) => $record->link)
                    ->openUrlInNewTab()
                    ->limit(50)
                    ->color('primary'),
                TextColumn::make('created_at')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
