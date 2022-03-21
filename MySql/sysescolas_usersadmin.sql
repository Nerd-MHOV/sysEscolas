create table usersadmin
(
    id         int auto_increment
        primary key,
    first_name varchar(255) not null,
    last_name  varchar(255) not null,
    email      varchar(255) not null,
    passwd     varchar(255) not null,
    photo      varchar(255) null,
    forget     varchar(255) null,
    created_at timestamp    null,
    updated_at timestamp    null
);

INSERT INTO sysescolas.usersadmin (first_name, last_name, email, passwd, photo, forget, created_at, updated_at) VALUES ('Matheus', 'Henrique', 'matheus.henrique4245@gmail.com', '$2y$10$as0mPFrY80gRvKiTJ.jXBu0T6a.CfqfIhyvI1WOjpZhkqhjjdAcbC', null, null, '2022-03-20 05:21:22', '2022-03-20 18:26:58');
INSERT INTO sysescolas.usersadmin (first_name, last_name, email, passwd, photo, forget, created_at, updated_at) VALUES ('asdasd', 'asdas', 'asdas@gmail.com', '$2y$10$OxKPHBS9QZQXdZCHBEqUnuuIsLzzBdRHoOmdjKbSJe8qeld9py82W', null, null, '2022-03-20 05:35:59', '2022-03-20 05:35:59');
