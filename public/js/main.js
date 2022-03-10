
function productAdded(){

    let productName= $("#product_name").val(),
        productDetails= $("#product_details").val();

    axios.post('/store-product-details', {
        product_name: productName,
        product_details: productDetails
    })
    .then((res) =>{
        if (res.data.status === 'success') {
            clearAllProducts();
            fetchAllProducts();
        } else {
            alert("UNEXPECTED ERROR");
        }
    })
    .catch((err)=> console.log(err))
}

function fetchAllProducts(){
    let tableData ="";    
    axios.get('/get-product-details')
    .then(res =>{
        if(res.data.data.length>0){
            res.data.data.forEach(product =>{
                tableData += `<tr>
                               <td>${product.product_name}</td>
                               <td>${product.product_details}</td>
                               <td><button class="btn btn-sm btn-success" onclick="editProduct(${product.id})">Edit</button>
                               <button class="btn btn-sm btn-danger" onclick="deleteProduct(${product.id})">Delete</button></td>
                            </tr>`
            })
        }
        else{
            tableData += `<tr>
                             <td colspan="2" class="text-center">No Products Found</td>
                        </tr>`
        }
        $("#tableDetails tbody").html(tableData);

    })
    .catch(err =>{
        console.log(err);
    }) 
}

function clearAllProducts(){
    $("#product_name").val("");
    $("#product_details").val("");
}

function deleteProduct(id){
    axios.post('/delete-product', {id})
    .then((res) =>{
        fetchAllProducts();
    })
    .catch((err)=> console.log(err))

}


function editProduct(id){
    axios.post('/edit-product-details', {id})
    .then((res) =>{
        $("#hidden_product_id").val(res.data.data.id);
        $("#edit_product_name").val(res.data.data.product_name);
        $("#edit_product_details").val(res.data.data.product_details);
        $("#edit_product_modal").modal("show");
    })
    .catch((err)=> console.log(err));
}


function updateDetails(){
    let productName= $("#edit_product_name").val(),
        productDetails= $("#edit_product_details").val();
        productID= $("#hidden_product_id").val();

    axios.post('/update-product-details', {productName, productDetails, productID})
    .then((res) =>{
        fetchAllProducts();
        $("#edit_product_modal").modal("hide");
    })
    .catch((err)=> console.log(err));
}

function closeModal(){
    $("#edit_product_modal").modal("hide");
}