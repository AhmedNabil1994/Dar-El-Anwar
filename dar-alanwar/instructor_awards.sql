create table instructor_awards
(
    id            bigint unsigned auto_increment
        primary key,
    uuid          char(36)     not null,
    instructor_id bigint       not null,
    name          varchar(191) not null,
    winning_year  varchar(50)  not null,
    created_at    timestamp    null,
    updated_at    timestamp    null,
    constraint instructor_awards_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

