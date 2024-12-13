import './bootstrap';
import getProduct from './product';
import updateCart from './cart';
import handlePaypal from './paypal';
import changeqQuantity from './quantityButton';
import handleModal from './modal';
import handleLogout from './logoutButton';
import handleDelete from './deleteButton';
import handleChangePass from './changePassButton';
import editType from './editType';
import deleteType from './deleteType';
import createType from './createType';
import createShape from './createShape';
import editShape from './editShape';
import deleteShape from './deleteShape';  
import createSize from './createSize';
import editSize from './editSize';
import deleteSize from './deleteSize';
import createMaterial from './createMaterial';
import editMaterial from './editMaterial';  
import deleteMaterial from './deleteMaterial';
import deleteEvent from './deleteEvent';
import deleteColor from './deleteColor';
import imageChangeWhenUpload from './imageChangeWhenIpload';
import imageChangeWhenUploadMultiple from './imageChangeWhenUploadMultiple';
import deleteFaq from './deleteFaq';
import deleteReview from './deleteReview'; 
import deleteHighlight from './deleteHighlight';
import deleteFeature from './deleteFeature';
import deleteDiscount from './deleteDiscount';
import setStandardCost from './setStandardCost';
import setExpressCost from './setExpressCost';
import editCost from './editCost';
import applyDiscount from './applyDiscountButton';
import deleteFont from './deleteFont';
import deleteInk from './deleteInk';  
import openCartInProduct from './cart-in-product';

if(document.getElementById("edit-image") ) {
  imageChangeWhenUpload();
}

if(document.querySelector(".cost-edit-button") ) {
  editCost();
}

if(document.getElementById('applyDiscountButton')) {
  applyDiscount();
}

if(document.getElementById("display-multiple-image") ) {
  imageChangeWhenUploadMultiple();
}

if(document.getElementById("set-standard-cost") ) {
  setStandardCost();
}

if(document.getElementById("set-express-cost") ) {
  setExpressCost();
}


if(document.querySelector('.changePass-modal') ) {
  handleChangePass();
}

if(document.querySelector('.edit-type-modal') ) {
  editType();
}

if(document.querySelector('.create-type-modal') ) {
  createType();
}

if(document.querySelector('.delete-type-modal') ) {
  deleteType();
}

if(document.querySelector('.delete-ink-modal') ) {
  deleteInk();
}

if(document.querySelector('.delete-font-modal') ) {
  deleteFont();
}

if(document.querySelector('.delete-faq-modal') ) {
  deleteFaq();
}

//shape
if(document.querySelector('.edit-shape-modal') ) {
  editShape();
}

if(document.querySelector('.create-shape-modal') ) {
  createShape();
}

if(document.querySelector('.delete-shape-modal') ) {
  deleteShape();
}

if(document.querySelector('.delete-discount-modal') ) {
  deleteDiscount();
}

if(document.querySelector('.delete-feature-modal') ) {
  deleteFeature();
}

if(document.querySelector('.delete-review-modal') ) {
  deleteReview();
}

if(document.querySelector('.delete-highlight-modal') ) {
  deleteHighlight();
}

//size
if(document.querySelector('.edit-size-modal') ) {
  editSize();
}

if(document.querySelector('.create-size-modal') ) {
  createSize();
}

if(document.querySelector('.delete-size-modal') ) {
  deleteSize();
}

//material
if(document.querySelector('.edit-material-modal') ) {
  editMaterial();
}

if(document.querySelector('.create-material-modal') ) {
  createMaterial();
}

if(document.querySelector('.delete-material-modal') ) {
  deleteMaterial();
}

//event
if(document.querySelector('.delete-event-modal') ) {
  deleteEvent();
}

//color
if(document.querySelector('.delete-color-modal') ) {
  deleteColor();
}

if(document.querySelector('#logout-modal') ) {
  handleLogout();
}

if(document.querySelector('.delete-modal') ) {
  handleDelete();
}


if(document.querySelector('#filter-by')) { 
  getProduct();
}

if(document.querySelector('#print_text_preview')) {
  // alert("PRODUCT")
//  updateCart(); 
  handleModal();
}

if(document.querySelector('#shopify-section-cart-drawer')) {
  openCartInProduct();
}

if(document.querySelector('#paypalnj')) { 
  handlePaypal();
}

if(document.querySelector('#shopify-section-cart-drawer') ) {
  changeqQuantity();
}






