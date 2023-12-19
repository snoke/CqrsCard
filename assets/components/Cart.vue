<template>
  <div id="cart">
    <ul>
      <li v-for="product in products" :key="product.id" class="product">
        <div class="name">{{ product.name }}</div>
        <div class="price">price: {{ product.price }}€</div>
        <div class="buttons">
          <button type="button" class="btn btn-outline-secondary" @click="cartIncreaseProduct">+</button>
          <button type="button" class="btn btn-outline-secondary" @click="cartDecreaseProduct">-</button>
          <button type="button" class="btn btn-outline-secondary" @click="cartRemoveProduct">remove</button>
        </div>
      </li>
    </ul>
    <div class="checkout">
      <button type="button" class="btn btn-outline-primary" @click="cartSave">save</button>
    </div>
  </div>
</template>


<script>
import axios from 'axios'

export default {
  data: function () {
    return {
      products: [
        {id: 1, name: 'test', price: 2.25}
      ],
    }
  },
  methods: {
    command: function (command, params) {
      axios.post('/' + command, params)
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
    cartIncreaseProduct: function (productId) {
      axios.post('/' + 'cartIncreaseProduct', {
        productId: productId,
      })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
    cartDecreaseProduct: function (productId) {
      axios.post('/' + 'cartDecreaseProduct', {
        productId: productId,
      })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
    cartRemoveProduct: function (productId) {
      axios.post('/' + 'cartRemoveProduct', {
        productId: productId,
      })
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
    cartSave: function () {
      axios.post('/' + 'cartSave', {})
          .then(function (response) {
            console.log(response);
          })
          .catch(function (error) {
            console.log(error);
          });
    },
  },
  mounted: function () {
  },
  updated: function () {
  }
}
</script>