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

// Load Events
jQuery(document).ready(() => routes.loadEvents());
