<template>
  <div id="products">
    <ul>
      <li v-for="product in products" :key="product.id" class="product">
        <div class="name">{{ product.name }}</div>
        <div class="price">price: {{ product.price }}€</div>
        <div class="add-to-cart">
          <button type="button" class="btn btn-outline-primary" @click="productAddToCart(product.id)">add to cart
          </button>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios'

export default {
  data: function () {
    return {
      products: [
      ],
    }
  },

  methods: {
    appGetProducts: function(productId) {
      axios.get('/appGetProducts')
          .then(function (response) {
            console.log("hi")
          })
          .catch(function (error) {
            console.log("hi2")
            console.log(error);
          });
    },
    productAddToCart: function (productId) {
      axios.post('/' + 'addToCart', {
        productId: productId,
      })
    }
  },

  mounted: function() {
    this.appGetProducts()
  },
  updated: function () {
  }
}
</script>