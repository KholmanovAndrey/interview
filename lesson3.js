// 1. Что выведет alert(typeof NaN); ?

// alert(typeof NaN); // number - потому что NaN относиться к числу

// 2. Что выведет alert(NaN === NaN); ?

// alert(NaN === NaN); // false, потому что NaN неравно NaN

// 3. 0.1 + 0.2 == 0.3 ?

// 0.1 + 0.2 == 0.3; // неравно, 0.30000000000000004

// 4. Какой тип будет иметь переменная a, если она создается при помощи следующего кода:

// var a = "a,b".split(','); // object, split - возвращает массив [a, b]

// 5. Сделать так, чтобы при нажатии на элемент <а> алертом выводилось «Hello world!».

document.querySelector('a').addEventListener('click', () => {
    alert('Hello world!');
});

// 6. Найти все элементы div с классом one, а также все элементы p с классом two.
// Затем добавить им всем класс three и визуально плавно спустить вниз.

$('div.one').add('p.two').addClass('three').slideDown('slow');

// 7. Выбрать видимый div с именем red, который содержит тег span.

$('div[name=red]:visible:has(span)');

// 8. Привести пример замыкания.

function createCounter() {
    var numberOfCalls = 0;
    return function() {
        return ++numberOfCalls;
    }
}
var fn = createCounter();
fn(); //1
fn(); //2
fn(); //3

// 9. Написать функцию, которая уменьшает или увеличивает указанное время на заданное количество минут, например:

function changeTime(time, interval){
    let [hour, minute] = time.split(':');
    let d = new Date(2000,1,1,+hour,+minute + interval);
    return ('0'+d.getHours()).slice(-2)+':' + ('0'+ d.getMinutes()).slice(-2);
}

changeTime('10:00', 1); //return '10:01'
changeTime('10:00', -1); //return '09:59'
changeTime('23:59', 1); //return '00:00'
changeTime('00:00', -1); //return '23:59'

// 10. Написать функцию, возвращающую градус, на который указывают часовая и минутная стрелки в зависимости от времени,
// например:

function clock_degree(time){
    let [ hour, minute ] = time.split(':'),
        degHour = hour < 13 ? +hour * 360 / 12 : (+hour - 12) * 360 / 12,
        degMinute = minute * 360 / 60,
        deg;

    if (degHour === 0) {
        degHour = 360;
    }
    if (degMinute === 0) {
        degMinute = 360;
    }

    if (hour > 23) {
        return 'Check your time !';
    }

    if (minute > 59) {
        return 'Check your time !'
    }

    return degHour + ':' + degMinute;
}

clock_degree("00:00"); //returns : "360:360"
clock_degree("01:01"); //returns : "30:6"
clock_degree("00:01"); //returns : "360:6"
clock_degree("01:00"); //returns : "30:360"
clock_degree("01:30"); //returns : "30:180"
clock_degree("24:00"); //returns : "Check your time !"
clock_degree("13:60"); //returns : "Check your time !"
clock_degree("20:34"); //returns : "240:204"

// 11. Написать простую игру «Угадай число». Программа загадывает случайное число от 0 до 100.
// Игрок должен вводить предположения и получать ответы «Больше», «Меньше» или «Число угадано».


