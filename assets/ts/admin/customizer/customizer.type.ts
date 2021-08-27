/**
 * Interface for customizer object to render to html
*/
export interface customizerType {
  container: {
    column: {
      span: number,
      html: string
    }[]
  }
}