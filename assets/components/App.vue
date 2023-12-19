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
  updated: function() {
  },
  methods: {}
}
</script>