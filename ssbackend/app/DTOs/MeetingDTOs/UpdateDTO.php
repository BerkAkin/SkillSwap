<?php

namespace App\DTOs\MeetingDTOs;

use App\Enums\StatusTypes;

final readonly class UpdateDTO
{

    public function __construct(
        public bool $choice,
        public int $meetingId,
    ) {}

    public static function fromArray(array $data):self{
        return new self(
            choice:$data['choice'],
            meetingId: $data['meeting_id'],
        );
    }
}
