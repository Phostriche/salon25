<script setup>
import { ref, onMounted} from 'vue'
import axios from 'axios'

let data = ref([])
  
 onMounted(async () => {
  const response = await axios.get('/api/produits.json')
  data.value = response.data}
  )
  </script>

  <template>
  <p>dddd</p>
  <ul>
    <li v-for="dat in data" :key="dat.id" > {{ dat.nom }}</li>
    </ul>
    {{ data
     }}
  </template> 
