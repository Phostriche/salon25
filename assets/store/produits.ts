import { defineStore } from 'pinia'

const storeUrl = 'https://localhost:8000/api'

export interface Produit {
  id: number
  codeBarre:string
  nom: string
  typeA: string
  ligne: string
  sousFamille: string
  cond: string
  prixAchat: number
  prixVente: number
  stock: number
  
}

interface ProduitState {
  items: Record<string, Produit>
  ids: number[]
}

export const useProduitStore = defineStore({
  id: 'produits',

  state: (): ProduitState => ({
    items: {},
    ids: [],
  }),

  getters: {
    list(): Produit[] {
      return this.ids.map(i => this.items[i])
    },

    loaded(): boolean {
      return this.ids.length > 0
    },
  },

  actions: {
    async fetchAll() {
      if (this.loaded)
        return

      const res = await fetch(`${storeUrl}/produits.json`)
      const data: Produit[] = await res.json()
      this.ids = data.map((produit) => {
        this.items[produit.id] = produit
        return produit.id

      })
    },
   
  },
}
)

