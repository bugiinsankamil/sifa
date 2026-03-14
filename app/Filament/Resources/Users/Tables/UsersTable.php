<?php

namespace App\Filament\Resources\Users\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email address')
                    ->searchable(),
                TextColumn::make('email_verified_at')
                    ->label('Status Verifikasi')
                    ->default('-')
                    ->dateTime('d M Y H:i')
                    ->badge()
                    ->formatStateUsing(fn($state) => $state === '-' ? 'Klik  untuk Verifikasi' : $state)
                    ->color(fn($state) => $state === '-' ? 'warning' : 'success')
                    // ->placeholder('Klik untuk Verifikasi') // Teks bantuan
                    ->action(
                        Action::make('verify')
                            ->hidden(fn($record) => $record->email_verified_at !== null)
                            ->action(fn($record) => $record->update(['email_verified_at' => now()]))
                    ),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('username')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
