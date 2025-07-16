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

class BelajarResource extends Resource
{
    protected static ?string $model = Belajar::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Belajar';
    protected static ?string $pluralModelLabel = 'Data Belajar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('murid_id')
                    ->relationship('murid', 'nama')
                    ->searchable()
                    ->required()
                    ->label('Murid'),

                Forms\Components\Select::make('mata_pelajaran_id')
                    ->relationship('mataPelajaran', 'nama')
                    ->searchable()
                    ->required()
                    ->label('Mata Pelajaran'),

                Forms\Components\Select::make('jam_pelajaran_id')
                    ->relationship('jamPelajaran', 'hari')
                    ->searchable()
                    ->required()
                    ->label('Jam Pelajaran'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('murid.nama')->label('Murid'),
                Tables\Columns\TextColumn::make('mataPelajaran.nama')->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('jamPelajaran.hari')->label('Hari'),
                Tables\Columns\TextColumn::make('jamPelajaran.jam_mulai')->label('Jam Mulai'),
                Tables\Columns\TextColumn::make('jamPelajaran.jam_selesai')->label('Jam Selesai'),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
