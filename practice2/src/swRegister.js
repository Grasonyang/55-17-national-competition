function swRegister() {
    if ("serviceWorker" in navigator) {
        navigator.serviceWorker
            .register("sw.js", {
                scope: "./",
            })
            .then((registration) => {
                let serviceWorker;
                if (registration.installing) {
                    serviceWorker = registration.installing;
                    document.querySelector("#kind").textContent = "installing";
                } else if (registration.waiting) {
                    serviceWorker = registration.waiting;
                    document.querySelector("#kind").textContent = "waiting";
                } else if (registration.active) {
                    serviceWorker = registration.active;
                    document.querySelector("#kind").textContent = "active";
                }
                if (serviceWorker) {
                    serviceWorker.addEventListener("statechange", (e) => {
                        console.log("狀態變更為:", serviceWorker.state);
                    });
                }
            })
            .catch((error) => {
                console.error("Service Worker registration failed:", error);
            });
    } else {
        console.warn("Too old browser")
    }
}
export default swRegister;