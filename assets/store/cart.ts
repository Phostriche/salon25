import { defineStore } from 'pinia'
import { useProduitStore } from './produits'
import { CART_STORAGE } from '../composables/usePersistCart'

export interface Purchase {
  produitId: number
  quantity: number
}

interface CartState {
  contents: Record<string, Purchase>
}

export interface CartPreview {
  id: number
 nom: string
 prixVente: number
 quantity: number
}

export const useCartStore = defineStore({
  id: 'cart',

  state: (): CartState => ({
    contents: JSON.parse(localStorage.getItem(CART_STORAGE) as string) ?? {},
  }),

  getters: {
    count(): number {
      return Object.keys(this.contents).reduce((acc, id) => {
        return acc + this.contents[id].quantity
      }, 0)
    },

    total(): number {
      const produits = useProduitStore()
      return Object.keys(this.contents).reduce((acc, id) => {
        return acc + produits.items[id].prixVente * this.contents[id].quantity
      }, 0)
    },

    formattedCart(): CartPreview[] {
      const produits = useProduitStore()

      if (!produits.loaded)
     
        return []

      return Object.keys(this.contents).map((produitId) => {
        const purchase = this.contents[produitId]

        return {
          id: purchase.produitId,
         
          nom: produits.items[purchase.produitId].nom,
          quantity: purchase.quantity,
          prixVente: purchase.quantity * produits.items[purchase.produitId].prixVente,
        }
      })
    },
  },

  actions: {
    add(produitId: number) {
      if (this.contents[produitId]) {
        this.contents[produitId].quantity += 1
      }
      else {
        this.contents[produitId] = {
          produitId,
          quantity: 1,
        }
      }
    },
    remove(produitId: number) {
      if (!this.contents[produitId])
        return

      this.contents[produitId].quantity -= 1

      if (this.contents[produitId].quantity === 0)
        delete this.contents[produitId]
    },
  },
})
