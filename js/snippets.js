(function($){
     $(function(){
       $('.sidenav').sidenav();

       $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true,
        autoplay: true
      });
      
      setTimeout(autoplay, 4500);   
      
      function autoplay() {
        $('.carousel').carousel('next');
        setTimeout(autoplay, 4500);
      }
      
       //initialize all modals           
       $('.modal').modal();
       
       //or by click on trigger
       $('.trigger-modal').modal();

      $.cookieBar({
        message: 'Utilizamos cookies propias y de terceros para mejorar la experiencia del usuario a través de su navegación. Si continúas navegando aceptas su uso. <a class="modal-trigger" href="#modalcookies">Política de Cookies</a><br>',
        acceptButton: true,
        acceptText: 'Aceptar',
        acceptFunction: null,
        declineButton: false,
        declineText: 'Disable Cookies',
        declineFunction: null,
        policyButton: false,
        policyText: 'Privacy Policy',
        policyURL: '/privacy-policy/',
        autoEnable: true,
        acceptOnContinue: false,
        acceptOnScroll: false,
        acceptAnyClick: false,
        expireDays: 365,
        renewOnVisit: false,
        forceShow: false,
        effect: 'slide',
        element: 'body',
        append: true,
        fixed: true,
        bottom: true,
        zindex: '',
        domain: 'www.iwibot.com',
        referrer: 'www.iwibot.com'
      });
   
     }); // end of document ready
   })(jQuery); // end of jQuery name space