<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    {{ test }}
  </div>
</template>

<script>
import $ from "jquery";

export default {
  name: 'App',
  data () {
    return {
      test: [],
    }
  },
  mounted: function(){
    this.test.push(1);
    let self = this;
    $.get( "/appGetProducts", function( response ) {
      let data = JSON.parse(response);
      self.test = data;
    });
},
  methods: {
    appGetProducts: function() {
      let self = this;
      $.get( "/appGetProducts", function( response ) {
        let data = JSON.parse(response);
        self.products = data;
      });
    },
    },
}
</script>