create table subjects
(
    id            int auto_increment
        primary key,
    name          varchar(255)                          null,
    department_id int                                   null,
    created_at    timestamp default current_timestamp() not null on update current_timestamp(),
    Updated_at    timestamp default current_timestamp() not null,
    instructor_id int                                   null
);

