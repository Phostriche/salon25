<script setup lang="ts">
import { useCartStore } from '../store/cart'
import type {Produit } from '../store/produits'
import { toCurrency } from '../shared/utils'

defineProps<{
  produit: Produit
}>()

const cartStore = useCartStore()

</script>

<template>
  <div class="card bordered ">
   
    <div class="card-body">
   
      <h2 class="card-title">
        <router-link class="link link-hover" :to="`/produit/${produit.id}`">
          {{ produit.nom }}
        </router-link>
      </h2>
      <p>{{ toCurrency(produit.prixVente) }}</p>
      <div class="justify-end card-actions">
        <button class="btn btn-primary" @click="cartStore.add(produit.id)">
          Add to Cart
        </button>
      </div>
    </div>
  </div>
</template>
