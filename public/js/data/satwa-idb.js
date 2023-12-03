import { openDB } from "https://cdn.jsdelivr.net/npm/idb@8/+esm";

const CONFIG = {
    DATABASE_NAME: "satwa-database",
    DATABASE_VERSION: 1,
    OBJECT_STORE_NAME: "satwa",
};

const dbPromise = openDB(CONFIG.DATABASE_NAME, CONFIG.DATABASE_VERSION, {
    upgrade(database) {
        database.createObjectStore(CONFIG.OBJECT_STORE_NAME, { keyPath: "id" });
    },
});

const SatwaIdb = {
    async getSatwa(id) {
        if (!id) {
            return;
        }

        return (await dbPromise).get(CONFIG.OBJECT_STORE_NAME, id);
    },

    async getAllSatwas() {
        return (await dbPromise).getAll(CONFIG.OBJECT_STORE_NAME);
    },

    async putSatwa(satwa) {
        if (!satwa.hasOwnProperty("id")) {
            return;
        }

        return (await dbPromise).put(CONFIG.OBJECT_STORE_NAME, satwa);
    },

    async deleteSatwa(id) {
        return (await dbPromise).delete(CONFIG.OBJECT_STORE_NAME, id);
    },
};

export default SatwaIdb;
