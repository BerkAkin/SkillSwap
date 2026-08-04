<?php

namespace App\Enums\app\enums;

enum StatusTypes:string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Rejected = 'rejected';
    case Completed = 'completed';
    case Conflicted = 'conflicted';
    case Open = 'open';
    case Close = 'close';
}
