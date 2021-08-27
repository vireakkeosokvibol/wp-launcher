jQuery(function ($) {
  let htmlObjects = [];
  try {
    const html = $('#header-customizer').val()
    
    if (html && html !== '' && html !== '[]') {
      htmlObjects = JSON.parse(html);
      console.log(htmlObjects);
    }
  } catch (error) {
    console.log(error);
  }

  function render_htmlObject(apply = true) {

    if (apply === true) {
      wp.customize('header-section-customizer', function (setting) {
        setting.set(JSON.stringify(htmlObjects));
      });
    }

    const render = $('.header-customizer-display');

    render.html('');

    if (htmlObjects.length === 0) {
      render.append('<div class="col-12 empty-component" style="font-style: italic; padding: 25px 10px; color: #aaaaaa;">Add a container to start customizing.</div>');
      return;
    }

    for (const index in htmlObjects) {
      render.append(
        $('<div class="row g-1 p-1"></div>').append(
          $('<div class="col-12" style="border: 1px solid #efefef; box-sizing: border-box;"></div>').append(
            $('<div style="display: flex; font-size: 11px;">Container<span style="flex: 1 1 auto;"></span></div>').append(
              $('<span class="dashicons dashicons-edit"></span>').on('click', function (event) {
                $(event.currentTarget).children('.setting-panel').show();
              }).append(
                $('<span class="setting-panel"></span>').append('<button type="button" class="button">Close</button>').on('click', function (event) {
                  event.preventDefault();
                  console.log('panel clicked')
                })
              )
            ).append(
              $('<span class="dashicons dashicons-no"></span>').on('click', function () {
                htmlObjects.splice(index, 1);
                render_htmlObject();
              })
            )
          ).append(
            $('<div class="row g-1 p-1"></div>').append(
            )
          )
        )
      );
      for (const index2 in htmlObjects[index].container.column) {
        render.find('.row .col-12 .row:eq(' + index + ')').append(
          $('<div class="col-' + htmlObjects[index].container.column[index2].span + '" style="height: 30px; border: 1px dashed #efefef;">asd</div>')
        )
      }
    }

  }
  render_htmlObject(false);

  $('.component #add-container').on('click', function () {
    htmlObjects.push({
      container: {
        column: [
          {
            span: 12,
            html: ''
          }
        ]
      }
    });
    render_htmlObject();
  })

});