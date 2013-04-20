   // JavaScript Document
   $(document).ready(function() {
  var target = '.bigLink';
  var hoverClass = 'hoverBigLink';

  $(target).each(function() {
		$(this).hover(
      function() {
         $(this).addClass(hoverClass);
         status=$(this).find('a').attr('href');
      },
      function () {
         $(this).removeClass(hoverClass);
      });

    $(this).click(function() {
       location = $(this).find('a').attr('href');
    });

    $(this).css('cursor','pointer');

  });


  $(target + ' a')
    .focus(function() {
      $(this).parents(target).addClass(hoverClass);
    })
    .blur(function() {
			$(this).parents(target).removeClass(hoverClass);
   });

}); // end ready()