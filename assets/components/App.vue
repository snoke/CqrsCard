<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">a
    <Cart></Cart>b
    <Products></Products>
  </div>
</template>

<script>
import axios from 'axios'
import Products from './Products';
import Cart from './Cart';
export default {
  name: 'App',
  components: {Products,Cart},
  data: function() {
    return {
      products: []
    }
  },
  methods: {
    appGetProducts: function(productId) {
      axios.get('/appGetProducts')
          .then(function (response) {
            this.products = JSON.parse(response.data);
            console.log(this.products);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
  },
  mounted: function() {
    this.appGetProducts()
  },
  updated: function() {
  }
}
</script>