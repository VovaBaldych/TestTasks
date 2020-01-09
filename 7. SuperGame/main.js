var $myCanvas = $('#canvas');

let kubik1=0, kubik2=0;
let square1=0, square2=0;
let steps = 1;
let currentX1=0, currentY1=0;
let currentX2=600, currentY2=600;

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
    }
    else
    {
        Step('Хід гравця 1','rgb(165, 81, 81)', 'red', currentX2 - (kubik1*40), currentY2 - (kubik2*40));
        square2+=kubik1*kubik2;
        $("#square2").text(square2);
        currentX2-=kubik1*40;
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