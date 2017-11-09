$(document).ready(function() {

  $('.catalogueBlock-select').each(function() {
    $(this).select2({
      minimumResultsForSearch: Infinity,
      dropdownParent: $(this).closest('.catalogueBlock-title'),
      width: '260',
    });

  });

  $('.catalogueBlock-select').on('select2:select', function (evt) {
    $('.catalogueBlock-title .select2-selection__rendered').paintFirstWord('#ec1e24');
  });

  (function($) {
    $.fn.paintFirstWord= function(color) {
      var str = this.text(),
          splited = str.split(' '),
          lastWord = splited[splited.length-2] + ' ' + splited[splited.length-1],
          replaced = str.split(lastWord).join('<span style = "color:' + color + '; font-weight: 700;">' + lastWord + '</span>');
      this.html(replaced);
    };
  })(jQuery);

  $('.catalogueBlock-title .select2-selection__rendered').paintFirstWord('#ec1e24');

  $('.popup').fancybox();

  $(".mainBlock-slider").owlCarousel({
    items: 1,
    dotsContainer: '.custom-owl-dots',
    loop: true,
    autoplay: true
  });

  $(".productShow-group[data-group='topSell'] .productShow-carousel").owlCarousel({
    items: 4,
    dotsContainer: '.custom-owl-dots-2',
    loop: false,
    autoplay: true,
    autoplayHoverPause: true,
    slideBy: 4
  });

  $(".productShow-group[data-group='new'] .productShow-carousel").owlCarousel({
    items: 4,
    dotsContainer: '.custom-owl-dots-3',
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    slideBy: 4
  });

  $(".productShow-group[data-group='action'] .productShow-carousel").owlCarousel({
    items: 4,
    dotsContainer: '.custom-owl-dots-4',
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    slideBy: 4
  });

  $(".reviewBlock-slider").owlCarousel({
    items: 3,
    dotsContainer: '.custom-owl-dots-5',
    loop: true,
    autoplay: true,
    autoplayHoverPause: true,
    slideBy: 3
  });

  // var customNavOwl = function(target) {
  //   // event.preventDefault();
  //
  //   if ($(this).hasClass('nextSlide')) {
  //     $(''+target+'').trigger('next.owl.carousel');
  //
  //     console.log('1');
  //   } else if ($(this).hasClass('prevSlide')) {
  //     $(''+target+'').trigger('prev.owl.carousel');
  //     console.log('2');
  //   }
  //
  //   console.log('+++');
  //   console.log($(this));
  //   console.log(event);
  //
  //   return false;
  // }

  // $('.mainBlock .navCarouselBtn').click(customNavOwl('.mainBlock-slider'));
  // $('.mainBlock .navCarouselBtn').click(this, customNavOwl('.mainBlock-slider'));

  $('.mainBlock .nextSlide').click(function(e) {
    e.preventDefault();

    $('.mainBlock-slider').trigger('next.owl.carousel');

    return false;
  })

  $('.mainBlock .prevSlide').click(function(e) {
    e.preventDefault();

    $('.mainBlock-slider').trigger('prev.owl.carousel');

    return false;
  })

  $('.productShow .nextSlide').click(function(e) {
    e.preventDefault();

    $('.productShow-group__active .productShow-carousel').trigger('next.owl.carousel');

    return false;
  })

  $('.productShow .prevSlide').click(function(e) {
    e.preventDefault();

    $('.productShow-group__active .productShow-carousel').trigger('prev.owl.carousel');

    return false;
  })

  $('.reviewBlock .nextSlide').click(function(e) {
    e.preventDefault();

    $('.reviewBlock .reviewBlock-slider').trigger('next.owl.carousel');

    return false;
  })

  $('.reviewBlock .prevSlide').click(function(e) {
    e.preventDefault();

    $('.reviewBlock .reviewBlock-slider').trigger('prev.owl.carousel');

    return false;
  })

  $('.scroll-pane').mCustomScrollbar({
    axis: "x",
    theme: "custom",
    autoDraggerLength: false
  });

  var dropFilter = function(e) {
    e.preventDefault();

    if ($(this).hasClass('filterBlock-dropBtn__active')) {
      $(this).removeClass('filterBlock-dropBtn__active');
    } else {
      $(this).parent().find('.filterBlock-dropBtn').removeClass('filterBlock-dropBtn__active');
      $(this).addClass('filterBlock-dropBtn__active');
    }


    return false;
  }

  var sortByCarBtn = function(e) {
    e.preventDefault();

    $(this).closest('.filterBlock-content').find('.filterBlock-prodWrap').removeClass('filterBlock-prodWrap__active');
    $(this).closest('.filterBlock-content').find('[data-filterBy="car"]').addClass('filterBlock-prodWrap__active');

    if ($(this).hasClass('filterBlock-searchByCar__aside')) {
      $(this).closest('.filterBlock-content').find('.filterBlock-backBtn__aside').removeClass('filterBlock-backBtn__active')
      $(this).addClass('filterBlock-searchByCar__active');
    }

    return false;
  }

  var sortByDefault = function(e) {
    e.preventDefault();

    $(this).closest('.filterBlock-content').find('.filterBlock-prodWrap').removeClass('filterBlock-prodWrap__active');
    $(this).closest('.filterBlock-content').find('[data-filterBy="default"]').addClass('filterBlock-prodWrap__active');

    if ($(this).hasClass('filterBlock-backBtn__aside')) {
      $(this).addClass('filterBlock-backBtn__active');
      $(this).closest('.filterBlock-content').find('.filterBlock-searchByCar').removeClass('filterBlock-searchByCar__active')
    }

    return false;
  }

  var prodSelectBtn = function(e) {
    e.preventDefault();

    var target = $(this).data("btnval");

    $(this).closest('.filterBlock').find('.navBtnGlobal').removeClass('navBtnGlobal__checked');
    $(this).addClass('navBtnGlobal__checked');

    $(this).closest('.filterBlock').find('.filterBlock-content').removeClass('filterBlock-content__active');
    $(this).closest('.filterBlock').find('[data-procuct='+target+']').addClass('filterBlock-content__active');

    return false;
  }

  var prodShowToggleTabs = function(e) {
    e.preventDefault();

    var btnTarget = $(this).data('btnTarget'),
        items = $(this).closest('.productShow').find('.productShow-group'),
        target = $(this).closest('.productShow').find('[data-group='+btnTarget+']');

    $(this).closest('.productShow-nav').find('.navBtnGlobal').removeClass('navBtnGlobal__checked');
    $(this).addClass('navBtnGlobal__checked');
    items.removeClass('productShow-group__active');
    target.addClass('productShow-group__active');

    return false;
  }

  $(".cartBlock-operator").on("click", function(e) {
e.preventDefault();
    var $button = $(this);
    var oldValue = $button.parent().find("input[type='number']").val();

    if ($button.hasClass('cartBlock-operator__plus')) {
      var newVal = parseFloat(oldValue) + 1;
    } else {
      if (oldValue > 1) {
        var newVal = parseFloat(oldValue) - 1;
      } else {
        newVal = 1;
      }
    }

    $button.parent().find("input[type='number']").val(newVal);

    updatecart($button.parent().find("input[type='number']"));

  });

  var showSelectedVal = function() {
    var currentVal = $(this).find('.filterBlock-selectCheck').val(),
        target = $(this).closest('.filterBlock-dropDown').prev('.filterBlock-dropBtn');

    target.find('.filterBlock-dropBtnVal').remove();
    target.append('<span class="filterBlock-dropBtnVal"> ('+ currentVal + ')</span>');
  }

  $('.filterBlock-selectItem').each(function(){
    if($(this).find('input').prop('checked')) {
      showSelectedVal.call(this);
    }
  });

  $('.filterBlock-selectItem').click(showSelectedVal);
  $('.filterBlock-dropBtn').click(dropFilter);
  $('.filterBlock-searchByCar').click(sortByCarBtn);
  $('.filterBlock-backBtn').click(sortByDefault);
  $('.filterBlock .navBtnGlobal').click(prodSelectBtn);
  $('.productShow .navBtnGlobal').click(prodShowToggleTabs);
})


$('.cardInner-preview').zoom({
  duration: 300,
  magnify: 1.5
});

$('#categorySortBy').change(function(){
    var url = new URL(window.location.href);
    url.searchParams.set("sort", $(this).val());

    window.location.search = url.search;
});

function debounce(fn, wait) {
    var timerId;
    return function() {
        var args = arguments,
            content = this;

        clearTimeout(timerId);

        function later() {
            fn.apply(content, this);
        }
        timerId = setTimeout(later, wait)
    }
}

$('input.searchForm-area__filter').keyup(debounce(function(){
  var value = $(this).val();

  if(value) {
    $(this).parent().next().find('li').hide();
    $(this).parent().next().find('.filterBlock-selectVal').each(function(){
      if($(this).text().indexOf(value) > -1) $(this).parents('li').show();
    });
  } else {
      $(this).parent().next().find('li').show();
  }


}, 700))


$('.cartBlock-deleteOrder').click(function(e){
  e.preventDefault();
  var button  = this;
  $.post('/cart/default/remove', {
    item_code: $(this).data('itemcode')
  }, function(){
    $(button).parents('.cartBlock-item').remove();

      var totalPrice = 0;
      $('.cartBlock-item').each(function(){
          totalPrice += parseInt($(this).find('.priceBlock').text());
      });

      $('.total-items-price .price').text(totalPrice + ' грн.')

  });



});

$('.cartBlock-quantInput').keyup(function(e){
  e.preventDefault()
    updatecart(this);
});

function updatecart(el){
  return debounce(function(){
      var data = $(el).serialize()+'&item_code='+$(el).data('itemcode');

      $(el).parents('.cartBlock-item').find('.priceBlock').text(parseInt($(el).data('price')) * parseInt($(el).val()) + ' грн.');

      $.post('/cart/default/update', data, function(success){});


      var totalPrice = 0;
      $('.cartBlock-item').each(function(){
        totalPrice += parseInt($(this).find('.priceBlock').text());
      });

      $('.total-items-price .price').text(totalPrice + ' грн.')

  }, 500)();
}


$('#checkout-button').click(function(e){
  e.preventDefault();
  var proceed = true;

  var fields = {};
  $('.cartBlock-userInfo input').each(function(){
    fields[$(this).attr('name')] = $(this).val();
    if(!$(this).val()){
      proceed = false;
    }
  });

  if(!proceed) {
       return swal(
          'Заполните все поля',
          '',
          'error'
      );
  }

  $(this).hide();
  $('#loader').show();

  checkout(fields.name, fields.phone, fields.email, function(){
      $('#checkout-button').show();
      $('#loader').hide();
      return swal({
          title: 'Ваш заказ успешно оформлен',
          text: 'Наш менеджер перезвонит Вам в течение полу часа',
          type: 'success',
          confirmButtonText: 'Продолжить покупки'
      }).then(function () {
          window.location.href = '/';
      }, function (dismiss) {
          window.location.href = '/';
      });
  });

});

function checkout(name, phone, email, callback){
    var postdata = "BillingInfoEditForm%5Bfirstname%5D="+name+"&BillingInfoEditForm%5Blastname%5D=lastname&BillingInfoEditForm%5Bemail%5D="+email+"&BillingInfoEditForm%5Bmobilephone%5D="+phone+"&BillingInfoEditForm%5Baddress1%5D=address1&BillingInfoEditForm%5Baddress2%5D=address2&BillingInfoEditForm%5Bcity%5D=city&BillingInfoEditForm%5Bstate%5D=state&BillingInfoEditForm%5Bcountry%5D=UA&BillingInfoEditForm%5Bpostal_code%5D=00000&PaymentMethodEditForm%5Bpayment_method%5D=cashondelivery&PaymentMethodEditForm%5Bagree%5D=0&PaymentMethodEditForm%5Bagree%5D=1"
  $.post('/cart/checkout', postdata, function(success){
    console.log(success);

    if(callback) callback();

  });
}


$('.button__callback').click(function(e){
  e.preventDefault();

    swal({
        title: 'Заказать звонок',
        html:
        '<div class="cb-modal-form">' +
          '<div class="form-group">'+
            '<label>Ваше имя</label>'+
            '<input class="callback-input callback-input-name">'+
          '</div>' +
          '<div class="form-group">'+
            '<label>Ваш номер телефона</label>'+
            '<input class="callback-input callback-input-phone">' +
          '</div>' +
        '</div>',
        focusConfirm: false,
        confirmButtonText: 'Перезвоните мне',
        preConfirm: function () {
            return new Promise(function (resolve) {
                resolve([
                    $('.callback-input-name').val(),
                    $('.callback-input-phone').val()
                ]);
            });
        }
    }).then(function (result) {
        //swal(JSON.stringify(result));

        if(result[0] && result[1]) {
            $.post('/site/default/callback', {
                name: result[0],
                phone: result[1]
            }, function(success){
                swal('Отправлено', 'Наш менеджер перезвонит Вам в ближайшее время', 'success');
            });
        }

    }).catch(swal.noop);
});