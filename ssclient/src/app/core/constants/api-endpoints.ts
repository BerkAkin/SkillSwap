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
    },
    achievements: {
        getAchievements: `${environment.apiUrl}/achievements`
    },
    settings: {
        getSettings: `${environment.apiUrl}/settings`
    },
    me: {
        info: `${environment.apiUrl}/me`,
        skills: `${environment.apiUrl}/me/skills`,
        wishlist: `${environment.apiUrl}/me/wishlist`
    }
}