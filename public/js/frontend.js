$(function(){
    $('#edit').click(function(){
        var str = $('form li.param').text();
        var word = str.split(' ');
        console.log(word);
        for( var i = word.length-1; i--;){
            if ( word[i] === 'id' || word[i] === 'password' || word[i] === 'statut' || word[i] === 'avatar' || word[i] === 'score' || word[i] === 'mail' || word[i] === 'pseudo' || word[i] === 'telephone' || word[i] === ':' || word[i] === ''){
                word.splice(i, 1);
            }
        }
        console.log(word);
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
    $('a#displayPseudo').click(function () {
        $(this).toggle();
        $(this).next().find('#pseudoField').toggle();
    });
    $('#searchbar-icon').click(function(){
        $('#searchbar-input').animate({width: 'toggle'});
        $("#searchbar-icon").toggle();
        $("#searchbar-cross").toggle(500);
      });
      
      $('#searchbar-cross').click(function(){
        $('#searchbar-input').animate({width: 'toggle'});
        $("#searchbar-cross").toggle();
        $("#searchbar-icon").toggle(500);
      });

});