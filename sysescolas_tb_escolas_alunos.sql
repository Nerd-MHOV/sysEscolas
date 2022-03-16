create table `tb_escolas.alunos`
(
    id             int auto_increment
        primary key,
    id_escola      int          not null,
    id_responsavel int          null,
    nome_aluno     varchar(255) not null
);

INSERT INTO sysescolas.`tb_escolas.alunos` (id, id_escola, id_responsavel, nome_aluno) VALUES (1, 1, 1, 'aluno1');
INSERT INTO sysescolas.`tb_escolas.alunos` (id, id_escola, id_responsavel, nome_aluno) VALUES (2, 1, 2, 'aluno2');
INSERT INTO sysescolas.`tb_escolas.alunos` (id, id_escola, id_responsavel, nome_aluno) VALUES (3, 1, 3, 'aluno3');
INSERT INTO sysescolas.`tb_escolas.alunos` (id, id_escola, id_responsavel, nome_aluno) VALUES (4, 1, 3, 'aluno4');
