<?php

namespace App\DTOs\MeetingDTOs;

use App\Enums\StatusTypes;
use Illuminate\Support\Facades\Date;

final readonly class StoreDTO
{

    public function __construct(
        public string $meetingTypeId,
        public Date $date,
        public string $advertId,
        public string $offerId,
        public StatusTypes $type,

    ) {}

    public static function fromArray(array $data):self{
        return new self(
            meetingTypeId: $data['meeting_type_id'],
            date: $data['date'],
            advertId:$data['advert_id'],
            offerId:$data['offer_id'],
            type: StatusTypes::Pending,
        );
    }
}
