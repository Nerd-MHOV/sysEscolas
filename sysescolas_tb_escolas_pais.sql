create table `tb_escolas.pais`
(
    id        int auto_increment
        primary key,
    id_escola int          not null,
    nome_pai  varchar(255) not null,
    user      varchar(255) not null,
    password  varchar(255) not null
);

INSERT INTO sysescolas.`tb_escolas.pais` (id, id_escola, nome_pai, user, password) VALUES (1, 1, 'Pai 01', 'pai1', 'pai1');
INSERT INTO sysescolas.`tb_escolas.pais` (id, id_escola, nome_pai, user, password) VALUES (2, 1, 'Pai 02', 'pai2', 'pai2');
INSERT INTO sysescolas.`tb_escolas.pais` (id, id_escola, nome_pai, user, password) VALUES (3, 1, 'Pai 03', 'pai3', 'pai3');
