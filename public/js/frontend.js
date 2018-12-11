$(function(){
    $('#edit').click(function(){
        var str = $('form li.param').text();
        var word = str.split(' ');
        for( var i = word.length-1; i--;){
            if ( word[i] === 'mail' || word[i] === 'pseudo' || word[i] === 'telephone' || word[i] === ':' || word[i] === '') word.splice(i, 1);
        }
        var i = 0;
        $('.champP').each(function(){
            $(this).val(word[i]);
            i++;
        });
        $('.champP').toggle();
        $('.btn.save').toggle();
        $('.texte').toggle();
        $('a.delete').toggle();

    });

});