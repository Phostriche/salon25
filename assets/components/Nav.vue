<script setup lang="ts">
import { computed } from 'vue'
import Search from './Search.vue'
import { useCartStore } from '../store/cart.ts'

const cartStore = useCartStore()

const count = computed(() => cartStore.count)
</script>

<template>
 
  <div class="navbar mb-2 shadow-lg bg-neutral text-neutral-content">
    <div class="flex-none lg:hidden">
     
    </div>
    <div class="flex-none px-2 mx-2">
      <span class="text-lg font-bold">
        Shopping Cart</span>
    </div>
    <div class="flex-1 px-2 mx-2">
      <div class="items-stretch hidden lg:flex">
        <router-link class="btn btn-ghost btn-sm rounded-btn" to="/">
          Home
        </router-link>
        <router-link class="btn btn-ghost btn-sm rounded-btn" to="/cart">
          Cart
          <div class="badge ml-2 badge-outline" v-text="count" />
        </router-link>
      </div>
    </div>
    <div class="flex-1 lg:flex-none">
      <Search />
    </div>
  </div>
</template>
