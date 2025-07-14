function SW() {
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("service-worker.js", {
                scope: "./",
            })
            .then((registration) => {
                let serviceWorker;
                if (registration.installing) {
                    serviceWorker = registration.installing;
                    console.log("Service worker installing");
                } else if (registration.waiting) {
                    serviceWorker = registration.waiting;
                    console.log("Service worker waiting");
                } else if (registration.active) {
                    serviceWorker = registration.active;
                    console.log("Service worker active");
                }
                if (serviceWorker) {
                    // logState(serviceWorker.state);
                    serviceWorker.addEventListener("statechange", (e) => {
                        console.log("Service worker state changed to:" + serviceWorker.state);
                        // logState(e.target.state);
                    });
                }
            })
            .catch((error) => {
                console.error("Service worker registration failed:", error);
            });
    } else {
        // The current browser doesn't support service workers.
        // Perhaps it is too old or we are not in a Secure Context.
    }
}
export default SW;