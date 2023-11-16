<script setup lang="ts">
import { computed } from 'vue'
import CartCard from '../components/CartCard.vue'
import { toCurrency } from '../shared/utils'
import { useCartStore } from '../store/cart'
import { useProduitStore } from '../store/produits'
import CartCardSkeleton from '../components/CartCardSkeleton.vue'

const cartStore = useCartStore()

const produitStore = useProduitStore()

const formattedCart = computed(() => cartStore.formattedCart)
</script>

<template>
  
  <div class="p-4 max-w-4xl mx-auto">
    <div v-if="!produitStore.loaded" class="space-y-4">
  
      <CartCardSkeleton v-for="n in 15" :key="n" />
    </div>
    <div v-else-if="!formattedCart.length">
      <h1 class="text-xl">
        Cart is empty.
      </h1>
    </div>
    <div v-else class="space-y-4">
      <CartCard
        v-for="(cartProduit, index) in formattedCart"
        :key="index"
        :cart-produit="cartProduit"
      />
      <div class="text-right text-2xl md:text-4xl">
        Total: {{ toCurrency(cartStore.total) }}
      </div>
    </div>
  </div>
</template>
