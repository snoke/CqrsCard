<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    <Cart></Cart>
    <Products></Products>
  </div>
</template>

<script>
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
  updated: function() {
  },
  methods: {
    productAddToCart: function(product) {
      this.cart.push(product);
    },
    appGetProducts: function() {
      let parent = this;
      axios.get('/appGetProducts')
          .then(function (response) {
            parent.products = Object.assign({}, response.data);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
  },
}
</script>