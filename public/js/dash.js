$("ul.menu li").click ->
  $("ul.menu li").removeClass 'active'
  $(this).addClass 'active'