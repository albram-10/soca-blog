<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'tagline',
        'site_url',
        'admin_email',
        'site_icon',
    ];

    /**
     * There is only ever one settings row. Fetch it, creating a default if missing.
     */
    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'site_name' => 'SOCA',
            'tagline' => 'Belanja Shopee dan ShopeeFood pasti dapat cashback.',
        ]);
    }
}
