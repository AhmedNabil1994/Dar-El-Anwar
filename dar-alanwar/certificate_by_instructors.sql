create table certificate_by_instructors
(
    id                bigint unsigned auto_increment
        primary key,
    uuid              char(36)       not null,
    course_id         bigint         null,
    certificate_id    bigint         null,
    title             varchar(191)   null,
    title_x_position  int default 0  not null,
    title_y_position  int default 0  not null,
    title_font_size   int default 20 not null,
    title_font_color  varchar(25)    null,
    body              mediumtext     null,
    body_max_length   int default 80 not null,
    body_x_position   int default 0  not null,
    body_y_position   int default 16 not null,
    body_font_size    int default 20 not null,
    body_font_color   varchar(25)    null,
    signature         varchar(191)   null,
    role_2_y_position int default 10 not null,
    path              varchar(191)   null,
    created_at        timestamp      null,
    updated_at        timestamp      null,
    constraint certificate_by_instructors_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

