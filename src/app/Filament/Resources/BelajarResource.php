<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BelajarResource\Pages;
use App\Filament\Resources\BelajarResource\RelationManagers;
use App\Models\Belajar;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class BelajarResource extends Resource
{
    protected static ?string $model = Belajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public function canAccessPanel(): bool
    {
        return Auth::check() && Auth::user()->hasAnyRole('Guru', 'Murid') ;
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
        return Auth::check() && Auth::user()->hasAnyRole('Guru', 'Murid');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('murid_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('mata_pelajaran_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('jam_pelajaran_id')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('murid_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('mata_pelajaran_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('jam_pelajaran_id')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListBelajars::route('/'),
            'create' => Pages\CreateBelajar::route('/create'),
            'edit' => Pages\EditBelajar::route('/{record}/edit'),
        ];
    }
}
