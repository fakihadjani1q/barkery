// event pada saat link di klik
$('.page-scroll').on('click', function(e){

    // ambil isi href
    var tujuan = $(this).attr('href');
    // tangkap elemen ybs
    var elemenTujuan = $(tujuan);

   //    pindahkan scroll
   $('body').animate({
        scrollTop: elemenTujuan.offset().top -50
   }, 1250,'swing');

   
   e.priventDefault();

});

// parallax
$(window).scroll(function(){
     var wScroll= $(this).scrollTop();
     
     $('.jumbotron img').css({
          'transform': ' translate(0px, '+wScroll/4+'%)'

     });

     $('.jumbotron h1').css({
          'transform': ' translate(0px, '+wScroll/2+'%)'

     });

     $('.jumbotron p').css({
          'transform': ' translate(0px, '+wScroll/1.2+'%)'

     });


     // portfolio
     if(wScroll > $('.portofolio').offset().top - 300) {
          $('.portofolio .thumbnail').addClass ('muncul');
     }





});




