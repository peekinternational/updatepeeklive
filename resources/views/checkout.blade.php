
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Checkout - Peekchat</title>
    <meta name="Description" content="Purchase and download Peekchat, a live chat software solution that uses PHP and mySQL. It is a Facebook chat script." /> 
    <meta name="robots" content="noindex,nofollow">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="en" />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300,600' rel='stylesheet' type='text/css'>
    <link media="all" rel="stylesheet" href="https://www.arrowchat.com/css/all.php?v=new43" type="text/css" />
    <link rel="stylesheet" href="https://use.typekit.net/xfn7bgd.css">
    <link rel="stylesheet" href="/css/fontawesome.min.css" >
    <link media="all" rel="stylesheet" href="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.css?v=2.1.5" type="text/css" />
    <link type="text/css" rel="stylesheet" id="arrowchat_css" media="all" href="https://www.arrowchat.com/arrowchat/external.php?type=css&amp;v=3r2" charset="utf-8" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> 
    <script type="text/javascript" src="https://www.arrowchat.com/js/general.js?v=3"></script>
    <script type="text/javascript" src="https://www.arrowchat.com/js/fancybox2/jquery.fancybox.pack.js"></script>

    <!-- responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Vendor CSS -->
    <link rel="stylesheet" media="screen" href="../vendor/tiny-slider/dist/tiny-slider.css">
    <link rel="stylesheet" media="screen" href="../vendor/lightgallery.js/dist/css/lightgallery.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" media="screen" href="../css/theme.min.css">
    <link rel="stylesheet" href="https://www.arrowchat.com/dist/responsive.css?v=29">
    <link rel="stylesheet" href="https://www.arrowchat.com/dist/slicknav.css">
    <script src="https://www.arrowchat.com/dist/modernizr.min.js"></script>
    <!-- <script src="/dist/jquery.min.js"></script> -->
    <script src="https://www.arrowchat.com/dist/jquery.slicknav.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
        $('#nav').slicknav();
    });
    </script>
    <!-- end -->    
    <link href="https://www.arrowchat.com/css/tooltipster.css" rel="stylesheet" type="text/css" /> 
    <link href="https://www.arrowchat.com/css/tooltipster-shadow.css" rel="stylesheet" type="text/css" /> 

    <script type="text/javascript" src="https://www.arrowchat.com/js/jquery.tooltipster.min.js"></script> 
    <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.js"></script>
    <script>
      $(document).ready(function() {
        $('.tooltip').tooltipster({
          theme: 'tooltipster-shadow',
          maxWidth: 300,
          delay: 100,
        });
                $('.checkbox-row').click(function() {
          if (!$('.checkbox-row').hasClass('disabled')) {
            if ($(this).hasClass('checked')) {
              $(this).removeClass('checked');
              $(this).children().children('input').removeAttr('checked');
            } else {
              $(this).addClass('checked');
              $(this).children().children('input').attr('checked', 'checked');
            }
            
            calculatePrice();
          }
        });
                
        
       
          var license_quantity = 1,
          begin_price = parseInt('{{$plan->price}}'),
          install_price = parseInt('{{$plan->install_price}}'),
          support_price = parseInt('{{$plan->support_price}}'),
          coupon_percent = 0,
          coupon_discount = 0;
        var total = (begin_price * license_quantity);
        $('.quantity-increase').click(function() {
          if (!$('.quantity-increase').hasClass('disabled')) {
            license_quantity++;
            $('.quantity-text .number').html(license_quantity);
            if (license_quantity > 1)
              $('.quantity-text .txt').html('Licenses');
            else
              $('.quantity-text .txt').html('License');
              
            if (license_quantity > 1)
              $('.quantity-decrease').removeClass('disabled');
              
            $('#quantity').val(license_quantity);
            calculatePrice();
          }
        });
        $('.quantity-decrease').click(function() {
          if (!$('.quantity-decrease').hasClass('disabled')) {
            if (license_quantity > 1) {
              license_quantity--;
              $('.quantity-text .number').html(license_quantity);
              if (license_quantity > 1)
                $('.quantity-text .txt').html('Licenses');
              else
                $('.quantity-text .txt').html('License');
                
              if (license_quantity == 1)
                $('.quantity-decrease').addClass('disabled');
              
              $('#quantity').val(license_quantity);
              calculatePrice();
            }
          }
        });
        function calculatePrice() {
          total = (begin_price * license_quantity);
          if ($('#pro-install').prop('checked')) {
            total = total + install_price;
          }
          if ($('#support_ext').prop('checked')) {
            total = total + support_price;
          }
          if (coupon_percent != 0) {
            total = total * (1 - (coupon_percent/100));
          }
          if (coupon_discount != 0) {
            total = total - coupon_discount;
          }
          
          if (total < 0)
            total = 1;
            
          total = Math.round(total);
          
          $('.checkout-button span').html(total);
          $('.checkout-button-continue span').html(total);
          $('#amount').val(total);
        }
        calculatePrice();
        
        // $('.checkout-button-continue').click(function() {
        //   $('.continue-button-wrapper').hide();
        //   $('#payment-wrapper').show();
        //   $('.checkbox-row').addClass('disabled');
        //   $('.quantity-increase').addClass('disabled');
        //   $('.quantity-decrease').addClass('disabled');
        //   if ($('.coupon-desc').hasClass('pass') || $('.coupon-desc').hasClass('fail')) {
        //     $('.apply-coupon').hide();
        //     $('.have-coupon').hide();
        //     $('#coupon-code').hide();
        //   } else {
        //     $('.row.coupon').hide();
        //   }
        //   startBrainTree(total);
        //   $('html,body').animate({
        //     scrollTop: $('#payment-methods').offset().top
        //   }, 0);
        // });
        
        $(".have-coupon").click(function() {
          $(this).hide();
          $('.coupon-input').show();
        });
        
        $('.apply-coupon').click(function() {
          $('.apply-coupon').hide();
          $('.coupon-loading').show();
          coupon_percent = 0;
          coupon_discount = 0;
          
          $.ajax({
            url: "./check_coupon.php?_="+new Date().getTime(), 
            cache: false,
            type: "post",
            dataType: "json",
            error: function (xhr, ajaxOptions, thrownError) {
              $('.apply-coupon').show();
              $('.coupon-loading').hide();
              calculatePrice();
            },
            data: {
              code: $('#coupon-code').val()
            },
            success: function(result) {
              if (result.status == 'fail') {
                $('.coupon-desc').removeClass('pass').addClass('fail');
                $('.apply-coupon').show();
              }
              if (result.status == 'pass') {
                $('.coupon-desc').removeClass('fail').addClass('pass');
                $('.apply-coupon').hide();
                coupon_percent = result.percent;
                coupon_discount = result.discount;
              }
              
              calculatePrice();
              
              $('.coupon-desc').html(result.msg);
              $('.coupon-loading').hide();
            }
          });
        });
        
        function startBrainTree(total_price)
        {
          var form = document.querySelector('#payment-form');
          var deviceDataInput = form['device_data'];
          var client_token = "eyJ2ZXJzaW9uIjoyLCJhdXRob3JpemF0aW9uRmluZ2VycHJpbnQiOiJleUowZVhBaU9pSktWMVFpTENKaGJHY2lPaUpGVXpJMU5pSXNJbXRwWkNJNklqSXdNVGd3TkRJMk1UWXRjSEp2WkhWamRHbHZiaUlzSW1semN5STZJbWgwZEhCek9pOHZZWEJwTG1KeVlXbHVkSEpsWldkaGRHVjNZWGt1WTI5dEluMC5leUpsZUhBaU9qRTJORFl4TXpVek1UZ3NJbXAwYVNJNklqaGpaRFJqTkdKaExUYzBaR1l0TkRjMk9DMWlaV1UzTFRZNVpqYzRZek13TjJJeE9TSXNJbk4xWWlJNklqaHJhbWgzTm01d2FEUTJjbnBtZDJNaUxDSnBjM01pT2lKb2RIUndjem92TDJGd2FTNWljbUZwYm5SeVpXVm5ZWFJsZDJGNUxtTnZiU0lzSW0xbGNtTm9ZVzUwSWpwN0luQjFZbXhwWTE5cFpDSTZJamhyYW1oM05tNXdhRFEyY25wbWQyTWlMQ0oyWlhKcFpubGZZMkZ5WkY5aWVWOWtaV1poZFd4MElqcDBjblZsZlN3aWNtbG5hSFJ6SWpwYkltMWhibUZuWlY5MllYVnNkQ0pkTENKelkyOXdaU0k2V3lKQ2NtRnBiblJ5WldVNlZtRjFiSFFpWFN3aWIzQjBhVzl1Y3lJNmUzMTkuU0tpOEJuRXcyWTk0Q0ZmdkJDU2tjRWRpODZ0Z2hLREZhczRQUTd0Y2t5UVl2TzhzU2NzTVZLVHBCTVp1SE5NNGRJUDRfY3NXeE52cWNVZXJZb2J6MVEiLCJjb25maWdVcmwiOiJodHRwczovL2FwaS5icmFpbnRyZWVnYXRld2F5LmNvbTo0NDMvbWVyY2hhbnRzLzhramh3Nm5waDQ2cnpmd2MvY2xpZW50X2FwaS92MS9jb25maWd1cmF0aW9uIiwiZ3JhcGhRTCI6eyJ1cmwiOiJodHRwczovL3BheW1lbnRzLmJyYWludHJlZS1hcGkuY29tL2dyYXBocWwiLCJkYXRlIjoiMjAxOC0wNS0wOCIsImZlYXR1cmVzIjpbInRva2VuaXplX2NyZWRpdF9jYXJkcyJdfSwiY2xpZW50QXBpVXJsIjoiaHR0cHM6Ly9hcGkuYnJhaW50cmVlZ2F0ZXdheS5jb206NDQzL21lcmNoYW50cy84a2podzZucGg0NnJ6ZndjL2NsaWVudF9hcGkiLCJlbnZpcm9ubWVudCI6InByb2R1Y3Rpb24iLCJtZXJjaGFudElkIjoiOGtqaHc2bnBoNDZyemZ3YyIsImFzc2V0c1VybCI6Imh0dHBzOi8vYXNzZXRzLmJyYWludHJlZWdhdGV3YXkuY29tIiwiYXV0aFVybCI6Imh0dHBzOi8vYXV0aC52ZW5tby5jb20iLCJ2ZW5tbyI6Im9mZiIsImNoYWxsZW5nZXMiOlsiY3Z2Il0sInRocmVlRFNlY3VyZUVuYWJsZWQiOmZhbHNlLCJhbmFseXRpY3MiOnsidXJsIjoiaHR0cHM6Ly9jbGllbnQtYW5hbHl0aWNzLmJyYWludHJlZWdhdGV3YXkuY29tLzhramh3Nm5waDQ2cnpmd2MifSwiYXBwbGVQYXkiOnsiY291bnRyeUNvZGUiOiJVUyIsImN1cnJlbmN5Q29kZSI6IlVTRCIsIm1lcmNoYW50SWRlbnRpZmllciI6Im1lcmNoYW50LmNvbS5hcnJvd2NoYXQiLCJzdGF0dXMiOiJwcm9kdWN0aW9uIiwic3VwcG9ydGVkTmV0d29ya3MiOlsidmlzYSIsIm1hc3RlcmNhcmQiLCJhbWV4IiwiZGlzY292ZXIiXX0sInBheXBhbEVuYWJsZWQiOnRydWUsInBheXBhbCI6eyJiaWxsaW5nQWdyZWVtZW50c0VuYWJsZWQiOnRydWUsImVudmlyb25tZW50Tm9OZXR3b3JrIjpmYWxzZSwidW52ZXR0ZWRNZXJjaGFudCI6ZmFsc2UsImFsbG93SHR0cCI6ZmFsc2UsImRpc3BsYXlOYW1lIjoiQXJyb3dTdWl0ZXMgTExDIiwiY2xpZW50SWQiOiJBV0pWZkVsbURkbC02Mk01eGc1cnZiOHpLa1BmdWJ1RHBnb0JScjVEaWdYS0hhMjRhV1QydEVvZGlZc3JYMGRjREFoS0IxZGJjeGNDU2lXaSIsInByaXZhY3lVcmwiOiJodHRwczovL3d3dy5hcnJvd2NoYXQuY29tL3ByaXZhY3kvIiwidXNlckFncmVlbWVudFVybCI6Imh0dHBzOi8vd3d3LmFycm93Y2hhdC5jb20vbGljZW5zZS8iLCJiYXNlVXJsIjoiaHR0cHM6Ly9hc3NldHMuYnJhaW50cmVlZ2F0ZXdheS5jb20iLCJhc3NldHNVcmwiOiJodHRwczovL2NoZWNrb3V0LnBheXBhbC5jb20iLCJkaXJlY3RCYXNlVXJsIjpudWxsLCJlbnZpcm9ubWVudCI6ImxpdmUiLCJicmFpbnRyZWVDbGllbnRJZCI6IkFSS3JZUkRoM0FHWER6VzdzT18zYlNrcS1VMUM3SEdfdVdOQy16NTdMallTRE5VT1NhT3RJYTlxNlZwVyIsIm1lcmNoYW50QWNjb3VudElkIjoiQXJyb3dTdWl0ZXNMTENfaW5zdGFudCIsImN1cnJlbmN5SXNvQ29kZSI6IlVTRCJ9fQ==";
          
          if ($(window).width() < 750) {
            var paypal_size = 'small';
          } else {
            var paypal_size = 'large';
          }

          braintree.dropin.create({
            authorization: client_token,
            container: '#dropin-container',
            dataCollector: {
            kount: true
            },
            paypal: {
            flow: 'vault',
            buttonStyle: {
              color: 'blue',
              shape: 'rect',
              size: paypal_size
            }
            },
            paypalCredit: {
            flow: 'checkout',
            amount: total_price,
            currency: 'USD',
            buttonStyle: {
              size: paypal_size
            }
            },
            googlePay: {
            merchantId: 'dcy567d9pyfwqy36',
            transactionInfo: {
              totalPriceStatus: 'FINAL',
              totalPrice: total_price,
              currencyCode: 'USD'
            },
            cardRequirements: {
              billingAddressRequired: true
            }
            },
            applePay: {
            displayName: 'ArrowChat',
            paymentRequest: {
              total: {
              label: 'ArrowChat',
              amount: total_price
              },
              requiredBillingContactFields: ["postalAddress"]
            }
            },
            card: {
            flow: 'vault',
            cardholderName: {
              required: true
            }
            },
            vaultManager: false
          }, function (createErr, instance) {
            if (createErr) {
              console.log('Create Error', createErr);
              return;
            }
            
            if (deviceDataInput == null) {
              deviceDataInput = document.createElement('input');
              deviceDataInput.name = 'device_data';
              deviceDataInput.type = 'hidden';
              form.appendChild(deviceDataInput);
            }
            
            form.addEventListener('submit', function (event) {
              event.preventDefault();
              
              $('.checkout-button').addClass('processing');
              
              instance.requestPaymentMethod(function (err, payload) {
                if (err) {
                  $('.checkout-button').removeClass('processing');
                  console.log('Request Payment Method Error', err);
                  return;
                }
                
                deviceDataInput.value = payload.deviceData;
                document.querySelector('#nonce').value = payload.nonce;
                form.submit();
              });
            });
          });
          $('#payment-methods').unbind('click');
          $('#payment-methods').on('click', '.braintree-option__card', function() {
            $('html,body').animate({
              scrollTop: $('#dropin-container').offset().top
            }, 0);
          });
          $(document).unbind('click');
          $(document).on('click', function() {
            setTimeout(function() {
              if ($('.braintree-methods--active').length > 0 || $('.braintree-show-card').length > 0) {
                $('.checkout-button').addClass('show');
              } else {
                $('.checkout-button').removeClass('show');
              }
            }, 1);
          });
          function updatePayButton() {
            setTimeout(function() {
              if ($('.braintree-methods--active').length > 0 || $('.braintree-show-card').length > 0) {
                $('.checkout-button').addClass('show');
              } else {
                $('.checkout-button').removeClass('show');
              }
              updatePayButton();
            }, 100);
          }
          updatePayButton();
        }
      });
    </script>
    <style>
      [data-braintree-id="choose-a-way-to-pay"] {
        display: none;
      }
      [data-braintree-id="toggle"] {
        background: none;
      }
      [data-braintree-id="toggle"]:hover {
        background: none;
      }
    </style>
  </head>
  <body class="checkout np">
    <?php
    $id = Request::segment(2);
    ?>
    <div id="container">
      <header>
        <div class="relative2">
          <a class="back button" href="{{url('/')}}"><i class="fa fa-arrow-left"></i></a>
          <h1>Checkout</h1>
          <a class="headset button" href="/support/contact/"><i class="fas fa-headset"></i></a>
        </div>
      </header>
      <main>
        <div class="main-wrapper">
          <form action="{!! URL::route('paypal') !!}" id="payment-form" method="post" autocomplete="off">
            {{ csrf_field() }}
            <input type="hidden" value="{{$plan->id}}" name="plan_id">
            <section class="product">
              <div class="pricing-column center purchase">
                <h3>{{$plan->title}}</h3>
                <div class="description">{{$plan->description}}</div>
                <h4><sup>$</sup>{{$plan->price}}</h4>
                <div class="sub-description">one-time fee</div>
                <ul class="mt0">
                  @foreach(explode(",",$plan->feature) as $features)
                  <li><i class="fal fa-check green"></i>{{$features}}</li>
                  @endforeach
                </ul>
                
              </div>
                                                                                                                            </section>
          <section class="info mb80">
               <div class="row checkbox-row pt30 @if($id == 2 || $id ==3) checked @endif ">
                <div class="fl addon">
                  <p class="title">Professional Installation<span>@if($id == 2 || $id ==3)Included @else +${{$plan->install_price}} @endif</span></p>
                  <p class="desc">We'll install Peekchat on your site including login, usernames, avatars, links. Includes one installation -- you can purchase more later.</p>
                </div>
                @if($id == 2 || $id ==3)

                @else
                <div class="fr addon">
                  <input id="pro-install" name="pro_install" type="checkbox" value="1" disabled="disabled"  class="sr-only" />
                  <span class="relative2 checkbox-button">
                    <i class="far fa-square"></i>
                  </span>
                </div>
                @endif
                <div class="clearfix"></div>
              </div>
              <div class="row checkbox-row pt30 ">
               
                <div class="fl addon">
                  <p class="title">Support Extension<span>@if($id == 3)Included @else +${{$plan->support_price}} @endif</span></p>
                  <p class="desc">Extend your technical support by an extra 12 months.</p>
                </div>
                @if($id == 3)

                @else
                <div class="fr addon">
                  <input id="support_ext" name="support_ext" type="checkbox" value="1" class="sr-only" />
                  <span class="relative2 checkbox-button">
                    <i class="far fa-square"></i>
                  </span>
                </div>
                @endif
                <div class="clearfix"></div>
              </div>
              @if(!Session::has('userInfo'))
               <div class="row border-top pt30">
                
                <div class="already-have-account">
                  <label class="fl" for="signup-name">Full Name</label>
                  <p class="fr"><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Already have an account?</a></p>
                  <div class="clearfix"></div>
                </div>
                <div class="relative">
                  <input autocomplete="off"  id="signup-name" type="text" required name="name" class="general" placeholder="e.g. elonmusk" />
                  
                </div>
              </div>
               <div class="row border-top pt30">
                <div class="msg-notice email-notice mb30"><p class="title"></p><p class="msg"></p></div>

                <div class="already-have-account">
                  <label class="fl" for="signup-email">Email address</label>
                  
                  <div class="clearfix"></div>
                </div>
                <div class="relative">
                  <input autocomplete="off"  id="signup-email" type="email" required name="email" class="general" placeholder="e.g. elonmusk@tesla.com" />
                  
                </div>
              </div>
              <div class="row">
                <div class="co-6">
                  <label for="signup-password">Password</label>
                  <div class="relative">
                    <input autocomplete="new-password"  id="signup-password" type="password" minlength="4" maxlength="30" required name="password" class="general" />
                    
                  </div>
                </div>
              
                <div class="clearfix"></div>
              </div>
              @endif
              <div class="row continue-button-wrapper">
              <input id="amount" name="amount"  type="hidden" min="1" value="125" />

                <button type="submit" id="continue-button"  class="site-button checkout-button-continue green"><b class="text">Checkout $<span>45</span></b></button>
              </div>
            
            </section>
          </form>
        </div>
      </main>
      <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Login</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <section class="container py-3 py-md-3 py-lg-3 mb-md-3" >
      
        <div class="col-lg-8 mx-auto">

          <form method="post" action="{{ url('logins') }}">
            <div class="row d-flex justify-content-center g-4">
            {{ csrf_field() }}
              <div class="col-sm-12">
                <label class="form-label" for="cf-email">Email address:&nbsp;<span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" id="cf-email" placeholder="johndoe@email.com" required="">
             
                <label class="form-label" for="cf-name">Password:&nbsp;<span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" id="cf-name" placeholder="Password" required="">
               
                 <input type="submit" value="Login" class="btn btn-primary mt-4 w-100" >
              </div>
              
            </div>
          </form>
        </div>
      </section>
          </div>
         
        </div>
      </div>
    </div>
    </div><!-- container end -->
    <!-- Vendor scripts: JS libraries and plugins -->
    <script src="../vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="../vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="../vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
    <script src="../vendor/lg-fullscreen.js/dist/lg-fullscreen.min.js"></script>
    <script src="../vendor/lg-zoom.js/dist/lg-zoom.min.js"></script>
    <script src="../vendor/lg-video.js/dist/lg-video.min.js"></script>

    <!-- Theme JS -->
    <script src="../js/theme.min.js"></script>
  </body>
</html>