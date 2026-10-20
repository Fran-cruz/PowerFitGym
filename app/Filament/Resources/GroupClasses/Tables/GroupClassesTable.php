<?php

namespace App\Filament\Resources\GroupClasses\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class GroupClassesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('trainingArea.name')
                    ->searchable(),
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('instructor_name')
                    ->searchable(),
                TextColumn::make('day_of_week')
                    ->searchable(),
                TextColumn::make('start_time')
                    ->time()
                    ->sortable(),
                TextColumn::make('end_time')
                    ->time()
                    ->sortable(),
                IconColumn::make('is_active')
                    ->boolean(),
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
                SelectFilter::make('training_area')
                    ->relationship('trainingArea', 'name')
                    ->searchable()
                    ->preload(),
                SelectFilter::make('day_of_week')
                    ->options([
                        'lunes' => 'Monday',
                        'martes' => 'Tuesday',
                        'miércoles' => 'Wednesday',
                        'jueves' => 'Thursday',
                        'viernes' => 'Friday',
                        'sábado' => 'Saturday',
                        'domingo' => 'Sunday',
                    ]),
                TernaryFilter::make('is_active')
                    ->label('Status')
                    ->placeholder('All classes')
                    ->trueLabel('Active classes')
                    ->falseLabel('Inactive classes'),
                Filter::make('class_time')
                    ->schema([
                        TimePicker::make('starts_from'),
                        TimePicker::make('starts_until'),
                        TimePicker::make('ends_from'),
                        TimePicker::make('ends_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when($data['starts_from'], fn (Builder $query, $time): Builder => $query->whereTime('start_time', '>=', $time))
                            ->when($data['starts_until'], fn (Builder $query, $time): Builder => $query->whereTime('start_time', '<=', $time))
                            ->when($data['ends_from'], fn (Builder $query, $time): Builder => $query->whereTime('end_time', '>=', $time))
                            ->when($data['ends_until'], fn (Builder $query, $time): Builder => $query->whereTime('end_time', '<=', $time));
                    }),
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
