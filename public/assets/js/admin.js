$(window).load(function() {
  setInterval(function() {
    updateScreen();
  }, 5000);
});

var updateScreen = function() {
  $.post('/admin/part', function(data) {
    $("#admin-updater-main").html(data);
  }, "html");
};