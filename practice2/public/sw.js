// install > activate > fetch

self.addEventListener("install", (event) => {
    event.waitUntil(
        caches
            .open("v1")
            .then((cache) =>
                cache.addAll([
                    "/",
                ]),
            ),
    );
});
self.addEventListener("activate", (event) => {
    const cacheAllowlist = ["v1"];

    event.waitUntil(
        caches.keys().then((cacheNames) =>
            Promise.all(
                cacheNames.map((cacheName) => {
                    if (!cacheAllowlist.includes(cacheName)) {
                        return caches.delete(cacheName);
                    }
                    return undefined;
                }),
            ),
        ),
    );
});
self.addEventListener("fetch", (event) => {
    event.respondWith(
        catches
            .match(event.request)
            .then((response) => {
                if (response) {
                    return response;
                }
                return fetch(event.request);
            })
    )
});