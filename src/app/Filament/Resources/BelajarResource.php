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
use Illuminate\Database\Eloquent\Model;
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
                Forms\Components\Select::make('mata_pelajaran_id')
                    ->relationship('mataPelajaran', 'nama')
                    ->disabled()
                    ->label('Mata Pelajaran'),

                Forms\Components\Select::make('jam_pelajaran_id')
                    ->relationship('jamPelajaran', 'hari')
                    ->disabled()
                    ->label('Jam Pelajaran'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mataPelajaran.nama_mapel')
                    ->label('Mata Pelajaran')
                    ->searchable(),

                Tables\Columns\TextColumn::make('jamPelajaran.hari')
                    ->label('Hari'),

                Tables\Columns\TextColumn::make('jamPelajaran.jam_mulai')
                    ->label('Jam Mulai'),

                Tables\Columns\TextColumn::make('jamPelajaran.jam_selesai')
                    ->label('Jam Selesai'),
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
