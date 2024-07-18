<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;

class Attendee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function conference(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Conference::class);
    }

    public static function getForm(): array
    {
        return [
            Group::make()->columns(2)->schema([
                TextInput::make('name')
                    ->required()->maxLength(255),
                TextInput::make('email')
                    ->email()->required()->maxLength(255),
            ])
        ];
    }
}
