export default {
  init() {
    // JavaScript to be fired on the home page
    $('.carousel').carousel({
      autoAdvance: true,
      autoTime: 5000,
    });
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};
