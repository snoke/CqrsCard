<template>
  <div id="cart">
    <ul>
      <li v-for="product in products" :key="product.id" class="product">
        <div class="name">{{product.name}}</div>
        <div class="price">price: {{product.price}}€</div>
      </li>
    </ul>
    <div class="checkout">
      <button type="button" class="btn btn-outline-primary" @click="checkout">checkout</button>
    </div>
  </div>
</template>


<script>
export default {
  data: function() {
    return {
      products: [
        { id: 1, name: 'test', price:2.25}
      ],
    }
  },
  methods: {
    checkoutCart: function() {
      alert('checkout');
    }
  },
  mounted: function() {
  },
  updated: function() {
  }
}
</script>