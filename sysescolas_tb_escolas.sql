create table tb_escolas
(
    id     int auto_increment
        primary key,
    escola varchar(255) not null,
    serie  int          null
);

INSERT INTO sysescolas.tb_escolas (id, escola, serie) VALUES (1, 'Stance Dual School', 9);
INSERT INTO sysescolas.tb_escolas (id, escola, serie) VALUES (2, 'Prime Gardem', 9);
INSERT INTO sysescolas.tb_escolas (id, escola, serie) VALUES (3, 'PlayPen', 3);
INSERT INTO sysescolas.tb_escolas (id, escola, serie) VALUES (4, 'St.Francis', 2);
INSERT INTO sysescolas.tb_escolas (id, escola, serie) VALUES (5, 'Francisca', 9);
