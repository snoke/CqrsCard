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
      products: [
        { id: 1, name: 'test', price:2.25}
      ],
    }
  },
  methods: {
  },
  mounted: function() {
  },
  updated: function() {
  }
}
</script>