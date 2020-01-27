let week = $('input[name="week"]');
let time = $('input[name="time"]');


$('#bronik').on('click', function(){
    for (let i=0; i<week.length; i++)
    {
        if(week[i].checked)
        {
            localStorage.setItem(i, week[i].value);
            console.log(week[i].value);
        }
    }

    for (let i=0; i<time.length; i++)
    {
        if(time[i].checked)
        {
            localStorage.setItem(i, time[i].value);
            console.log(time[i].value);
            time[i].checked = "false";
            time[i].disabled = "disabled";
        }
    }
});