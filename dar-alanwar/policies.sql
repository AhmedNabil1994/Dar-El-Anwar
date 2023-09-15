create table policies
(
    id          bigint unsigned auto_increment
        primary key,
    type        tinyint   not null comment '1=privacy, 2=cookie, 3=terms & conditions',
    description longtext  not null,
    created_at  timestamp null,
    updated_at  timestamp null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

