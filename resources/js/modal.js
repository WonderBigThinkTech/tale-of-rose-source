

export default function handleModal() {
  
  const closeButton = document.querySelector('.modal-close')
  const modal = document.querySelector('.modal-box')
  const modalBackground = document.querySelector('.modal-container')
  const chart = document.querySelector('.size-chart')
  const selectEl = document.querySelector('.size-chart-text')
  const options = document.querySelectorAll('#all-product-variants option');
  const elementsku = document.getElementById('modal-sku');

 
 
  chart.addEventListener('click', () => {
    modal.style.display = 'block' 
    modalBackground.style.display = 'flex' 
  })
 
  closeButton.addEventListener('click', () => {    
    modal.style.display = 'none'  
    modalBackground.style.display = "none" 
  })

  window.addEventListener('click', (event) => {
    if (event.target === modalBackground) {
      modal.style.display = 'none'
      modalBackground.style.display = "none"    
    }
  })

}