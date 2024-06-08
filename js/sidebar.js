
$(document).ready(function(){
  //jquery for toggle sub menus
  $('.sub-btn').click(function(){
    $(this).next('.sub-menu').slideToggle();
    $(this).find('.dropdown').toggleClass('rotate');
  });

  //jquery for expand and collapse the sidebar
  $('.sidebar-toggle').click(function(){
    $('.side-bar').addClass('active');
    $('.sidebar-toggle').css("visibility", "hidden");
  });

  $('.close-btn').click(function(){
    $('.side-bar').removeClass('active');
    $('.sidebar-toggle').css("visibility", "visible");
  });


});


