import { precacheAndRoute } from "workbox-precaching";
import { registerRoute } from "workbox-routing";
import { StaleWhileRevalidate, CacheFirst } from "workbox-strategies";

// Precache static assets
precacheAndRoute(self.__WB_MANIFEST);

// Cache API responses
registerRoute(
    ({ url }) => url.pathname.startsWith("/api"),
    new StaleWhileRevalidate({
        cacheName: "api-cache",
    })
);

// Cache images
registerRoute(
    ({ request }) => request.destination === "image",
    new CacheFirst({
        cacheName: "image-cache",
    })
);

// Handle push notifications
self.addEventListener("push", (event) => {
    const payload = event.data ? event.data.text() : "No payload";
    const title = "Push Notification";
    const options = {
        body: payload,
        icon: "/logo192.png",
    };

    event.waitUntil(self.registration.showNotification(title, options));
});
