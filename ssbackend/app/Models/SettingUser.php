<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SettingUser extends Pivot
{
    protected $guarded = [];

    protected $casts = [
        'is_enabled' => 'boolean',
    ];

    public function toggle(){
        $this->update(['is_enabled'=> ! $this->is_enabled]);
    }
    
    public function isEnabled(){
        return $this->is_enabled;
    }
    
}
