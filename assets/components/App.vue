<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    <Cart></Cart>
    <Products></Products>
  </div>
</template>

<script>
import $ from "jquery";

import Products from './Products';
import Cart from './Cart';
import axios from 'axios'
export default {
  name: 'App',
  components: {Products,Cart},
  data: function() {
    return {
      cart: [],
      products: [],
    }
  },
  methods: {
    productAddToCart(product) {
      this.cart.push(Object.assign({}, product));
    },
    appGetProducts: function() {
      let parent = this;

    },
  },
}
</script>