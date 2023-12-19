<template>
  <div id="products">products
    <ul>
      <li v-for="product in products" :key="product.id" class="product">
        <div class="name">{{ product.name }}</div>
        <div class="price">price: {{ product.price }}€</div>
        <div class="add-to-cart">
          <button type="button" class="btn btn-outline-primary" @click="productAddToCart(product)">add to cart
          </button>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data() {
    return {
      products: []
    }
  },
  methods: {
    appGetProducts: function(productId) {
      let self = this;
      axios.get('/appGetProducts')
          .then(function (response) {
            console.log(response.data)
            console.log(Object.assign([], response.data))
            console.log(JSON.parse(response.data))
            self.products = Object.assign([], response.data);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
    productAddToCart: function (product) {
      this.$root.$emit('productAddToCart', Object.assign({}, product))
    }
  },

  mounted: function() {
    this.appGetProducts()
  },
  updated: function () {
  }
}
</script>