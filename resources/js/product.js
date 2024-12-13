

import axios from "axios";
import DOMPurify from "dompurify";
import { useState } from 'react'

export default function getProduct() {
  const select = document.getElementById('filter-by');
  const inStock = document.getElementById('inStock');
    const outStock = document.getElementById('outStock');
    const contentArea = document.getElementById('collection-page-content');
        
    select.addEventListener('change', async function() {
            const link = `${window.location.origin}/collections/${select.value}/raw`; 
            await axios.get(link).then((response)=> {
               
                contentArea.innerHTML = DOMPurify.sanitize(
                response.data.theHTML
                );
              })            
    });
    
   
    let inStockProduct = "" ;
    let outStockProduct = "";
    inStock.addEventListener('change', async function(e) {
        if(e.currentTarget.checked) {
            const link = `${window.location.origin}/collections/inStock/raw`;         
            await axios.get(link).then((response)=> {               
                inStockProduct = response.data.theHTML;                
                contentArea.innerHTML = DOMPurify.sanitize(
                    inStockProduct.concat(outStockProduct)
                );
                
                
              })
        } else {
           inStockProduct = ""               
                contentArea.innerHTML = DOMPurify.sanitize(
                    inStockProduct.concat(outStockProduct)
                );
           
        }
        
    });

    outStock.addEventListener('change', async function(e) {
        if(e.currentTarget.checked) {
            const link = `${window.location.origin}/collections/outStock/raw`;         
            await axios.get(link).then((response)=> {               
                outStockProduct = response.data.theHTML                
                contentArea.innerHTML = DOMPurify.sanitize(
                    outStockProduct.concat(inStockProduct)
                );
              })
        } else {
           outStockProduct = ""
           contentArea.innerHTML = DOMPurify.sanitize(
                    outStockProduct.concat(inStockProduct)
                );
        }        
    });

    const colorBox = document.querySelectorAll('#colorBox');
   
    colorBox.forEach((color)=> {
      color.addEventListener('change', async function() {          
       const link = `${window.location.origin}/collections/color/${color.value}/raw`;         
       await axios.get(link).then((response)=> {               
                contentArea.innerHTML = DOMPurify.sanitize(
                response.data.theHTML
                );
              })
    })
    })

    const applyButton = document.getElementById('applyPrice');
    applyButton.addEventListener('click', async function() {
       const minPrice = document.getElementById('minPrice').value;
       const maxPrice = document.getElementById('maxPrice').value;
        const link = `${window.location.origin}/collections/price/${minPrice}-${maxPrice}/raw`;         
            await axios.get(link).then((response)=> { 
                contentArea.innerHTML = DOMPurify.sanitize(
                    response.data.theHTML
                );
              })
    })


}


