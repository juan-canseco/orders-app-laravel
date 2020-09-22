
'use strict';


var Cart = (function(){
    
    let cartBody = document.getElementById('cart-body');
    let totalLabel = document.getElementById('total-label');
    let quantityLabel = document.getElementById('quantity-label');


    
    const formatMoney = function (amount, decimalCount = 2, decimal = ".", thousands = ",") {
        try {
          decimalCount = Math.abs(decimalCount);
          decimalCount = isNaN(decimalCount) ? 2 : decimalCount;

          const negativeSign = amount < 0 ? "-" : "";

          let i = parseInt(amount = Math.abs(Number(amount) || 0).toFixed(decimalCount)).toString();
          let j = (i.length > 3) ? i.length % 3 : 0;

          return negativeSign + (j ? i.substr(0, j) + thousands : '') + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousands) + (decimalCount ? decimal + Math.abs(amount - i).toFixed(decimalCount).slice(2) : "");
        } catch (e) {
          console.log(e)
        }
      };

    const rowTemplate = product => {
        return `
        <tr>
        <td> ${product.id} </td>
        <td> ${product.name} </td>
        <td> $${formatMoney(product.price)} </td>
        <td> ${product.quantity} </td>
        <td> $${formatMoney(product.total)} </td>
        <td>

       <a href="#" class="btn btn-warning btn-circle" data-toggle="modal" data-target="#change-quantity-modal" data-id="${product.id}" data-quantity="${product.quantity}">
        <i class="fas fa-edit"></i>
       </a>

        <a href="#" data-id="${product.id}" data-toggle="modal" data-target="#confirm-delete-modal" class="btn btn-danger btn-circle">
            <i class="fas fa-trash"></i>
        </a>

        </td>
        </tr>`;
    }
    
    const getCart = async() => {
        let response = await fetch('/orders/getCartProducts', {
            method: 'GET'
        });
        return await response.json();
    };

    const reloadCart = async () => {
        let response = await getCart();
        let products = response.products;
        let rows = [];
        products.forEach(async function(product) {
            rows.push(rowTemplate(product));
        });
        cartBody.innerHTML = rows.join('');
        quantityLabel.innerText = response.quantity;
        totalLabel.innerText = `$${formatMoney(response.total)}`;
    };

    return {
        reloadCart: reloadCart
    };
})();


var AddCartProduct = (function() {
    
    var form = document.getElementById('add-product-form');
    var productSelect = document.getElementById('selected-product');
    var quantityInput = document.getElementById('product-quantity');

    const clearInputs = () => {
        quantityInput.value = "0";
        productSelect.selectedIndex = 0;
    };

    const addProductToCart = async function () {

        let formData = new FormData(form);

        let selectedProductId = formData.get('productId');
        let quantity = Number(formData.get('quantity'));

        if (selectedProductId == "-1" || quantity <= 0 || isNaN(quantity)) {
            return;
        }

        let response = await fetch('/orders/addProductToCart', {
            method:'POST',
            body: formData
        });

        if (response.ok) {
            await Cart.reloadCart();
            clearInputs();
        }
    };


    const init = () => {
        form.onsubmit = async (e) => {
            e.preventDefault();
            await addProductToCart();
        };
    };

    return {
        init : init,
        addProduct : addProductToCart
    }

})();



var RemoveCartProduct = (function() {

    var selectedProductId;

    const removeProduct = async (e) => {

        let response = await fetch(`/orders/removeProductFromCart/${selectedProductId}`, {
            method: 'GET'
        });

        if (response.ok) {
            await Cart.reloadCart();
        }
        else {
            alert('Hubo un error al quitar el producto, intentelo de nuevo');
        }
        $('#confirm-delete-modal').modal('hide');
    };

    const init = () => {   
        $('#confirm-delete-modal').on('show.bs.modal', function(e) {
            selectedProductId = e.relatedTarget.dataset['id'];
            let deleteButton = document.getElementsByClassName('delete-product')[0];
            deleteButton.onclick = removeProduct;
        })
    };

    return {
        init: init
    }
})();


var ChangeProductQuantity = (function() {
    
    var selectedProductId;
    var productQuantity;

    
    const submitChangeQuantity = async function (e) {

        let response = await fetch(`/orders/${selectedProductId}/changeProductQuantity/${productQuantity}`, {
            method:'GET'
        });

        if (response.ok) {
            await Cart.reloadCart();
        }
    
        else {
            alert('Hubo un error al cambiar la cantidad, intentelo de nuevo');
        }
        $('#change-quantity-modal').modal('hide');
    };
    
    let changeProductQuantity = (q) => {
        productQuantity = q;
    };

    const init = () => {
        $('#change-quantity-modal').on('show.bs.modal', function(e) {
            selectedProductId = e.relatedTarget.dataset['id'];
            let quantityInput = document.getElementById('quantity-input');
            quantityInput.value =  e.relatedTarget.dataset['quantity'];
            quantityInput.oninput = function(ev) {
                changeProductQuantity(quantityInput.value);
            };
            let changeButton  = document.getElementById('change-quantity-button'); 
            changeButton.onclick = submitChangeQuantity;
        });
    };

    return {
        init : init
    }
})();

var CartUtils = (function() {

    const init = () => {
        AddCartProduct.init();
        RemoveCartProduct.init();
        ChangeProductQuantity.init();
    };

    return {
        init : init
    }
})();

