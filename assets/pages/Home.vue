<script setup lang="ts">
import { computed } from 'vue';
import ProductCard from '../components/ProductCard.vue'
import ProductCardSkeleton from '../components/ProductCardSkeleton.vue'
import { useProduitStore } from '../store/produits'

const produitStore = useProduitStore()

const produits = computed(() => produitStore.list)

</script>

<template>
<b-container class="bv-example-row">
  <b-row>
    <b-col>produits  <ProductCardSkeleton
        v-for="n in 15"
        v-show="!produitStore.loaded"
        :key="n"
      /></b-col>
    <b-col>2 of 3</b-col>
    <b-col>3 of 3</b-col>
  </b-row>
</b-container>
  <div >
    <div >
      <ProductCardSkeleton
        v-for="n in 15"
        v-show="!produitStore.loaded"
        :key="n"
      />
      <ProductCard
        v-for="produit in produits"
        :key="produit.id"
        :produit="produit"
      
      />
      
    </div>
  </div>
</template>
