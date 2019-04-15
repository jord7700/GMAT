var generator = null;

function clear() {
    $('#output').empty();
    //console.log("clear");
}

function fill() {
    var $output = $('#output'),
        $w = $(window),
        $b = $('body');
    while (generator && $w.scrollTop() + $w.height() > $b.height()) {
        $output.append($('<li>' + generator + '</li>'));
    }
    //console.log("fill");
}

function group(n) {
    var string = n.toString();
    if (/^\d+$/.test(string)) {
        return string.split('').reverse().join('')
            .split(/(\d\d\d)/).filter(function(s) {
                return s !== '';
            }).map(function(s) {
                return s.split('').reverse().join('');
            }).reverse().join(',');
    } else {
        //console.log("group else");
        return string;
    }
    //console.log("group");
}

function update(event) {
    //console.log("update");
    if (event) event.preventDefault();
    clear();
    //generator = NameGen.compile("this input");
    try {
        generator = NameGen.compile($('#spec').val());
        //console.log("post compile");
        $('#spec').removeClass('invalid');
        //console.log("before if");
        if (generator.max() === 0) {
            generator = null;
            $('#count').text('');
            //console.log("update if");
        } else {
            //console.log("update if");
            var count = group(generator.combinations());
            if (count === 1) {
                $('#count').text(count + ' possibility');
            } else {
                //console.log("update else");
                $('#count').text(count + ' possibilities');
            }
        }
        fill();
    } catch (e) {
        //console.log("catch");
        $('#spec').addClass('invalid');
        //console.log($('#spec'));
        $('#count').text('invalid');
        //console.log($('#count'));
    }
}

$(document).ready(function() {
    $('#input').on('submit input change', update);
    $(window).on('scroll', fill);
    $('#help').on('click', function(event) {
        event.preventDefault();
        $('#reference').slideToggle();
    });
    //console.log("ready");
});
