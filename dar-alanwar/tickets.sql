create table tickets
(
    id                 bigint unsigned auto_increment
        primary key,
    uuid               char(36)          not null,
    ticket_number      varchar(191)      not null,
    name               varchar(191)      not null,
    email              varchar(191)      not null,
    subject            varchar(191)      not null,
    status             tinyint default 1 null comment '1=Open, 2=Closed',
    user_id            bigint unsigned   not null,
    department_id      bigint unsigned   null,
    related_service_id bigint unsigned   null,
    priority_id        bigint unsigned   null,
    created_at         timestamp         null,
    updated_at         timestamp         null,
    constraint tickets_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

