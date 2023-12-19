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
import Auth from './components/Auth';
export default {
  name: 'Base',
    components: {App}
}
</script>