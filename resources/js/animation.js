document.getElementById('triggerAnimation').addEventListener('click', function () {

    const snowflakes = document.querySelectorAll('.snowflake');

    snowflakes.forEach(snowflake => {
        snowflake.innerHTML = '';
        snowflake.style.width = '50px';
        snowflake.style.height = '50px';
        snowflake.style.backgroundImage = 'url(/images/chipeur.png)';
        snowflake.style.backgroundSize = 'contain';
        snowflake.style.backgroundRepeat = 'no-repeat';
    });
});