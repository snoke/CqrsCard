<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    <Cart></Cart>
    <div id="products">
      <ul>
        <li v-for="product in products" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="price">price: {{ product.price }}€</div>
          <div class="add-to-cart">
            <button type="button" class="btn btn-outline-primary" @click="productAddToCart(product.id)">add to cart
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Cart from './Cart';
export default {
  name: 'App',
  components: {Cart},
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
            alert(this.products[0].name)
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