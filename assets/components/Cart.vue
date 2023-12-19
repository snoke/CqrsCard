<template>
  <div id="cart">
    <ul>
      <li v-for="product in products" :key="product.id" class="product">
        <div class="name">{{product.name}}</div>
        <div class="price">price: {{product.price}}€</div>
        <div class="buttons">
          <button type="button" class="btn btn-outline-secondary" @click="cartIncreaseProduct">+</button>
          <button type="button" class="btn btn-outline-secondary" @click="cartDecreaseProduct">-</button>
          <button type="button" class="btn btn-outline-secondary" @click="cartRemoveProduct">remove</button>
        </div>
      </li>
    </ul>
    <div class="checkout">
      <button type="button" class="btn btn-outline-primary" @click="save">save</button>
    </div>
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
    command: function(command,params) {
      axios.post('/'+command,params)
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
        });
    },
    cartIncreaseProduct: function(productId) {
      this.command('cartIncreaseProduct', {
        productId: productId,
      })
    },
      cartDecreaseProduct: function(productId) {
        this.command('cartDecreaseProduct', {
          productId: productId,
        })
      },
        cartRemoveProduct: function(productId) {
      this.command('cartRemoveProduct', {
        productId: productId,
      })
    },
    save: function() {
      alert('save');
    }
  },
  mounted: function() {
  },
  updated: function() {
  }
}
</script>