function showCart(cart){
    $('#cart .modal-body').html(cart);
    $('#cart').modal();
}
function getCard(){
    $.ajax({
        url: base_url+'cart/show',
        method: 'GET',
        success: function (data) {
            if(!data){
                alert('errorner!');
            }
            showCart(data);
        },
        error: function () {
            alert('Error!');
        }
    });
    return false;
}
function clearCart(){
    $.ajax({
        url: base_url+'cart/clear',
        method: 'GET',
        success: function (data) {
            if(!data){
                alert('errorner!');
            }
            showCart(data);
        },
        error: function () {
            alert('Error!');
        }
    });
}
$('.add').on('click',function (e) {
    e.preventDefault();
    var id=$(this).data('id');
    $.ajax({
        url: base_url+'cart/add',
        method: 'GET',
        data: {
            id: id,
        },
        success: function (data) {
            if(!data){
                alert('errorner!');
            }
            showCart(data);
        },
        error: function () {
            alert('Error!');
        }
    });

});
$('#cart .modal-body').on('click','.del-item',function () {
     var id=$(this).data('id');
    $.ajax({
        url: base_url+'cart/del-item',
        method: 'GET',
        data: {
            id: id,
        },
        success: function (data) {
            if(!data){
                alert('errorner!');
            }
            showCart(data);
        },
        error: function () {
            alert('Error!');
        }
    });
});
$('#filter-products').on('click',function () {
 var data=$('.filter-list__item form').serialize();

 $.ajax({
    url: base_url+'product/search',
     method: 'POST',
     data:{
        data: data,

     },
     success: function (data) {
         $('#kod-pr-catalog').html(data);
     },
     error: function () {
         alert('error!');
     }
 });
});
