$('#napoleon').click(function() {
    $('#napoleon').addClass('active-slide');
    $('#jeanneausecour, #degaule, #charlemagne').removeClass('active-slide');
});


$('#jeanneausecour').click(function() {
    $('#jeanneausecour').addClass('active-slide');
    $('#napoleon, #degaule, #charlemagne').removeClass('active-slide');
});


$('#degaule').click(function() {
    $('#degaule').addClass('active-slide');
    $('#napoleon, #charlemagne, #jeanneausecour').removeClass('active-slide');
});


$('#charlemagne').click(function() {
    $('#charlemagne').addClass('active-slide');
    $('#napoleon, #degaule, #jeanneausecour').removeClass('active-slide');
});