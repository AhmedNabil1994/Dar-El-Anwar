create table notifications
(
    id         bigint unsigned auto_increment
        primary key,
    uuid       char(36)                  not null,
    sender_id  bigint                    null,
    user_id    bigint                    null,
    text       varchar(191)              not null,
    target_url varchar(191)              null,
    is_seen    varchar(191) default 'no' not null comment 'yes, no',
    user_type  tinyint      default 2    not null comment '1=admin, 2=instructor, 3=student',
    created_at timestamp                 null,
    updated_at timestamp                 null,
    constraint notifications_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

