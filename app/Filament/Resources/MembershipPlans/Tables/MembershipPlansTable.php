<?php

namespace App\Filament\Resources\MembershipPlans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class MembershipPlansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('price')
                    ->money()
                    ->sortable(),
                TextColumn::make('billing_period')
                    ->searchable(),
                TextColumn::make('badge')
                    ->searchable(),
                TextColumn::make('badge_type')
                    ->searchable(),
                TextColumn::make('savings_text')
                    ->searchable(),
                TextColumn::make('button_text')
                    ->searchable(),
                IconColumn::make('is_featured')
                    ->boolean(),
                IconColumn::make('is_active')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('billing_period')
                    ->options([
                        '/ mes' => 'Monthly',
                        '/ 3 meses' => 'Quarterly',
                        '/ año' => 'Yearly',
                    ]),
                SelectFilter::make('badge_type')
                    ->options([
                        'is-popular' => 'Popular',
                        'is-saving' => 'Savings',
                        'is-best' => 'Best value',
                    ]),
                TernaryFilter::make('is_featured')
                    ->label('Featured')
                    ->placeholder('All plans')
                    ->trueLabel('Featured plans')
                    ->falseLabel('Not featured plans'),
                TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('All plans')
                    ->trueLabel('Active plans')
                    ->falseLabel('Inactive plans'),
                Filter::make('created_at')
                    ->schema([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['created_from'], fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date))
                            ->when($data['created_until'], fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date));
                    }),
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
