import * as $ from 'jquery';
import { renderHTMLObject } from './customizer.htmlHTMLObject';
import { stringToObject } from './customizer.stringToObject';
import { customizerType } from './customizer.type';

export function dragover(event: JQuery.DragOverEvent): void {
  event.preventDefault();
  const draggingElement: JQuery<HTMLElement> = $('.dragging');
  if (draggingElement.length > 0) {
    // $(event.currentTarget).css('border', '1px dashed #666666');
  }
}

export function dragleave(event: JQuery.DragLeaveEvent): void {
  event.originalEvent.dataTransfer.setData('element', null);
  $(event.currentTarget).css('border', 'none');
  console.log('leave')
}

export function dragstart(event: JQuery.DragStartEvent): void {
  $(event.currentTarget).addClass('dragging');
  event.originalEvent.dataTransfer.setData('element', 'container');
  event.originalEvent.dataTransfer.setData('elementIndex', '-1');
}
export function dragend(event: JQuery.DragEndEvent): void {
  $('.dragging').removeClass('dragging');
}

export function drop(event: JQuery.DropEvent) {

  event.preventDefault();

  const element: string = event.originalEvent.dataTransfer.getData('element');
  const elementIndex: number = parseInt(event.originalEvent.dataTransfer.getData('elementID'));
  if (element === '') {
    return;
  }

  let htmlObjects: customizerType[] = [];

  if (stringToObject()) {
    htmlObjects = stringToObject();
  }

  $('.dragging').removeClass('dragging');
  $(event.currentTarget).css('border', 'none');
  event.originalEvent.dataTransfer.setData('element', 'null');

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

}