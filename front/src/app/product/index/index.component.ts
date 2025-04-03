import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterModule } from '@angular/router';
import { Product } from '../product';
import { ProductService } from '../product.service';

@Component({
  selector: 'app-index',
  standalone: true,
  imports: [CommonModule, RouterModule],
  templateUrl: './index.component.html',
  styleUrl: './index.component.css',
})
export class IndexComponent {
  products: Product[] = [];

  // constructor() {
  //   for (let i = 1; i <= 10; i++) {
  //     this.products.push({
  //       id: i,
  //       name: "Produto " + i,
  //       description: "description of the product " + i,
  //       price: Number((9.87 * i).toFixed(2))
  //     });
  //   }
  // }

  constructor(public productService: ProductService) {}

  /**
   * @return response()
   */
  ngOnInit(): void {
    this.productService.getAll().subscribe((data: Product[]) => {
      this.products = data;
      console.log(this.products);
    });
  }

  /**
   * @return response()
   */
  deletePost(id: number) {
    this.productService.delete(id).subscribe((res) => {
      this.products = this.products.filter((item) => item.id !== id);
      console.log('Product deleted successfully!');
    });
  }
}
