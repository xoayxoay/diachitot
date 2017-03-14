"use strict";
$(window).ready(function (){
  /* jQueryKnob */
  $(".knob").knob();

  //SLIMSCROLL FOR CHAT WIDGET
  $('#chat-box').slimScroll({
    height: '250px'
  });
  $('#list').slimScroll({
    height: '250px'
  });
  $(".connectedSortable").sortable({
    placeholder: "sort-highlight",
    connectWith: ".connectedSortable",
    handle: ".box-header, .nav-tabs",
    forcePlaceholderSize: true,
    zIndex: 999999
  });
  $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");
  //bootstrap WYSIHTML5 - text editor
  $(".textarea").wysihtml5();
});
