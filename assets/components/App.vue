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
  data: () => {
    return {
      cart: [],
      products: [],
    }
  },
  methods: {
    productAddToCart(product) {
      console.log(this.cart)
      console.log(product)
      this.cart.push(product)
      alert("bbbb")
    },
    appGetProducts: function() {
      let parent = this;

    },
  },
}
</script>