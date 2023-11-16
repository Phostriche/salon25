<script setup>

import { ref, reactive } from 'vue';
const produits = ref([]);
const prestations = ref(['']);
const selected= ref([]);
const ticket = reactive([]);
var i = 0;

  fetch
('/api/produits.json')
  .then(response => response.json())
  .then(data => produits.value = data);
 




fetch
('/api/prestations.json')
    .then(response => response.json())
    .then(data => prestations.value = data);
    

    function mettreDansTicket(ligne) {
      
        ticket.push(ligne);
    
        
    }
    

   
 
</script>

<template>

<router-view></router-view>

 <select class="form-control" @change="mettreDansTicket(selected)" size="5"  v-model="selected">
    <option v-for="prestation in prestations"  :key="prestation.id"> {{ prestation.nom }}  {{ prestation.prix }}Fr</option>
 

  </select>
  
    <select class="form-control" @change="mettreDansTicket(selected)" size="5"  v-model="selected">
    <option v-for="produit in produits"  :key="produit.id" >{{ produit.nom }} {{ produit.prixVente }}Fr</option>
 

  </select>
 
   <div>Selected: {{ selected }}</div>
        <div>Ticket:{{ ticket }}</div>

 
  

<li v-for="prestation in prestations" :key="prestation.id">
  {{ prestation.nom }} {{ prestation.prix }}Fr
</li>
<li v-for="produit in produits" :key="produit.id" >{{ produit.nom }} {{ produit.prixVente }}Fr</li>
{{ prestations.nom }}
       
 {{  }}
  </template>
