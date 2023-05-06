DROP DATABASE s6;
CREATE DATABASE s6;
CREATE USER s6 PASSWORD 's6';
ALTER DATABASE s6 OWNER TO s6;
\ c s6 s6;
s6 CREATE TABLE Admin(
    id SERIAL not null primary key,
    email VARCHAR(150) not null,
    mdp VARCHAR(150) not null
);
insert into Admin(email, mdp)
values('admin1', md5('mdp1'));
create table categorie(
    id serial primary key not null,
    nom varchar(250) not null,
    description varchar not null
);
insert into categorie
values (
        default,
        'Intelligence artificielle faible',
        'Concue pour effectuer une tache specifique, telle que la reconnaissance vocale, la reconnaissance d''image ou la traduction automatique'
    ),
    (
        default,
        'Intelligence artificielle forte',
        'Capable d''effectuer n''importe quelle tache intellectuelle qu''un etre humain peut accomplir. Elle est encore en developpement et est consideree comme une forme d''IA hypothetique.'
    ),
    (
        default,
        'Intelligence artificielle symbolique',
        'Utilise des representations symboliques pour representer des connaissances et des regles afin de raisonner sur les informations'
    ),
    (
        default,
        'Intelligence artificielle connexionniste',
        'Utilise des reseaux de neurones artificiels pour simuler le fonctionnement du cerveau humain.'
    ),
    (
        default,
        'Intelligence artificielle evolutive',
        'Utilise des algorithmes genetiques pour evoluer et ameliorer les modeles de l''IA'
    ),
    (
        default,
        'Intelligence artificielle cognitive',
        'Inspiree par la comprehension de la cognition humaine et cherche a simuler la facon dont les humains pensent, apprennent et resolvent les problemes'
    );
create table article(
    id serial primary key not null,
    titre VARCHAR not null,
    resume varchar not null,
    idCategorie int not null,
    contenu varchar not null,
    image varchar(255)
);
alter table article
add foreign key (idCategorie) references categorie(id);
create or replace view v_article as
select a.*,
    c.nom
from article a
    join categorie c on a.idCategorie = c.id;
INSERT INTO article (titre, resume, idCategorie, contenu, image)
VALUES (
        'Les applications de l ''intelligence artificielle faible',
        'Découvrez les differents exemples d''intelligence artificielle faible qui sont utilises dans le monde de la technologie.',
        1,
        'L''intelligence artificielle faible est utilisee dans de nombreux domaines, tels que la reconnaissance vocale et la reconnaissance d''images. Les machines qui utilisent l''IA faible sont programmees pour effectuer des tâches spécifiques et sont limitees dans leur capacite a raisonner et a prendre des decisions. Dans cet article, nous allons vous presenter les applications les plus courantes de l''intelligence artificielle faible.',
        'ia-faible.jpg'
    ),
    (
        'Les dernieres avancees de l''intelligence artificielle forte',
        'Découvrez les dernieres avancees dans le domaine de l''intelligence artificielle forte et comment elles peuvent etre utilisees pour résoudre des problemes complexes.',
        2,
        'L''intelligence artificielle forte est un domaine de l''informatique qui se concentre sur la creation de machines intelligentes qui peuvent raisonner et prendre des decisions comme les humains. Les dernieres avancees de l''IA forte ont des applications dans de nombreux domaines, tels que la medecine et la finance. Dans cet article, nous allons vous presenter les dernieres avancees de l''intelligence artificielle forte et discuter de leur potentiel pour resoudre des problemes complexes.',
        'ia-forte.jpg'
    ),
    (
        'Les fondements de l''intelligence artificielle symbolique',
        'Découvrez les fondements de l''intelligence artificielle symbolique et comment elle est utilisee pour resoudre des problemes de logique.',
        3,
        'L''intelligence artificielle symbolique est un domaine de l''IA qui utilise des symboles pour representer des connaissances et des relations entre des concepts. Elle est utilisee pour resoudre des problemes de logique, tels que le raisonnement et la planification. Dans cet article, nous allons vous presenter les fondements de l''intelligence artificielle symbolique et comment elle est utilisee pour resoudre des problemes de logique.',
        'ia-symbolique.jpg'
    );