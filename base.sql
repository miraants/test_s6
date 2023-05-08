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
    image text
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
        'Decouvrez les differents exemples d''intelligence artificielle faible qui sont utilises dans le monde de la technologie.',
        1,
        'L''intelligence artificielle faible est utilisee dans de nombreux domaines, tels que la reconnaissance vocale et la reconnaissance d''images. Les machines qui utilisent l''IA faible sont programmees pour effectuer des tâches specifiques et sont limitees dans leur capacite a raisonner et a prendre des decisions. Dans cet article, nous allons vous presenter les applications les plus courantes de l''intelligence artificielle faible.',
        'Ia-faible.jpg'
    ),
    (
        'Les dernieres avancees de l''intelligence artificielle forte',
        'Decouvrez les dernieres avancees dans le domaine de l''intelligence artificielle forte et comment elles peuvent etre utilisees pour resoudre des problemes complexes.',
        2,
        'L''intelligence artificielle forte est un domaine de l''informatique qui se concentre sur la creation de machines intelligentes qui peuvent raisonner et prendre des decisions comme les humains. Les dernieres avancees de l''IA forte ont des applications dans de nombreux domaines, tels que la medecine et la finance. Dans cet article, nous allons vous presenter les dernieres avancees de l''intelligence artificielle forte et discuter de leur potentiel pour resoudre des problemes complexes.',
        'IA-forte.jpg'
    ),
    (
        'Les fondements de l''intelligence artificielle symbolique',
        'Decouvrez les fondements de l''intelligence artificielle symbolique et comment elle est utilisee pour resoudre des problemes de logique.',
        3,
        'L''intelligence artificielle symbolique est un domaine de l''IA qui utilise des symboles pour representer des connaissances et des relations entre des concepts. Elle est utilisee pour resoudre des problemes de logique, tels que le raisonnement et la planification. Dans cet article, nous allons vous presenter les fondements de l''intelligence artificielle symbolique et comment elle est utilisee pour resoudre des problemes de logique.',
        'AI-symbolic.jpg'
    );
INSERT INTO article (titre, resume, idCategorie, contenu, image)
VALUES (
        'Les reseaux de neurones en IA connexionniste',
        'L''IA connexionniste utilise des reseaux de neurones pour resoudre des problemes',
        4,
        'Les reseaux de neurones artificiels sont des modeles de l''IA connexionniste utilises pour la reconnaissance de formes, la classification, la prediction, etc. Les reseaux de neurones sont composes de neurones artificiels relies par des synapses artificielles qui peuvent apprendre à partir de donnees. Ils ont ete largement utilises dans la reconnaissance de la parole, la reconnaissance d''images, la traduction de langues, etc',
        'connexionniste-delintelligence.png'
    ),
    (
        'Les algorithmes genetiques en IA evolutive',
        'L''IA evolutive utilise des algorithmes genetiques pour resoudre des problemes',
        5,
        'Les algorithmes genetiques sont des techniques de l''IA evolutive qui s''inspirent du processus d''evolution naturelle pour resoudre des problemes d''optimisation, de planification, de conception, etc. Ils fonctionnent en generant une population de solutions potentielles, puis en utilisant des operateurs genetiques tels que la mutation, la croisement et la selection pour produire de nouvelles solutions. Les algorithmes genetiques ont ete largement utilises dans l''optimisation de la production, la conception de circuits electroniques, la planification de la production, etc.',
        'RobotEvolution.jpg.'
    ),
    (
        'Les interfaces cerveau-machine en IA cognitive',
        'L''IA cognitive utilise des interfaces cerveau-machine pour interagir avec l''homme',
        6,
        'Les interfaces cerveau-machine sont des dispositifs qui permettent la communication entre le cerveau humain et les ordinateurs. Les interfaces cerveau-machine ont ete developpees dans le domaine de l''IA cognitive pour permettre une interaction plus naturelle entre les machines et les humains, en utilisant la pensee, l''emotion, la sensation, etc. Les interfaces cerveau-machine ont ete utilisees pour la commande de protheses, la communication avec des patients atteints de troubles moteurs, la surveillance de l''etat emotionnel, etc.',
        'Intelligence_artificielle-cognitive.jpg'
    );
create view v_nombre as
select c.nom,
    count(*) as nombre
from article a
    join categorie c on a.idCategorie = c.id
group by c.nom;
create view v_avgnb as
SELECT c.nom as categorie,
    AVG(
        LENGTH(a.contenu) - LENGTH(REPLACE(a.contenu, ' ', '')) + 1
    ) as nombre_mots_moyen
FROM categorie c
    INNER JOIN article a ON a.idCategorie = c.id
GROUP BY c.nom;
create view v_motcle as
SELECT mot,
    SUM(nb_occurrences) AS total_occurrences
FROM (
        SELECT LOWER(regexp_split_to_table(contenu, E'\\\\s+')) AS mot,
            COUNT(*) AS nb_occurrences
        FROM article
        GROUP BY contenu,
            mot
    ) AS mots_cles
WHERE LENGTH(mot) > 4
GROUP BY mot
ORDER BY total_occurrences DESC;