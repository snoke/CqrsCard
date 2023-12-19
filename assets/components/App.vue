<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
  <div id="app">

    <div id="products">products
      <ul>
        <li v-for="product in products" :key="product.id" class="product">
          <div class="name">{{ product.name }}</div>
          <div class="price">price: {{ product.price }}€</div>
          <div class="add-to-cart">
            <button type="button" class="btn btn-outline-primary" @click="$parent.productAddToCart(product)">add to cart
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
      card: []
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
    },
}
</script>