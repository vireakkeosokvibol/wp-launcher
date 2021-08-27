import * as $ from 'jquery';
import { customizerType } from './customizer.type';
import { renderHTMLObject } from './customizer.htmlHTMLObject';
import { dragstart } from './customizer.dragdrop';


/**
 * Start jQuery when html dom is already loaded.
*/
$(() => {

  let htmlObjects: customizerType[] = [];

  try {

    const html: string = $('#header-customizer').val().toString();

    if (html && html !== '' && html !== '[]') {
      htmlObjects = JSON.parse(html);
    }

  } catch (error) {
    console.log(error);
  }

  renderHTMLObject(false, htmlObjects);
  const addContainer: JQuery<HTMLElement> = $('.component #add-container')
  addContainer.on('click', () => {
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

});