<!----- Stockage des catégories dans un tableau d'objets, chaque objet est défini par un titre, une description ainsi qu'une image d'illustration  --->

<?php
    // $categories= [
    //     'Deck-building',
    //     'Metroidvania',
    //     'Plate-forme',
    //     'Beat them all',
    //     'Aventure',
    //     'Infiltration',
    //     'Rogue-like',
    //     'Simulation',
    //     'Tactical',
    //     'Immersive sim',
    //     'FPS',
    //     'RPG',
    //     'Party game',
    //     'Survival/horror',
    //     'Versus fighting',
    //     'Sport',
    //     'Walking simulator',
    // ];

    $categories= [
        (object)['title' => 'Deck-building','desc' => '1','img' => 'metroidDread.jpg'], 
        (object)['title' => 'Metroidvania','desc' => '2','img' => 'metroidDread.jpg '],
        (object)['title' => 'Plate-forme','desc' => '3','img' => 'metroidDread.jpg '], 
        (object)['title' => 'Beat them all','desc' => '4','img' => ' metroidDread.jpg'], 
        (object)['title' => 'Aventure','desc' => '5','img' => ' metroidDread.jpg'],
        (object)['title' => 'Infiltration','desc' => '7','img' => 'metroidDread.jpg '],
        (object)['title' => 'Rogue-like','desc' => '8','img' => ' metroidDread.jpg'],
        (object)['title' => 'Simulation','desc' => ' 9','img' => ' metroidDread.jpg'],
        (object)['title' => 'Tactical','desc' => ' 10','img' => ' metroidDread.jpg'],
        (object)['title' => 'Immersive sim','desc' => ' 11','img' => ' metroidDread.jpg'],
        (object)['title' => 'FPS','desc' => ' 12','img' => ' metroidDread.jpg'],
        (object)['title' => 'RPG','desc' => ' 13','img' => ' metroidDread.jpg'],
        (object)['title' => 'Party game','desc' => ' 14','img' => ' metroidDread.jpg'],
        (object)['title' => 'Versus fighting','desc' => ' 15','img' => ' metroidDread.jpg'],
        (object)['title' => 'Sport','desc' => ' 16','img' => ' metroidDread.jpg'],
        (object)['title' => 'Walking simulator','17' => ' jMerise','img' => 'metroidDread.jpg '],
        (object)['title' => 'Survival-horror','18' => ' jMerise','img' => 'metroidDread.jpg '],
        
    ];

    $articles= [
        (object)['title' => 'Zelda','desc' => '1','img' => 'metroidDread.jpg', 'year' => '2017'], 
        (object)['title' => 'DK','desc' => '2','img' => 'metroidDread.jpg', 'year' => '2017 '],
        (object)['title' => 'Mario','desc' => '3','img' => 'metroidDread.jpg', 'year' => '2017 '], 
        (object)['title' => 'God of War','desc' => '4','img' => ' metroidDread.jpg', 'year' => '2017'], 
        (object)['title' => 'Resident Evil','desc' => '5','img' => ' metroidDread.jpg', 'year' => '2017'],
    ];