$(window).load(function() {
  setInterval(function() {
    updateScreen();
  }, 5000);
});

var updateScreen = function() {
  $.post('/player_details/part', function(data) {
    $("#detail-updater").html(data);
  }, "html");
};