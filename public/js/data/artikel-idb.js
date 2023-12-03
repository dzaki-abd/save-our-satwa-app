import { openDB } from "https://cdn.jsdelivr.net/npm/idb@8/+esm";

const CONFIG = {
    DATABASE_NAME: "artikel-database",
    DATABASE_VERSION: 1,
    OBJECT_STORE_NAME: "artikel",
};

const dbPromise = openDB(CONFIG.DATABASE_NAME, CONFIG.DATABASE_VERSION, {
    upgrade(database) {
        database.createObjectStore(CONFIG.OBJECT_STORE_NAME, { keyPath: "id" });
    },
});

const ArtikelIdb = {
    async getArtikel(id) {
        if (!id) {
            return;
        }

        return (await dbPromise).get(CONFIG.OBJECT_STORE_NAME, id);
    },

    async getAllArtikels() {
        return (await dbPromise).getAll(CONFIG.OBJECT_STORE_NAME);
    },

    async putArtikel(artikel) {
        if (!artikel.hasOwnProperty("id")) {
            return;
        }

        return (await dbPromise).put(CONFIG.OBJECT_STORE_NAME, artikel);
    },

    async deleteArtikel(id) {
        return (await dbPromise).delete(CONFIG.OBJECT_STORE_NAME, id);
    },
};

export default ArtikelIdb;
