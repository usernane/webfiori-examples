/**
 * Initialize vue app.
 * @returns {undefined}
 */
function initApp(){
    window.vueApp = new Vue({
    el: '#main-content-area',
    data: {
      message: 'Hello Vue.js!'
    }
  });
}