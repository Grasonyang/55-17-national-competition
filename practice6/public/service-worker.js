let version = "v1"
self.addEventListener("install", (event) => {
    event.waitUntil(
        caches
            .open(version)
            .then((cache) =>
                cache.addAll([
                    "/",
                ]),
            ),
    );
});
self.addEventListener("activate", (event) => {
    const cacheAllowlist = [version];

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
async function cacheThenNetwork(request) {
    const cachedResponse = await caches.match(request);
    if (cachedResponse) {
        console.log("Found response in cache:", cachedResponse);
        return cachedResponse;
    }
    console.log("Falling back to network");
    return fetch(request);
}

self.addEventListener("fetch", (event) => {
    console.log(`Handling fetch event for ${event.request.url}`);
    event.respondWith(cacheThenNetwork(event.request));
});