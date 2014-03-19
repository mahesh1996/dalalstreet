$(window).load(function() {
  setInterval(function() {
    updateScreen();
  }, 5000);
});

var updateScreen = function() {
  $.post('/news/part', function(data) {
    $("#main-news").html(data);
  }, "html");
};