const createLikeMovieButtonTemplate = () => `
  <div aria-label="like this satwa" id="likeButton" class="like-button button-teal-500">
    <i class="fa-regular fa-heart"></i>
  </div>
`;

const createUnlikeMovieButtonTemplate = () => `
  <div aria-label="unlike this satwa" id="likeButton" class="like-button button-teal-500">
    <i class="fa-solid fa-heart"></i>
  </div>
`;

export { createLikeMovieButtonTemplate, createUnlikeMovieButtonTemplate };