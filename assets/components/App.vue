<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">

    <div class="test">
      <ul><
      <li v-for="(product,index) in transformCart" :key="product.id" class="product">
        <div class="name">{{ product.name }}</div>
        <div class="price">price: {{ product.price | currency }}</div>
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
    axios.get("/query/appGetCard?sessionId=" + this.$root.config.sessionId)
        .then((response) => {
          this.cart = this.transformCart(response.data);
        });
    axios.get("/query/appGetProducts?sessionId=" + this.$root.config.sessionId)
        .then((response) => {
          this.products = response.data;
        });
  },
  methods: {
    transformCart(cart) {
      let array = []
      for (let product of cart) {
        array[product.id] = array[product.id] ? array[product.id] : [];
        array[product.id].push(product);
      }
      this.cart = array;
    },
    cartCheckout: function () {
      axios.post("/api/cartSave?sessionId=" + this.$root.config.sessionId, {cart: this.cart})
          .then((response) => {
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