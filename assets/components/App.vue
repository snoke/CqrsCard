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