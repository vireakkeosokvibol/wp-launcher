import * as $ from 'jquery';

export function dragover(event: JQuery.DragOverEvent) {
  console.log('yes');
  event.preventDefault();
  $(event.currentTarget).css('border', '1px dashed #666666');
}

export function dragleave(event: JQuery.DragLeaveEvent) {
  $(event.currentTarget).css('border', 'none');
  // console.log(event);
}

export function dragstart(event: JQuery.DragStartEvent) {
  // console.log(event);
}

export function drop(event: JQuery.DropEvent) {
  console.log('yes');
}