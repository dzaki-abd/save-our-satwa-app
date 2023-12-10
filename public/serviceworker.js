var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    // '/img/icon/maskable_icon_x48.png',
    // '/img/icon/maskable_icon_x72.png',
    // '/img/icon/maskable_icon_x96.png',
    // '/img/icon/maskable_icon_x128.png',
    // '/img/icon/maskable_icon_x192.png',
    // '/img/icon/maskable_icon_x384.png',
    // '/img/icon/maskable_icon_x512.png',
    // '/img/icon/maskable_icon.png',
    // '/img/splash/splash-640x1136.jpg',
    // '/img/splash/splash-750x1334.jpg',
    // '/img/splash/splash-828x1792.jpg',
    // '/img/splash/splash-1125x2436.jpg',
    // '/img/splash/splash-1242x2208.jpg',
    // '/img/splash/splash-1242x2688.jpg',
    // '/img/splash/splash-1536x2048.jpg',
    // '/img/splash/splash-1668x2224.jpg',
    // '/img/splash/splash-1668x2388.jpg',
    // '/img/splash/splash-2048x2732.jpg',
    // '/img/bri.png',
    // '/img/jumbotron.jpg',
    // '/img/jumbotron-2.jpg',
    // '/img/default-profil.png',
    // '/img/donasi.jpg',
    // '/img/faq.jpg',
    // '/',
    // '/images/icons/icon-72x72.png',
    // '/images/icons/icon-96x96.png',
    // '/images/icons/icon-128x128.png',
    // '/images/icons/icon-144x144.png',
    // '/images/icons/icon-152x152.png',
    // '/images/icons/icon-192x192.png',
    // '/images/icons/icon-384x384.png',
    // '/images/icons/icon-512x512.png',
    // '/css/app.css',
    // '/js/app.js',
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});