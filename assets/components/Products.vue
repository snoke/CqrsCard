<template>
  <div id="products">products
    <ul>
      <li v-for="product in products" :key="product.id" class="product">
        <div class="name">{{ product.name }}</div>
        <div class="price">price: {{ product.price }}€</div>
        <div class="add-to-cart">
          <button type="button" class="btn btn-outline-primary" @click="$parent.productAddToCart(product)">add to cart
          </button>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'
import $ from "jquery";

export default {
  data() {
    return {
      products: []
    }
  },
  methods: {
    appGetProducts: function(productId) {
      let self = this;
      $.get( "/appGetProducts", function( response ) {
        let data = JSON.parse(response);
        self.products = data;
      });
    },
    productAddToCart: function (product) {
      this.$parent.productAddToCart(product)
    }
  },

  mounted: function() {
    this.appGetProducts()
  },
  updated: function () {
  }
}
</script>