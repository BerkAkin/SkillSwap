export interface IRegisterResponse {
    'message': string;
    'data': {
        'user': {
            'id': number;
            'firstname': string;
            'lastname': string;
            'email': string;
            'phone_number': string;
            'gender': string;
        };
        'token': string;
    }
}
