export const webCart = ({ webCart }) => webCart

export const webCartSubtotalPrice = ({ webCart, webCartItems }) => {
  let total = 0
  webCart.forEach((cartItem) => {
    let inventory = webCartItems.find((i) => i.itemId === cartItem.itemId)

    if (inventory) {
      total += inventory.price * cartItem.quantity
    }
  })

  return total
}

export const webCartTotalPrice = ({ webCart, webCartItems }) => {
  let total = 0
  webCart.forEach((cartItem) => {
    let inventory = webCartItems.find((i) => i.itemId === cartItem.itemId)

    if (inventory) {
      let price = inventory.promotion.flag ? inventory.promotion.price : inventory.price
      total += price * cartItem.quantity
    }
  })

  return total
}

export const webCartTotalDiscount = ({ webCart, webCartItems }) => {
  let total = 0
  webCart.forEach((cartItem) => {
    let inventory = webCartItems.find((i) => i.itemId === cartItem.itemId)

    if (inventory) {
      let price = inventory.promotion.flag ? inventory.price - inventory.promotion.price : 0
      total += price * cartItem.quantity
    }
  })

  return total
}

export const webCartTotalQuantity = ({ webCart }) => {
  let quantity = 0
  webCart.forEach((item) => {
    quantity += item.quantity
  })

  return quantity
}

export const webCartItems = ({ webCart, webCartItems }) => {
  let items = []

  webCart.forEach((cartItem) => {
    let inventory = webCartItems.find((i) => i.itemId === cartItem.itemId)

    if (inventory) {
      let price = inventory.promotion.flag ? inventory.promotion.price : inventory.price
      let beforePrice = inventory.promotion.flag ? inventory.price : 0

      items.push({
        id: inventory.itemId,
        name: inventory.name,
        slug: inventory.slug,
        imageUrl: inventory.imageUrl,
        price: price,
        beforePrice: beforePrice,
        stock: inventory.stock,
        subTotal: price * cartItem.quantity,
        ...cartItem
      })
    }
  })

  return items
}
