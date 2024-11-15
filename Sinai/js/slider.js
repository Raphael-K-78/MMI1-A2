$(document).ready(function() {
  const $logoTrack = $('.logo-track');
  const $logos = $('.logo');

  $logos.clone().appendTo($logoTrack);

  let totalWidth = 0;
  $logos.each(function() {
    totalWidth += $(this).outerWidth(true);
  });

  $logoTrack.width(totalWidth * 2);
});