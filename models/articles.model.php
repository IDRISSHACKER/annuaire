<?php
$articlesTable = "CREATE TABLE IF NOT EXISTS articles(
        id  int auto_increment not null,
        titre varchar(255) not null,
        apercu varchar(255) not null,
        matricule TEXT not null,
        en_ligne boolean default false,
        publier_par integer,
        date_publication timestamp default current_timestamp,
        primary key(`id`)
    )
";
