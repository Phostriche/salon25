<script setup lang="ts">
import { computed, ref } from 'vue'
import { useRouter } from 'vue-router'
import { useProduitStore } from '../store/produits'


const productStore = useProduitStore()
const router = useRouter()
const input = ref('')

const searchResults = computed(() => {
  if (!input.value || input.value.length < 2)
    return []

  return productStore.list.filter((item) => {
    return item.nom.toLowerCase().includes(input.value.toLowerCase())
  })
})

function navigate(id: number) {
  input.value = ''
  router.push(`/produit/${id}`)
}

</script>

<template>
  <div class="dropdown dropdown-end">
    <div class="form-control">
      <input v-model="input" type="text" placeholder="Search..." class="input input-ghost" :disabled="!productStore.loaded">
    </div>
    <ul class="shadow menu dropdown-content bg-base-100 rounded-box w-64 text-base-content overflow-y-scroll" style="max-height: 50vh;">
      <li v-for="produit in searchResults" :key="produit.id">
        <a href="#" @click.prevent="navigate(produit.id)" v-text="produit.nom" />
      </li>
    </ul>
  </div>
</template>
