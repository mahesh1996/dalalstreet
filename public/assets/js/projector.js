$(window).load(function() {
  setInterval(function() {
    updateScreen();
  }, 3000)
});

var updateScreen = function() {
  $.post('/projector/part', function(data) {
    $("#projector-main").html(data);
  }, "html");
};