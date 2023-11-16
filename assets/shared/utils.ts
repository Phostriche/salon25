const formatter = new Intl.NumberFormat('fr-CH', {
  style: 'currency',
  currency: 'CHF',
})

export const toCurrency = (value: number) => formatter.format(value)
