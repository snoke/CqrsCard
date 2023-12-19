<template>
  <div id="products">products
    <ul>
      <li v-for="product in $parent.products" :key="product.id" class="product">
        <div class="name">{{ product.name }}</div>
        <div class="price">price: {{ product.price }}€</div>
        <div class="add-to-cart">
          <button type="button" class="btn btn-outline-primary" @click="$parent.productAddToCart(product)">add to cart
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
  },
  mounted: function() {
    this.$parent.appGetProducts()
  },
  updated: function () {
  }
}
</script>