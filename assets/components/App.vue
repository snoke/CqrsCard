<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    <div id="cart">cart
      <ul>
        <li v-for="(product,index) in cart" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="buttons">
            <button type="button" class="btn btn-outline-secondary" @click="cartIncreaseProduct(index,product)">+
            </button>
            <button type="button" class="btn btn-outline-secondary" @click="cartDecreaseProduct(index,product)">-
            </button>
            <button type="button" class="btn btn-outline-secondary" @click="cartRemoveProduct(index,product)">remove
            </button>
          </div>
        </li>
        <li>
          <div class="sum">{{ cartGetSum(cart, 'price') }}</div>
        </li>
      </ul>
    </div>

    <div id="products">products
      <ul>
        <li v-for="(product,index) in products" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="price">price: {{ product.price }}€</div>
          <div class="add-to-cart">
            <input type="text" :ref="'amount_'+index" value="1"/>
            <button type="button" class="btn btn-outline-primary" @click="productAddToCart(index,product)">add to cart
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
      cart: [],
      sum: 0,
    }
  },
  mounted: function () {
    axios.get("/appGetProducts")
        .then((response) => {
          this.products = response.data;
        });
  },
  methods: {
    cartGetSum: function (array, property) {
      return array.reduce((accumulator, object) => {
        return accumulator + object[property];
      }, 0);
    },
    cartRemoveProduct: function (index, product) {
      this.cart = this.cart.filter(function (element) {
        return element.id !== product.id
      })
    }
    ,
    cartDecreaseProduct: function (index, product) {
      this.cart.splice(index, 1)
    }
    ,
    cartIncreaseProduct: function (index, product) {
      this.productAddToCart(product)
    }
    ,
    productAddToCart: function (index, product) {
      for (let i = 0; i < this.$refs['amount_' + index][0].value; i++) {
        this.cart = [product].concat(this.cart)
      }
    }
  },
}
</script>