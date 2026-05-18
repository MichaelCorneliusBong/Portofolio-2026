<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\ProjectResource\Pages;
use App\Filament\Admin\Resources\ProjectResource\RelationManagers;
use App\Models\Project;
use Filament\Forms;
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

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('short_description')
                    ->required()
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('problem_analysis')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('system_requirements')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('tech_stack')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('diagram_usecase')
                    ->image()
                    ->directory('diagrams'),
                Forms\Components\FileUpload::make('diagram_flowchart')
                    ->image()
                    ->directory('diagrams'),
                Forms\Components\FileUpload::make('diagram_erd')
                    ->image()
                    ->directory('diagrams'),
                Forms\Components\FileUpload::make('thumbnail')
                    ->image()
                    ->directory('projects'),
                Forms\Components\TextInput::make('github_url')
                    ->url()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_final_project')
                    ->required(),
                Forms\Components\TextInput::make('progress_status')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_published')
                    ->required()
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('thumbnail'),
                Tables\Columns\TextColumn::make('github_url')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_final_project')
                    ->boolean(),
                Tables\Columns\TextColumn::make('progress_status')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_published')
                    ->boolean(),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
