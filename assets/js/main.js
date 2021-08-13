jQuery(function ($) {
  $('.my_custom_button').click(function () {
    $('.wp-launcher-container').toggle();
  });

  wp.customize('wp-launcher-customize-header-menu-arrange', function (control) {
    control.bind(function (value) {
    });
  });

  $('.add-container').click(function () {
    wp.customize('wp-launcher-customize-header-menu-arrange', function (control) {
      control.set('some value');
    });
  });

  $('.draggable').on('dragstart', function () {

  });

  $('.draggable').on('dragend', function () {
    console.log('en');
  });
});