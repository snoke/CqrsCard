<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    {{ test }}
  </div>
</template>

<script>
export default {
  name: 'App',
  data () {
    return {
      test: [],
    }
  },
  mounted: () => {
    this.test.push(1);
},
  methods: {
    },
}
</script>