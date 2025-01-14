function handleOffSearch(){
    if ($('.search').hasClass('active')) {
        $('.search').removeClass('active');
        $(".search").css({
            'opacity': '0',
            'width': '0px',
        });
    } else {
        $('.search').addClass('active');
        $(".search").css({
            'opacity': '1',
            'width': '300px',
        });
    }
    return false;
}
function handleOffMenu(){
    if ($('.showmnrp .overlay-backdrop').hasClass('active')) {
        $('.showmnrp .overlay-backdrop').removeClass('active');
        $("#responsive-menu").css({
            'transform': 'translateX(0px)'
        });
        $("body").css({
            "overflow-x": "auto"
        });
    } else {
        $('.showmnrp .overlay-backdrop').addClass('active');
        $("body").css({
            "overflow-x": "hidden"
        });
        $("#responsive-menu").css({
            'transition': 'all 0.7s ease-in-out',
            'transform': 'translateX(300px)'
        });
    }
    return false;
}
function modalNotify(text)
{
    $("#popup-notify").find(".modal-body").html(text);
    $('#popup-notify').modal('show');
}

function ValidationFormSelf(ele)
{
    if(ele)
    {
        $("."+ele).find("input[type=submit]").removeAttr("disabled");
        var forms = document.getElementsByClassName(ele);
        var validation = Array.prototype.filter.call(forms,function(form){
            form.addEventListener('submit', function(event){
                if(form.checkValidity() === false)
                {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }
}

function loadPagingAjax(url='',eShow='')
{
    if($(eShow).length && url)
    {
        $.ajax({
            url: url,
            type: "GET",
            data: {
                eShow: eShow
            },
            success: function(result){
                $(eShow).html(result);
                Hcode.WowAnimation();
            }
        });
    }
}

function loadPagingAjaxSlick(url = '', eShow = '') {
    if ($(eShow).length && url) {
        $.ajax({
            url: url,
            type: "GET",
            data: {
                eShow: eShow
            },
            success: function (result) {
                $('.slick-ajaxslick').slick('unslick');
                $(eShow).html(result);
                Hcode.slickajaxslick();
            }
        });
    }
}


function doEnter(event,obj)
{
    if(event.keyCode == 13 || event.which == 13) onSearch(obj);
}

function onSearch(obj) 
{           
    var keyword = $("#"+obj).val();
    
    if(keyword=='')
    {
        modalNotify(LANG['no_keywords']);
        return false;
    }
    else
    {
        location.href = "tim-kiem?keyword="+encodeURI(keyword);
        loadPage(document.location);            
    }
}

function goToByScroll(id)
{
    var offsetMenu = 0;
    id = id.replace("#", "");
    if($(".menu").length) offsetMenu = $(".menu").height();
    $('html,body').animate({
        scrollTop: $("#" + id).offset().top - (offsetMenu * 2)
    }, 'slow');
}

function update_cart(id=0,code='',quantity=1)
{
    if(id)
    {
        var ship = $(".price-ship").val();

        $.ajax({
            type: "POST",
            url: "ajax/ajax_cart.php",
            dataType: 'json',
            data: {cmd:'update-cart',id:id,code:code,quantity:quantity,ship:ship},
            success: function(result){
                if(result)
                {
                    $('.load-price-'+code).html(result.gia);
                    $('.load-price-new-'+code).html(result.giamoi);
                    $('.price-temp').val(result.temp);
                    $('.giasp-'+code).html(result.giasp);
                    $('.load-price-temp').html(result.tempText);
                    $('.pay_cart_price-'+code).html(result.giamoi);
                    $('.price-total').val(result.total);
                    $('.load-price-total').html(result.totalText);
                }
            }
        });
    }
}

function load_district(id=0)
{
    $.ajax({
        type: 'post',
        url: 'ajax/ajax_district.php',
        data: {id_city:id},
        success: function(result){
            $(".select-district").html(result);
            $(".select-wards").html('<option value="">'+LANG['wards']+'</option>');
        }
    });
}

function load_wards(id=0)
{
    $.ajax({
        type: 'post',
        url: 'ajax/ajax_wards.php',
        data: {id_district:id},
        success: function(result){
            $(".select-wards").html(result);
        }
    });
}

function load_ship(id=0)
{
    if(SHIP_CART)
    {
        $.ajax({
            type: "POST",
            url: "ajax/ajax_cart.php",
            dataType: 'json',
            data: {cmd:'ship-cart',id:id},
            success: function(result){
                if(result)
                {
                    $('.load-price-ship').html(result.shipText);
                    $('.load-price-total').html(result.totalText);
                    $('.price-ship').val(result.ship);
                    $('.price-total').val(result.total);
                }   
            }
        }); 
    }
}