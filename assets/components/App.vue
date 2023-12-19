<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    <Cart></Cart>
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
          })
          .catch(function (error) {
            console.log(error);
          });
    },
  },
  mounted: function() {
  },
  updated: function() {
  }
}
</script>