<!-- Author: Stefan Sander <mail@stefan-sander.online> -->
<template>
    <div id="products-list">
      <ul>
        <li v-for="product in products" :key="product.id">
          <div class="product-name">{{product.name}}</div>
          <div class="product-price">price: {{product.price}}€</div>
          <div class="product-add-to-cart">
            <button type="button" class="btn btn-outline-secondary">add to cart</button>
          </div>
        </li>
      </ul>
    </div>
</template>


<script>
export default {
  name: 'App',
  data: function() {
    return {
      products: [
        { id: 1, name: 'test', price:2.25}
      ],
    }
  },
  methods: {
  },
  mounted: function() {
  },
  updated: function() {
  }
}
</script>