<script setup lang="ts">
import { computed } from 'vue'
import { useRoute } from 'vue-router'

import { useCartStore } from '../store/cart'
import { useProduitStore } from '../store/produits';
import type { Produit } from '../store/produits';
import { toCurrency } from '../shared/utils'


const cartStore = useCartStore()
const produitStore = useProduitStore()

const route = useRoute()

const produit = computed<Produit>(
  () => produitStore.items[route.params.produitId as string],
)
</script>

<template>
  <h1>coucouProduits</h1>
  <div class="p-4 max-w-4xl mx-auto">
    <div v-if="!produitStore.loaded">
      <CartCardSkeleton />
    </div>
    <div v-else-if="produit" class="card lg:card-side bordered">
    
      <div class="card-body">
        <h2 class="card-title" v-text="produit.nom" />
        <p v-text="produit.nom" />
        <p class="mt-4 text-lg">
          {{ toCurrency(produit.prixVente) }}
        </p>
        <div class="card-actions">
          <button class="btn btn-primary" @click="cartStore.add(produit.id)">
            Add to Cart
          </button>
        </div>
      </div>
    </div>
    <div v-else>
      <h1 class="text-xl text-error">
        No produit found with id {{ route.params.productId }}
      </h1>
    </div>
  </div>
</template>
