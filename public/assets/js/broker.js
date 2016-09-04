var raw, fake;

function PrepareBuyModal(user_id, company_id, company_name) {

var html ='<div class="modal fade" id="buy-modal" tabindex="-1" role="dialog" aria-labelledby="buy-modal-title" aria-hidden="true">'
        +'<div class="modal-dialog">'
          +'<div class="modal-content">'
            +'<div class="modal-header">'
              +'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
                +'<h4 class="modal-title" id="buy-modal-title">Buy Shares of '+company_name+' for Player #'+user_id+'</h4>'
              +'</div>'
              +'<form id="buy-form">'
                +'<div class="modal-body">'
                    +'<input type="hidden" value="'+user_id+'" name="player_id" autocomplete="off">'
                    +'<input type="hidden" value="'+company_id+'" name="company_id" autocomplete="off">'
                    +'<input type="text" class="form-control" name="number_of_shares" placeholder="Enter number of shares player wants to buy" required autocomplete="off">'
                +'</div>'
                +'<div class="modal-footer">'
                  +'<button type="submit" class="btn btn-primary btn-block" id="buy-modal-go">Buy</button>'
                +'</div>'
              +'</form>'
            +'</div>'
          +'</div>'
        +'</div>';

return html;

}

function PrepareSellModal(user_id, company_id, company_name) {

var html ='<div class="modal fade" id="sell-modal" tabindex="-1" role="dialog" aria-labelledby="sell-modal-title" aria-hidden="true">'
        +'<div class="modal-dialog">'
          +'<div class="modal-content">'
            +'<div class="modal-header">'
              +'<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>'
                +'<h4 class="modal-title" id="sell-modal-title">Sell Shares of '+company_name+' of Player #'+user_id+'</h4>'
              +'</div>'
              +'<form id="sell-form">'
                +'<div class="modal-body">'
                    +'<input type="hidden" value="'+user_id+'" name="player_id" autocomplete="off">'
                    +'<input type="hidden" value="'+company_id+'" name="company_id" autocomplete="off">'
                    +'<div class="input-group">'
                      +'<input type="text" class="form-control" name="number_of_shares" placeholder="Enter number of shares player wants to sell" required autocomplete="off">'
                      +'<span class="input-group-btn">'
                        +'<button type="submit" class="btn btn-primary" id="sell-modal-go">Sell</button>'
                      +'</span>'
                    +'</div>'
                    +'<br>'
                    +'<p class="text-muted text-center">-<em>OR</em>-</p>'
                    +'<br>'
                    +'<button type="button" class="btn btn-danger btn-block" id="sell-all-modal-go">Sell all shares</button>'
                    +'<br>'
                +'</div>'
              +'</form>'
            +'</div>'
          +'</div>'
        +'</div>';

return html;

}

$(window).load(function() {

  cheatCodes();

  raw = $('#raw');
  fake = parseInt($('#fake-broker-id').val());
  $('.ds-buy-button').bind("click", buyHandler);
  $('.ds-sell-button').bind("click", sellHandler);
  setInterval(function() {
    updateScreen();
  }, 5000)
});

var updateScreen = function() {
  $('.ds-buy-button').unbind("click", buyHandler);
  $('.ds-sell-button').unbind("click", sellHandler);
  if(isNaN(fake)) fake=1;
  $.post('/broker/part?id='+fake, function(data) {
    $("#broker-main").html(data);
    $('.ds-buy-button').bind("click", buyHandler);
    $('.ds-sell-button').bind("click", sellHandler);
  }, "html");
};

var sellHandler = function(e) {
  e.preventDefault();

  var user = $(this).attr('ds-player-id');
  var company = $(this).attr('ds-company-id');
  var company_name = $(this).attr('ds-company-name');

  raw.html(PrepareSellModal(user, company, company_name));

  $('#sell-modal').modal();

  $('#sell-modal').on('shown.bs.modal', function() {
    $('input[name=number_of_shares]').focus();
    $('#sell-form').submit(function(e) {
      e.preventDefault();
      $.post('/sell', $(this).serialize(), function(data) {
        switch (data.status) {
          case 0:
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Whoops!</strong> User don\'t have much shares</h4>' },
              type: 'warning',
              fadeOut: {
                delay: 500
              }
            }).show();
            break;
          case 1:
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Yeah!</strong> Transaction completed successfully</h4>' },
              type: 'success',
              fadeOut: {
                delay: 500
              }
            }).show();
            break;
        }
        $('#sell-modal').modal('toggle');
      }, 'json');
    });
    $('#sell-all-modal-go').click(function(e) {
      e.preventDefault();
      $.post('/sell/all', { player_id : parseInt($('input[name=player_id]').val()), company_id : parseInt($('input[name=company_id]').val()) }, function(data) {
        switch (data.status) {
          case 0:
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Whoops!</strong> User don\'t have much shares</h4>' },
              type: 'warning',
              fadeOut: {
                delay: 500
              }
            }).show();
            break;
          case 1:
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Yeah!</strong> Transaction completed successfully</h4>' },
              type: 'success',
              fadeOut: {
                delay: 500
              }
            }).show();
            break;
        }
        $('#sell-modal').modal('toggle');
      }, 'json');
    });
  });
  $('#sell-modal').on('hidden.bs.modal', function() {
    $(this).remove();
  });
};

var buyHandler = function(e) {
  
  var user = $(this).attr('ds-player-id');
  var company = $(this).attr('ds-company-id');
  var company_name = $(this).attr('ds-company-name');

  raw.html(PrepareBuyModal(user, company, company_name));

  $('#buy-modal').modal();
  $('#buy-modal').on('shown.bs.modal', function() {
    $('input[name=number_of_shares]').focus();
    $('#buy-form').submit(function(e) {
      e.preventDefault();
      $.post('/buy', $(this).serialize(), function(data) {
        switch (data.status) {
          case 0:
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Aww!</strong> Shares out of stock</h4>' },
              type: 'danger',
              fadeOut: {
                delay: 500
              }
            }).show();
            break;
          case 1:
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Burpp!</strong> Player don\'t have enough money to complete this transaction</h4>' },
              type: 'danger',
              fadeOut: {
                delay: 500
              }
            }).show();
            break;
          case 2:
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Yeah!</strong> Transaction completed successfully</h4>' },
              type: 'success',
              fadeOut: {
                delay: 500
              }
            }).show();
            break;
        }
        $('#buy-modal').modal('toggle');
      }, 'json');
    });
  });
  $('#buy-modal').on('hidden.bs.modal', function() {
    $(this).remove();
  });
};

var cheatCodes = function() {
  $(document).keydown(function(e) {
    if(e.ctrlKey && e.keyCode == 77) {
      $('#cheat-modal').modal('toggle');
      $('#cheat-modal').on('shown.bs.modal', function() {
        $('input[name=cheated_money]').focus();
        $('#cheat-form').off().on('submit', function(e) {
          e.preventDefault();
          $.post('/money_cheat', $(this).serialize(), function(data) {
            $('.bottom-left').notify({
              message: { html: '<h4 style="margin-bottom:0;font-weight:300"><strong>Yeah!</strong> You rocked ;)</h4>' },
              type: 'warning',
              fadeOut: {
                delay: 400
              }
            }).show();
            $('#cheat-modal').modal('toggle');
          });
        });
      });
    }
  });
};