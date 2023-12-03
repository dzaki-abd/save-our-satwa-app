import SatwaIdb from '../data/satwa-idb.js';
import { createLikeMovieButtonTemplate, createUnlikeMovieButtonTemplate } from '../templates/like-button-templates.js';

const LikeButtonInitiator = {
  async init({ likeButtonContainer, satwa }) {
    this._likeButtonContainer = likeButtonContainer;
    this._satwa = satwa;

    await this._renderButton();
  },

  async _renderButton() {
    const { id } = this._satwa;

    if (await this._isSatwaExist(id)) {
      this._renderLiked();
    } else {
      this._renderLike();
    }
  },

  async _isSatwaExist(id) {
    const satwa = await SatwaIdb.getSatwa(id);
    return !!satwa;
  },

  _renderLike() {
    this._likeButtonContainer.innerHTML = createLikeMovieButtonTemplate();

    const likeButton = document.querySelector('#likeButton');
    likeButton.addEventListener('click', async () => {
      await SatwaIdb.putSatwa(this._satwa);
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
      await SatwaIdb.deleteSatwa(this._satwa.id);
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