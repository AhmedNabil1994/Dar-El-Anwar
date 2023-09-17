create table uploads
(
    id                 int auto_increment
        primary key,
    file_original_name varchar(255)                          null,
    file_name          varchar(255)                          null,
    user_id            int                                   null,
    file_size          int                                   null,
    extension          varchar(10)                           null,
    type               varchar(15)                           null,
    created_at         timestamp default current_timestamp() not null,
    updated_at         timestamp default current_timestamp() not null on update current_timestamp(),
    deleted_at         timestamp                             null
)
    collate = utf8mb4_unicode_ci;

