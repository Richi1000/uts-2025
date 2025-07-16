<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataPelajaranResource\Pages;
use App\Filament\Resources\MataPelajaranResource\RelationManagers;
use App\Models\MataPelajaran;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MataPelajaranResource extends Resource
{
    protected static ?string $model = MataPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Mata Pelajaran';
    protected static ?string $pluralModelLabel = 'Mata Pelajaran';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                ->required()
                ->label('Nama Mata Pelajaran'),

            Forms\Components\Select::make('guru_id')
                ->relationship('guru', 'nama')
                ->searchable()
                ->required()
                ->label('Pengajar (Guru)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')->searchable()->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('guru.nama')->label('Guru Pengampu')->searchable(),
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
            'index' => Pages\ListMataPelajarans::route('/'),
            'create' => Pages\CreateMataPelajaran::route('/create'),
            'edit' => Pages\EditMataPelajaran::route('/{record}/edit'),
        ];
    }
}
