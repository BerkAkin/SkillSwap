<?php

namespace App\DTOs\MeetingDTOs;

use App\Enums\StatusTypes;
use Illuminate\Support\Facades\Date;

final readonly class DecideResultDTO
{

    public function __construct(
        public string $meetingId,
        public string $userId,
        public bool $operation,

    ) {}

    public static function fromArray(array $data):self{
        return new self(
            meetingId: $data['meeting_id'],
            userId: $data['user_id'],
            operation: $data['operation']
        );
    }
}
