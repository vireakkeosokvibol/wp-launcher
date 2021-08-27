import * as $ from 'jquery';
import { customizerType } from './customizer.type';
import { renderHTMLObject } from './customizer.htmlHTMLObject';
import { dragend, dragleave, dragover, dragstart, drop } from './customizer.dragdrop';
import { stringToObject } from './customizer.stringToObject';


/**
 * Start jQuery when html dom is already loaded.
*/
$(() => {

  let htmlObjects: customizerType[] = [];

  if (stringToObject()) {
    htmlObjects = stringToObject();
  }

  renderHTMLObject(false, htmlObjects);
  const addContainer: JQuery<HTMLElement> = $('.component #add-container')
  addContainer.on('click', () => {

    if (stringToObject()) {
      htmlObjects = stringToObject();
    }

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
    renderHTMLObject(true, htmlObjects);
  })
  addContainer.on('dragstart', dragstart);
  addContainer.on('dragend', dragend);

  const headerCustomizerDisplay: JQuery<HTMLElement> = $('.row .col-12.header-customizer-display');

  headerCustomizerDisplay.on('dragover', dragover);
  headerCustomizerDisplay.on('dragleave', dragleave);
  headerCustomizerDisplay.on('drop', drop);

});