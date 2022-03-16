create table `tb_escolas.eventos`
(
    id          int auto_increment
        primary key,
    nome_evento varchar(255) not null,
    id_escola   int          not null,
    data_inicio date         not null,
    data_final  date         not null
);

