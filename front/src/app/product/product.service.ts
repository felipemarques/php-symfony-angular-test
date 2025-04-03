import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Product } from './product';

import { Observable, throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

@Injectable({
  providedIn: 'root',
})
export class ProductService {
  
  private apiURL = 'http://127.0.0.1:8000/api';

  httpOptions = {
    headers: new HttpHeaders({
      'Content-Type': 'application/json',
    }),
  };

  constructor(private httpClient: HttpClient) {}

  /**
   * @return response()
   */
  getAll(): Observable<any> {
    return this.httpClient
      .get(this.apiURL + '/products/')

      .pipe(catchError(this.errorHandler));
  }

  /**
   * @return response()
   */
  create(product: Product): Observable<any> {
    return this.httpClient
      .post(this.apiURL + '/products/', JSON.stringify(product), this.httpOptions)
      .pipe(catchError(this.errorHandler));
  }

  /**
   * @return response()
   */
  find(id: number): Observable<any> {
    return this.httpClient
      .get(this.apiURL + '/products/' + id)
      .pipe(catchError(this.errorHandler));
  }

  /**
   * @return response()
   */
  update(id: number, product: Product): Observable<any> {
    return this.httpClient
      .put(this.apiURL + '/products/' + id, JSON.stringify(product), this.httpOptions)
      .pipe(catchError(this.errorHandler));
  }

  /**
   * @return response()
   */
  delete(id: number) {
    return this.httpClient
      .delete(this.apiURL + '/products/' + id, this.httpOptions)
      .pipe(catchError(this.errorHandler));
  }

  /**
   * @return response()
   */
  errorHandler(error: any) {
    let errorMessage = '';
    if (error.error instanceof ErrorEvent) {
      errorMessage = error.error.message;
    } else {
      errorMessage = `Error Code: ${error.status}\nMessage: ${error.message}`;
    }
    return throwError(errorMessage);
  }
}
