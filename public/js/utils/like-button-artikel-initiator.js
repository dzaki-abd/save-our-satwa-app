import ArtikelIdb from '../data/artikel-idb.js';
import { createLikeMovieButtonTemplate, createUnlikeMovieButtonTemplate } from '../templates/like-button-templates.js';

const LikeButtonInitiator = {
  async init({ likeButtonContainer, artikel }) {
    this._likeButtonContainer = likeButtonContainer;
    this._artikel = artikel;

    await this._renderButton();
  },

  async _renderButton() {
    const { id } = this._artikel;

    if (await this._isArtikelExist(id)) {
      this._renderLiked();
    } else {
      this._renderLike();
    }
  },

  async _isArtikelExist(id) {
    const artikel = await ArtikelIdb.getArtikel(id);
    return !!artikel;
  },

  _renderLike() {
    this._likeButtonContainer.innerHTML = createLikeMovieButtonTemplate();

    const likeButton = document.querySelector('#likeButton');
    likeButton.addEventListener('click', async () => {
      await ArtikelIdb.putArtikel(this._artikel);
      this._renderButton();
      Swal.fire({
        title: 'Berhasil',
        text: 'Berhasil menambahkan ke favorit.',
        icon: 'success',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
      });
    });
  },

  _renderLiked() {
    this._likeButtonContainer.innerHTML = createUnlikeMovieButtonTemplate();

    const likeButton = document.querySelector('#likeButton');
    likeButton.addEventListener('click', async () => {
      await ArtikelIdb.deleteArtikel(this._artikel.id);
      this._renderButton();
      Swal.fire({
        title: 'Berhasil',
        text: 'Berhasil menghapus dari favorit.',
        icon: 'success',
        timer: 3000,
        timerProgressBar: true,
        showConfirmButton: false
      });
    });
  },
};

export default LikeButtonInitiator;