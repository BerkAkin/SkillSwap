import { IAchievementModel } from "../../../features/achievements/models/IAchievementModel";

export interface IUserDataModel {
    'firstname': string;
    'lastname': string;
    'phone_number': string;
    'email': string;
    'gender': string;
    'isActive': string;
    'role': string;
    'register_date': string;

    'credits': {
        'points': string;
    };
    'skills': [
        {
            'id': string,
            'name': string,
        }
    ];

    'wishlist': [
        {
            'id': string,
            'name': string,
            'description': string
        }
    ];

    'socials': [
        {
            'id': string,
            'type': string,
            'url': string,
        }
    ];

    'achievements': number[];
    'settings': [
        {
            'id': string,
            'name': string,
            'description': string,
            'is_enabled': string,
        }
    ];
}