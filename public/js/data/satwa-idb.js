import { openDB } from "https://cdn.jsdelivr.net/npm/idb@8/+esm";

const CONFIG = {
    DATABASE_NAME: "satwa-database",
    DATABASE_VERSION: 2,
    OBJECT_STORE_NAME: "satwa",
    INDEX_NAME: "user_id_index",
};

const dbPromise = openDB(CONFIG.DATABASE_NAME, CONFIG.DATABASE_VERSION, {
    upgrade(database) {
        const objectStore = database.createObjectStore(CONFIG.OBJECT_STORE_NAME, { keyPath: "id" });
        objectStore.createIndex(CONFIG.INDEX_NAME, "user_id", { unique: false });
    },
});

const SatwaIdb = {
    async getSatwa(id) {
        if (!id) {
            return;
        }

        return (await dbPromise).get(CONFIG.OBJECT_STORE_NAME, id);
    },

    async getAllDataByUserId(user_id) {
        console.log(user_id);
        if (!user_id) {
            return [];
        }

        const db = await dbPromise;
        const transaction = db.transaction(CONFIG.OBJECT_STORE_NAME);
        const objectStore = transaction.objectStore(CONFIG.OBJECT_STORE_NAME);
        const index = objectStore.index(CONFIG.INDEX_NAME);

        return index.getAll(IDBKeyRange.only(user_id));
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