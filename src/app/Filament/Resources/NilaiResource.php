<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NilaiResource\Pages;
use App\Filament\Resources\NilaiResource\RelationManagers;
use App\Models\Nilai;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NilaiResource extends Resource
{
    protected static ?string $model = Nilai::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Nilai';
    protected static ?string $pluralModelLabel = 'Data Nilai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('murid_id')
                    ->relationship('murid', 'nama')
                    ->required()
                    ->label('Murid')
                    ->searchable(),

                Forms\Components\Select::make('mata_pelajaran_id')
                    ->relationship('mataPelajaran', 'nama')
                    ->required()
                    ->label('Mata Pelajaran')
                    ->searchable(),

                Forms\Components\TextInput::make('nilai')
                    ->numeric()
                    ->required()
                    ->label('Nilai'),

                Forms\Components\Select::make('kategori')
                    ->options([
                        'Tugas' => 'PR',
                        'Harian' => 'PS',
                        'Ujian Tengah' => 'UTS',
                        'Ujian Akhir' => 'UAS',
                    ])
                    ->required()
                    ->label('Kategori Penilaian'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('murid.nama')->label('Murid')->searchable(),
                Tables\Columns\TextColumn::make('mataPelajaran.nama')->label('Mata Pelajaran'),
                Tables\Columns\TextColumn::make('kategori')->label('Kategori'),
                Tables\Columns\TextColumn::make('nilai')->label('Nilai'),
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
            'index' => Pages\ListNilais::route('/'),
            'create' => Pages\CreateNilai::route('/create'),
            'edit' => Pages\EditNilai::route('/{record}/edit'),
        ];
    }
}
