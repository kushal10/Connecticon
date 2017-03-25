//for adjusting gap between table header and table content, other wise the thead and tbody text not align with properly because '.tbl-content' consumed little space for vertical scrollbar, scrollbar width depend on browser/os/platfrom.
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();