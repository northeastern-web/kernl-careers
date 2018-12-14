// Main
//
// main entry importing dependencies


// import external dependencies
import 'jquery';
import 'kernl-ui';

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';

// Populate Router instance with DOM routes
const routes = new Router({
  common, // All pages
  home,
});

//
// career design:

  // carousel
  $('.carousel').carousel({
    autoAdvance: true,
    autoTime: 5000,
  });

  // load some 16:9 images and randomize them
  const path = './app/uploads/hero-random/'
  const images = [
    '16x9-hero1.jpg','16x9-hero2.jpg','16x9-hero3.jpg','16x9-hero4.jpg','16x9-hero5.jpg',
  ]
  const randomImages = Math.floor(Math.random() * images.length)
  const selectedImg = images.splice(randomImages,1)

  $('.home #section-1').attr("style",`background-image: url(${path}${selectedImg});`)

// end career design
//

// Load Events
jQuery(document).ready(() => routes.loadEvents());
