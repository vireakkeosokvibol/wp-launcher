import * as $ from 'jquery';

export function stringToObject () {
  try {

    const html: string = $('#header-customizer').val().toString();

    if (html && html !== '' && html !== '[]') {
      return JSON.parse(html);
    }

  } catch (error) {
    console.log(error)
    return false;
  }
}
