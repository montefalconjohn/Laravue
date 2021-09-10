export const config = {
    appName: process.env.VUE_APP_NAME || "",
    apiBaseUrl: process.env.VUE_APP_API_URL || "",
    enableAuthModule: (process.env.VUE_APP_ENABLE_AUTH_MODULE && process.env.VUE_APP_ENABLE_AUTH_MODULE === "true") || false
};