<script setup lang="ts">
import { useCartStore } from '../store/cart'
import type { CartPreview } from '../store/cart'
import { toCurrency } from '../shared/utils'

defineProps<{
  cartProduit: CartPreview
}>()

const cartStore = useCartStore()
</script>

<template>
  <div class="card md:card-side bordered">
   
    <div class="card-body">
      <h2 class="card-title">
        <router-link class="link link-hover" :to="`/produit/${cartProduit.id}`">
          {{ cartProduit.nom}}
        </router-link>
      </h2>
      <p>{{ toCurrency(cartProduit.prixVente) }}</p>
      <div class="card-actions">
        <div class="btn-group">
          <button class="btn btn-primary" @click="cartStore.remove(cartProduit.id)">
            -
          </button>
          <button class="btn btn-ghost no-animation">
            {{ cartProduit.quantity }}
          </button>
          <button class="btn btn-primary" @click="cartStore.add(cartProduit.id)">
            +
          </button>
        </div>
      </div>
    </div>
  </div>
</template>
