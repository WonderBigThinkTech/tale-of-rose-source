
export default function changeqQuantity() {

  const plusButton = document.querySelectorAll('.cart-items__item-plus')
  const minusButton = document.querySelectorAll('.cart-items__item-minus')
  const quantityBox = document.querySelectorAll('.cart-items__item-quantity')
  const prices = document.querySelectorAll('.product-money')
  const total = document.querySelector('.subtotal-money')
  
let totalPrice = parseFloat(total.innerHTML)
let subTotal = 0
  for (let i = 0; i < plusButton.length; i++) {  
    
    
    const singlePrice =  parseFloat(prices[i].innerHTML) 
  plusButton[i].addEventListener('click', (e) => {    
       
    e.preventDefault();
    const currentQuantity = parseInt( quantityBox[i].value)  
     quantityBox[i].value = currentQuantity + 1
    if(  quantityBox[i].value > 1) {     
      minusButton[i].disabled = false
    } else {
      minusButton[i].disabled = true
    }       
    prices[i].innerHTML = parseFloat(singlePrice *  quantityBox[i].value).toFixed(2)
    totalPrice += singlePrice
    total.innerHTML = totalPrice.toFixed(2)
  })

  minusButton[i].addEventListener('click', (e) => {
    e.preventDefault();
    const currentQuantity = parseInt( quantityBox[i].value)
    if (currentQuantity > 1) {
       quantityBox[i].value = currentQuantity - 1
      minusButton[i].disabled = false
    } else {
      minusButton[i].disabled = true
    }
    
    prices[i].innerHTML = parseFloat(singlePrice *  quantityBox[i].value).toFixed(2)    
    totalPrice -= singlePrice
    total.innerHTML = totalPrice.toFixed(2)
   
  })

  quantityBox[i].addEventListener('change', (e) => {     
    const currentQuantity = parseInt( quantityBox[i].value)
    if (currentQuantity >= 1) {
      prices[i].innerHTML = parseFloat(singlePrice *  quantityBox[i].value).toFixed(2)  
      
      for(let x = 0; x < quantityBox.length; x ++)  {
        let sub = parseFloat(prices[x].innerHTML)        
        subTotal += sub 
              
      }       
   
    total.innerHTML = subTotal
    subTotal = 0.00
    } 
  })
}
}