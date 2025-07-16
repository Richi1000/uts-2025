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
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JamPelajaranResource extends Resource
{
    protected static ?string $model = JamPelajaran::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Jam Pelajaran';
    protected static ?string $pluralModelLabel = 'Jam Pelajaran';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('hari')
                    ->options([
                        'Senin' => 'Senin',
                        'Selasa' => 'Selasa',
                        'Rabu' => 'Rabu',
                        'Kamis' => 'Kamis',
                        'Jumat' => 'Jumat',
                        'Sabtu' => 'Sabtu',
                    ])
                    ->required(),

                Forms\Components\TimePicker::make('jam_mulai')
                    ->required()
                    ->label('Jam Mulai'),

                Forms\Components\TimePicker::make('jam_selesai')
                    ->required()
                    ->label('Jam Selesai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hari')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('jam_mulai')->label('Mulai'),
                Tables\Columns\TextColumn::make('jam_selesai')->label('Selesai'),
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
            'index' => Pages\ListJamPelajarans::route('/'),
            'create' => Pages\CreateJamPelajaran::route('/create'),
            'edit' => Pages\EditJamPelajaran::route('/{record}/edit'),
        ];
    }
}
