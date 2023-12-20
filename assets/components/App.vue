<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">
    <div class="row">

      <div class="col-auto">

        <div id="cart">cart
          <ul>
            <li v-for="(entry,productId) in this.cartTransformed" :key="productId" class="product" v-if="productId">
              <div class="name">Name: {{ entry['entity'].name }}</div>
              <div class="price">Price: {{ entry['entity'].price | currency }}</div>
              <div class="amount">Amount: {{ entry['amount'] }}</div>
              <div class="priceSubTotal">Price subtotal: {{ entry['entity'].price * entry['amount'] | currency }}</div>
              <div class="buttons">
                <button type="button" class="btn btn-outline-secondary button-increase" @click="cartIncreaseProduct(index,entry['entity'])">
                  +
                </button>
                <button type="button" class="btn btn-outline-secondary button-decrease" @click="cartDecreaseProduct(index,entry['entity'])">
                  -
                </button>
                <button type="button" class="btn btn-outline-secondary button-remove" @click="cartRemoveProduct(index,entry['entity'])">
                  remove
                </button>
              </div>

            </li>
          </ul>
          <div class="sum" >Total: {{
              cart.reduce((accumulator, object) => {
                return accumulator + object['price'];
              }, 0) | currency
            }}
          </div>
          <div class="w-100 text-center">
            <button type="button" class="btn btn-outline-primary" @click="cartCheckout()">checkout
            </button>
          </div>
        </div>
      </div>
      <div class="col-auto">

        <div id="products">products
          <ul>
            <li v-for="(product,index) in products" :key="product.id" class="product">
              <div class="name">{{ product.name }}</div>
              <div class="price">price: {{ product.price | currency }}</div>
              <div class="add-to-cart">
                amount: <input type="text" :ref="'amount_'+index" value="1"/>
                <button type="button" class="btn btn-outline-primary" @click="productAddToCart(index,product)">add to
                  cart
                </button>
              </div>
            </li>
          </ul>
        </div>
      </div>

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
    },
  },

  data() {
    return {
      products: [],
      cart: [],
      cartTransformed: [],
      sum: 0,
    }
  },
  watch: {
    cart: function (val) {
      this.cartTransformed = this.transformCart(val)
    },
  },
  mounted: function () {
    axios.get("/query/appGetCard?sessionId=" + this.$root.config.sessionId)
        .then((response) => {
          this.cart = response.data;
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
        array[product.id]['entity'] = product;
        array[product.id]['amount'] = array[product.id]['amount'] ? array[product.id]['amount'] : 0;
        array[product.id]['amount']++;
      }
      return array;
    },
    cartCheckout: function () {
      axios.post("/command/cartSave?sessionId=" + this.$root.config.sessionId, {cart: this.cart})
          .then((response) => {
            alert("card saved")
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