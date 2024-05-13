$(function() {
  'use strict';

  /*simplemde editor*/
  // var i = $(".simpleMdeExample").length
  // if ($("#simpleMdeExample").length) {
  //   var simplemde = new SimpleMDE({
  //     element: $(".simpleMdeExample")[0]
  //   });
  // }
  $(".simpleMdeExample").each(function() {
    var simplemde = new SimpleMDE({
      element: this
    });
  });
});