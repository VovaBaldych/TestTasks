let numInput = $('#valiuta1');
let fromSelect = $('#output-1');
let toSelect = $('#output-2');
let resultSpan = $('#valiuta2');

$.ajax({
  method: 'GET',
  dataType: 'json',
  url: 'https://api.privatbank.ua/p24api/pubinfo?json&exchange&coursid=5',
  success: function(response) {  

    response.forEach(function(money)
    {
      fromSelect.append('<option value="'+ money.buy +'">'+ money.ccy +'</option>');
      toSelect.append('<option value="'+ money.buy +'">' + money.ccy+'</option>');
  }); 
}
});

function Handler()
{    
  let money1 = fromSelect.val();
  let money2 = toSelect.val();
  let num = +numInput.val();
  if(!numInput.val().length || isNaN(num)) {return;}

  let result = money1 / money2 * num;
  resultSpan.text(Math.round(result * 1000) / 1000);
}

function changeDisable() {
  console.log(toSelect.children());
  $('#output-2 option:disabled').removeAttr('disabled');
  toSelect.children().each(function(index, value)
  {
    if(fromSelect.val() === $(this).val())
    {
      $(this).prop('disabled', 'true');
    }
  });
}

numInput.on('input', Handler);
fromSelect.on('change', changeDisable);
toSelect.on('change', changeDisable);