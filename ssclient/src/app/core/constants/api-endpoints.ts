import { environment } from "../../../environments/environment";

export const API_ENDPOINTS = {
    auth: {
        login: `${environment.apiUrl}/login`,
        register: `${environment.apiUrl}/register`
    },
    adverts: {
        getAll: `${environment.apiUrl}/adverts`,

    },
    skills: {
        getAll: `${environment.apiUrl}/skills`
    }
}