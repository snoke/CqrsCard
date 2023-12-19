<template>
  <div id="products">
      <ul>
        <li v-for="product in products" :key="product.id" class="product">
          <div class="name">{{product.name}}</div>
          <div class="price">price: {{product.price}}€</div>
          <div class="add-to-cart">
            <button type="button" class="btn btn-outline-primary" @click="addToCart(product.id)">add to cart</button>
          </div>
        </li>
      </ul>
  </div>
</template>

<script>
import axios from 'axios'
export default {
  data: function() {
    return {
      products: [
        { id: 1, name: 'test', price:2.25}
      ],
    }
  },
  methods: {
    addToCart: function(productId) {
      axios.post('/user', {
        firstName: 'Fred',
        lastName: 'Flintstone'
      })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    }
  },
  mounted: function() {
  },
  updated: function() {
  }
}
</script>