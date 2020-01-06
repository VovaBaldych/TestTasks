let array = [];
let array_res = [];

$('input[name = "sort-price"]').on('change', function()
{
    if($("#chipest").prop('checked'))
    {
        sort_by_price(array, true);
        $('.tickets').empty();
        output_ticket(array);    }
    else
    {
        sort_by_price(array, false);
        $('.tickets').empty();
        output_ticket(array);
    }
});

$('input[name = "sort-time"]').on('change', function()
{
    if($("#fastest").prop('checked'))
    {
        sort_by_duration(array, true);
        $('.tickets').empty();
        output_ticket(array);
    }
    else
    {
        sort_by_duration(array, false);
        $('.tickets').empty();
        output_ticket(array);
    }
});

$('#all').on('change', function()
{
    if($("#all").prop('checked'))
    {
        for(let i=0; i<10; i++)
        {
            output_ticket(array);
        }
    }
});

function first_filter(choise)
{
    for(let i=0; i<10; i++)
        {
            if(array[i].segments[0].stops.length == choise)
            array_res.push(array);
            console.log(array_res);
        }
}

$('.super-filter').on('change', function()
{
    if($('#without-p').prop('checked')) first_filter(0);
    else if($('#p-1').prop('checked')) first_filter(1);
    else if($('#p-2').prop('checked')) first_filter(2);
    else if($('#p-3').prop('checked')) first_filter(3);
});

$(window).on('load', function()
{
    $.ajax({
        method: "GET",
        url: "https://front-test.beta.aviasales.ru/search",
        success: function(response)
        {
            let search = response.searchId;
            as(search);
        }
    })
});

function as(search)
{
    $.ajax({
        method: "GET",
        url: "https://front-test.beta.aviasales.ru/tickets?searchId="+search,
        async: true,
        error: function (error)
        {
            console.log(error.status);      
            as(search);
        },
        success: function (response)
        {
            for(let i=0; i<response.tickets.length; i++) array.push(response.tickets[i]);

            if(response.stop!=true)
            {
                as(search);
                
            } 
            else
            {
                sort_by_price(array, true);
                output_ticket(array);
                console.log(array);
                console.log(array[1].segments[0].stops);
                
            }
        }
    });
};

function sort_by_price(array, flag)
{
    if(flag==true)
        array.sort((a, b) => a.price > b.price ? 1 : -1);
    else
        array.sort((a, b) => a.price < b.price ? 1 : -1);

    return array;
}
function sort_by_duration(array, flag)
{
    if(flag==true)
        array.sort((a, b) => a.segments[0].duration > b.segments[0].duration ? 1 : -1);
    else
        array.sort((a, b) => a.segments[0].duration < b.segments[0].duration ? 1 : -1);

    return array;
}
function output_ticket(array)
{
    for(let i=0; i<10; i++) $('.tickets').append('<div class="col ticket"><h2 class="price">' + array[i].price + '</h2><p>' + array[i].carrier + '</p><p>' + array[i].segments[0].duration + ' хв</p><p>' + array[i].carrier + '</p><p>' + array[i].segments[0].stops + '</p></div>');
}

if($('.for-all').prop('checked') == false)
{
    $('#all').on('click', function()
    {
        $('.for-all').prop('checked', 'true');
    });
}