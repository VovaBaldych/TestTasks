var $myCanvas = $('#canvas');

let kubik1=0, kubik2=0;
let square1=0, square2=0;
let steps = 1;
let currentX1=0, currentY1=0;
let currentX2=640, currentY2=640;

$("button#generate").on('click', function()
{   
    kubik1 = (Math.floor(Math.random() * 6) + 1);
    kubik2 = (Math.floor(Math.random() * 6) + 1);
    
    $('#number1').text(kubik1);
    $('#number2').text(kubik2);

    if(steps%2 !=0)
    {
        Step('Хід гравця 2','steelblue', 'blue', currentX1, currentY1);
        square1+=kubik1*kubik2;
        $("#square1").text(square1);
        currentX1+=kubik1*40;
        if((600-currentX1)<kubik1*40)
        {   
            currentX1=0;
            currentY1+=kubik2*40;
        }
        
    }
    else
    {
        Step('Хід гравця 1','rgb(165, 81, 81)', 'red', currentX2 - (kubik1*40), currentY2 - (kubik2*40));
        square2+=kubik1*kubik2;
        $("#square2").text(square2);
        currentX2-=kubik1*40;
        if(currentX2<kubik1*40)
        {   
            currentX2=640;
            currentY2-=kubik2*40;
        }
    }

    if (square1>=128){
        finishGame('Переможець - гравець 1');
    }
    else if (square2>=128)
    {
        finishGame('Переможець - гравець 2');
    }
    

    steps++;
});

function Step(text, fillColor, strokeColor, X, Y)
{
    $('#who').text(text);
    $myCanvas.drawRect({
        fillStyle: fillColor,
        strokeStyle: strokeColor,
        strokeWidth: 1,
        x: X, y: Y,
        fromCenter: false,
        width: kubik1 * 40,
        height: kubik2 * 40
        });
}

function finishGame(text)
{
    $('#window').css('display','flex');
    $('#window h2').text(text);
}

$('#new-game').on('click', function()
{
    
});
$('#close').on('click',function()
{
    window.close();
});
