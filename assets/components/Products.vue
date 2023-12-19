<template>
  <div id="products">products
    <ul>
      <li v-for="product in $root.products" :key="product.id" class="product">
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
  methods: {
    productAddToCart: function(product) {
      this.$root.cart.push(product)
    }
  },
  mounted: function() {
    this.$root.appGetProducts()
  },
  updated: function () {
  }
}
</script>