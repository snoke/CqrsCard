<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">

    <div id="cart">cart{{cart}}
      <ul>
        <li v-for="product in cart" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
        </li>
      </ul>
    </div>

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
  </div>

</template>

<script>
import $ from "jquery";

export default {
  name: 'App',
  data () {
    return {
      products: [],
      cart: []
    }
  },
  mounted: function(){
    //this.test.push(1);
    $.get( "/appGetProducts", ( response ) => {
      let data = JSON.parse(response);
      this.products = data;
    });
},
  methods: {
    productAddToCart: function(product) {
      this.cart = [product]
    }
    },
}
</script>