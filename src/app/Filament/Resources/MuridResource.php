<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MuridResource\Pages;
use App\Filament\Resources\MuridResource\RelationManagers;
use App\Models\Murid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MuridResource extends Resource
{
    protected static ?string $model = Murid::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Murid';
    protected static ?string $pluralModelLabel = 'Murid';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nim')
                    ->required()
                    ->unique()
                    ->label('NIM'),
                Forms\Components\TextInput::make('nama')
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_lahir')
                    ->required()
                    ->label('Tanggal Lahir'),

                Forms\Components\Textarea::make('alamat')
                    ->required(),

                Forms\Components\TextInput::make('no_telepon')
                    ->label('No. Telepon')
                    ->tel()
                    ->required(),
            ]);
            
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nim')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('nama')->searchable(),
                Tables\Columns\TextColumn::make('tanggal_lahir')->date(),
                Tables\Columns\TextColumn::make('alamat')->limit(20),
                Tables\Columns\TextColumn::make('no_telepon'),
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
            'index' => Pages\ListMurids::route('/'),
            'create' => Pages\CreateMurid::route('/create'),
            'edit' => Pages\EditMurid::route('/{record}/edit'),
        ];
    }
}
