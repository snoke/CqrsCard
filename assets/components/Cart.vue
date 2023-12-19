<template>
  <div id="cart">
    <ul>
      <li v-for="product in cart" :key="product.id" class="product">
        <div class="name">{{ product.name }}</div>
        <div class="price">price: {{ product.price }}€</div>
        <div class="buttons">
          <button type="button" class="btn btn-outline-secondary" @click="cartIncreaseProduct">+</button>
          <button type="button" class="btn btn-outline-secondary" @click="cartDecreaseProduct">-</button>
          <button type="button" class="btn btn-outline-secondary" @click="cartRemoveProduct">remove</button>
        </div>
      </li>
    </ul>
    <div class="checkout">
      <button type="button" class="btn btn-outline-primary" @click="cartSave">save</button>
    </div>
  </div>
</template>


<script>
import axios from 'axios'

export default {

  data: function() {
    return {
      cart: []
    }
  },
  methods: {
  },
  mounted: function() {
  },
  created: function () {
    this.$root.$on('cartAddProduct', (product) => {
      console.log("this.$root.$on('cartAddProduct'");
      this.cart.push(product)
    });
  }
}
</script>