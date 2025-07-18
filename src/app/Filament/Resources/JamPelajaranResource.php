<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JamPelajaranResource\Pages;
use App\Filament\Resources\JamPelajaranResource\RelationManagers;
use App\Models\JamPelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class JamPelajaranResource extends Resource
{
    protected static ?string $model = JamPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function canAccessPanel(): bool
    {
        return Auth::check() && Auth::user()->hasAnyRole('Guru', 'Murid');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->hasAnyRole('Guru', 'Murid');
    }

    public static function canViewAny(): bool
    {
        return Auth::check() && Auth::user()->hasAnyRole('Guru', 'Murid');
    }

    public static function canCreate(): bool
    {
        return Auth::check() && Auth::user()->hasRole('Guru');
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::check() && Auth::user()->hasRole('Guru');
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::check() && Auth::user()->hasRole('Guru');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('hari')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('jam_mulai')
                    ->required(),
                Forms\Components\TextInput::make('jam_selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hari')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jam_mulai'),
                Tables\Columns\TextColumn::make('jam_selesai'),
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
            'index' => Pages\ListJamPelajarans::route('/'),
            'create' => Pages\CreateJamPelajaran::route('/create'),
            'edit' => Pages\EditJamPelajaran::route('/{record}/edit'),
        ];
    }
}
