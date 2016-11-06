$('.prod_name').click(function(){
    var prod_id = $(this).parent().prev().text();
    $.get(
        'modal.php',
        {prod_id:prod_id},
        function(result){
            $('#myModal').html(result);

        })
})
$('.prod_del').click(function(){
    var prod_id = $(this).attr('id');
        $.post(
            'del_prod.php',
            {prod_id:prod_id},
            function(result) {
                $('#myModal').html(result);
            }
        )
})
$('.product_name,.product_desc').blur(function(){
    var name = $(this).val();
    if(name.match(/[0-9]/)) {
       $(this).css('border-color','red');
        $('.adding_product').attr('disabled','disabled');
        $(this).parent().find('.name_warning').css('display','block');
    } else {
        $(this).css('border-color','initial');
        $('.adding_product').attr('disabled',false);
        $(this).parent().find('.name_warning').css('display','none');
    }
})

$('.product_price,.product_qty').blur(function(){
    var check = $(this).val();
    if(check.match(/[a-z]/)) {
        $(this).css('border-color','red')
        $('.adding_product').attr('disabled','disabled');
        $(this).parent().find('.number_warning').css('display','block');
    } else {
        $(this).css('border-color','initial');
        $('.adding_product').attr('disabled',false);
        $(this).parent().find('.number_warning').css('display','none');
    }
})

$(document).on('click', '.deleting_product', function(e) {
    e.stopPropagation();
    $('.status').html('asdasdasdasdas');
    var confirmed_id = $(this).attr('id');
    $.post(
        'del_prod.php',
        {confirmed_id:confirmed_id},
        function()
        {
          location.reload();
        }
    )
})
$('.form-control').datepicker();