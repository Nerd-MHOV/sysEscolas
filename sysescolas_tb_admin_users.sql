create table `tb_admin.users`
(
    id    int auto_increment
        primary key,
    nome  varchar(255) not null,
    login varchar(255) not null,
    senha varchar(255) not null,
    nivel int          not null,
    img   varchar(255) null
);

INSERT INTO sysescolas.`tb_admin.users` (id, nome, login, senha, nivel, img) VALUES (1, 'Matheus', 'admin', 'admin', 2, null);
