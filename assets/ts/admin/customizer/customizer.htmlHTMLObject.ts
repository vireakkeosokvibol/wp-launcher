import { customizerType } from './customizer.type';
import * as $ from 'jquery';
import { dragleave, dragover, drop } from './customizer.dragdrop';


/**
 * Declare empty variable wp for Wordpress javascript theme customizer api
 * see https://developer.wordpress.org/themes/customize-api/the-customizer-javascript-api/
*/
declare const wp: any;

export function renderHTMLObject(apply: boolean = true, htmlObjects: customizerType[]) {

  if (apply === true) {
    wp.customize('header-section-customizer', function (setting: any) {
      setting.set(JSON.stringify(htmlObjects));
    });
  }

  const render: JQuery<HTMLElement> = $('.header-customizer-display');

  render.html('');

  render.on('dragover', dragover);

  render.on('dragleave', dragleave);
  render.on('drop', drop);

  if (htmlObjects.length === 0) {
    render.append('<div class="col-12 empty-component" style="font-style: italic; padding: 25px 10px; color: #aaaaaa;">Add a container to start customizing.</div>');
    return;
  }

  for (const index in htmlObjects) {
    render.append(
      $('<div class="row g-1 p-1"></div>').append(
        $('<div class="col-12" style="border: 1px solid #efefef; box-sizing: border-box;"></div>').append(
          $('<div style="display: flex; font-size: 11px;">Container<span style="flex: 1 1 auto;"></span></div>').append(
            $('<span class="dashicons dashicons-edit"></span>').on('click', (event: JQuery.ClickEvent) => {
              $(event.currentTarget).children('.setting-panel').show();
            }).append(
              $('<span class="setting-panel"></span>').append('<button type="button" class="button">Close</button>').on('click', (event: JQuery.ClickEvent) => {
                event.preventDefault();
              })
            )
          ).append(
            $('<span class="dashicons dashicons-no"></span>').on('click', () => {
              htmlObjects.splice(parseInt(index), 1);
              renderHTMLObject(true, htmlObjects);
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
        $('<div class="col-' + htmlObjects[index].container.column[index2].span + '" style="height: 30px; border: 1px dashed #efefef;"></div>')
      )
    }
  }

}