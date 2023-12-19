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
    }
  },
  updated: function() {
  }
}
</script>