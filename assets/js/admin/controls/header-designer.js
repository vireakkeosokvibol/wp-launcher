const classNamespace = '.wp-launcher-header-designer ';

jQuery(function ($) {

  let html = []; /* Store all HTML to display and store to database */

  /**
   * Drag drop handler. Manage drag drop event on class dropzone.
  */
  function dropzone() {
    const dropzoneElement = $(classNamespace + '.container .row .designer-display .row .dropzone');
    dropzoneElement.on('dragover', function (event) {
      event.preventDefault();
      $(event.currentTarget).addClass('dropover');
    });
    dropzoneElement.on('dragleave', function (event) {
      $(event.currentTarget).removeClass('dropover');
    });
    dropzoneElement.on('drop', function (event) {
      $(event.currentTarget).removeClass('dropover');
    });
  }

  $('.removeContainer').on('click', function () {
    alert('test');
  })

  /**
   * Display html object to designer-display
  */
  function designer_display() {
    $(classNamespace + '.container .row .designer-display').html('');
    for (let i = 0; i < html.length; i++) {
      $(classNamespace + '.container .row .designer-display').append(
        $('<div class="row"></div>').append(
          $('<div class="col-12" style="display: flex; font-size: 11px;">Container<span style="flex: 1 1 auto;"></span></div>').append(
            $('<span id="remove-container" class="dashicons dashicons-no-alt" style="cursor: pointer;"></span>').on('click', function () {
              html.splice(i, 1);
              designer_display();
            })
          )
        ).append('<div class="dropzone col-12"></div>')
      );

       dropzone();
    }
  }

  $(classNamespace + '.button.open-designer').click(function () {
    $(classNamespace + '.button.open-designer').toggle();
    $(classNamespace + '.container').toggle();
  });

  $(classNamespace + '.container #add-container').on('click', function () {
    html.push({ container: '' });
    designer_display();
  })

});