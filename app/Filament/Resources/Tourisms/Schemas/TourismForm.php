<?php

namespace App\Filament\Resources\Tourisms\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class TourismForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Dasar')
                    ->columns(2)
                    ->components([
                        TextInput::make('name')
                            ->label('Nama Wisata')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Select::make('categories')
                            ->label('Kategori')
                            ->relationship('categories', 'name', fn ($query) => $query->where('type', 'wisata'))
                            ->multiple()
                            ->required()
                            ->preload(),
                        TextInput::make('address')
                            ->label('Alamat')
                            ->maxLength(255),
                        Textarea::make('description')
                            ->label('Deskripsi')
                            ->columnSpanFull()
                            ->rows(4),
                    ]),

                Section::make('Lokasi')
                    ->columns(2)
                    ->components([
                        TextInput::make('latitude')
                            ->required()
                            ->numeric()
                            ->step(0.0000001)
                            ->minValue(-90)
                            ->maxValue(90),
                        TextInput::make('longitude')
                            ->required()
                            ->numeric()
                            ->step(0.0000001)
                            ->minValue(-180)
                            ->maxValue(180),
                    ]),

                Section::make('Detail Wisata')
                    ->columns(2)
                    ->components([
                        TextInput::make('ticket_price')
                            ->label('Harga Tiket')
                            ->maxLength(255)
                            ->placeholder('Rp 10.000'),
                        TextInput::make('opening_hours')
                            ->label('Jam Operasional')
                            ->maxLength(255)
                            ->placeholder('08:00 - 17:00'),
                        Textarea::make('facilities')
                            ->label('Fasilitas')
                            ->columnSpanFull()
                            ->rows(2)
                            ->placeholder('Parkir, Toilet, Mushola'),
                    ]),

                Section::make('Kontak')
                    ->columns(2)
                    ->components([
                        TextInput::make('phone')
                            ->label('Telepon')
                            ->maxLength(20)
                            ->placeholder('081234567890'),
                        TextInput::make('instagram')
                            ->label('Instagram')
                            ->maxLength(255)
                            ->placeholder('@namaakun'),
                    ]),

                Section::make('Media & Status')
                    ->components([
                        FileUpload::make('image')
                            ->label('Gambar')
                            ->image()
                            ->disk('public')
                            ->directory('wisata')
                            ->visibility('public')
                            ->maxSize(2048)
                            ->imageEditor(),
                        Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                    ]),
            ]);
    }
}
