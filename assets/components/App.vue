<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">

    <div id="cart">cart
      <ul>
        <li v-for="(product,index) in cart" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="buttons">
            <button type="button" class="btn btn-outline-secondary" @click="cartIncreaseProduct(product)">+</button>
            <button type="button" class="btn btn-outline-secondary" @click="cartDecreaseProduct(index)">-</button>
            <button type="button" class="btn btn-outline-secondary" @click="cartRemoveProduct(product)">remove</button>
          </div>
        </li>
      </ul>
    </div>

    <div id="products">products
      <ul>
        <li v-for="product in products" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="price">price: {{ product.price }}€</div>
          <div class="add-to-cart">
            <input type="text" :id="'amount_'+index" value="1"/><button type="button" class="btn btn-outline-primary" @click="productAddToCart(product)">add to cart
            </button>
          </div>
        </li>
      </ul>
    </div>
  </div>

</template>

<script>
import axios from "axios";

export default {
  name: 'App',
  data() {
    return {
      products: [],
      cart: []
    }
  },
  mounted: function () {
    axios.get("/appGetProducts")
        .then( (response) => {
          this.products = response.data;
    });
  },
  methods: {
    cartRemoveProduct: function(product) {
      this.cart = this.cart.filter(function(element) {
        return element.id !== product.id
      })
    },
    cartDecreaseProduct: function(index) {
      this.cart.splice(index,1)
    },
    cartIncreaseProduct: function(product) {
      this.productAddToCart(product)
    },
    productAddToCart: function (product) {
      this.cart = [product].concat(this.cart)
    }
  },
}
</script>