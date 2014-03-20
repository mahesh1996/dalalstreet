$(window).load(function() {
  setInterval(function() {
    updateScreen();
  }, 5000)
});

var updateScreen = function() {
  $.post('/projector/part', function(data) {
    $("#projector-main").html(data);
  }, "html");
};