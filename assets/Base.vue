<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app"> base
      <router-view></router-view>
    </div>
</template>
<style>
</style>


<script>
import App from './components/App';
export default {
  name: 'Base',
    components: {App}
}
</script>