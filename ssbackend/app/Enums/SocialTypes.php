<?php

namespace App;

enum SocialType:string
{
    case Facebook = 'facebook';
    case Instagram = 'instagram';
    case X = 'x';
    case Youtube = 'youtube';
    case Whatsapp = 'whatsapp';
}