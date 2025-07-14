function service_worker() {
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("/sw.js")
            .then((registration) => {
                console.log("Service worker registration succeeded:", registration);
            })
            .catch((error) => {
                console.error(`Service worker registration failed: ${error}`);
            });
        if (navigator.serviceWorker.controller) {
            console.log(
                "This page is currently controlled by:",
                navigator.serviceWorker.controller,
            );
        }
        navigator.serviceWorker.oncontrollerchange = () => {
            console.log(
                "This page is now controlled by",
                navigator.serviceWorker.controller,
            );
        };
    } else {
        console.log("Service workers are not supported.");
    }
}