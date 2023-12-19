<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    <div id="cart">cart
      <ul>
        <li v-for="(product,index) in cart" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="price">price: {{ product.price | currency }}</div>
          <div class="buttons">
            <button type="button" class="btn btn-outline-secondary" @click="cartIncreaseProduct(index,product)">+
            </button>
            <button type="button" class="btn btn-outline-secondary" @click="cartDecreaseProduct(index,product)">-
            </button>
            <button type="button" class="btn btn-outline-secondary" @click="cartRemoveProduct(index,product)">remove
            </button>
          </div>
        </li>
      </ul>
      <div class="sum">{{
          cart.reduce((accumulator, object) => {
            return accumulator + object['price'];
          }, 0) | currency
        }}
      </div>
      <button type="button" class="btn btn-outline-primary" @click="cartCheckout()">checkout
      </button>
    </div>

    <div id="products">products
      <ul>
        <li v-for="(product,index) in products" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="price">price: {{ product.price | currency }}</div>
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
  filters: {
    currency(value) {
      return new Intl.NumberFormat("en-US",
          {style: "currency", currency: "USD"}).format(value);
    }
  },

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
    cartCheckout: function () {
      axios.post("/cartSave", {cart: this.cart})
          .then((response) => {
            console.log(response)
            alert("ok")
          });
    },
    cartRemoveProduct: function (index, product) {
      this.cart = this.cart.filter(function (element) {
        return element.id !== product.id
      })
    },
    cartDecreaseProduct: function (index, product) {
      this.cart.splice(index, 1)
    },
    cartIncreaseProduct: function (index, product) {
      this.productAddToCart(index, product, 1)
    },
    productAddToCart: function (index, product, amount) {
      for (let i = 0; i < (amount ? amount : this.$refs['amount_' + index][0].value); i++) {
        this.cart = [product].concat(this.cart)
      }
    }
  },
}
</script>