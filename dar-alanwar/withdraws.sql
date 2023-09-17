create table withdraws
(
    id             bigint unsigned auto_increment
        primary key,
    uuid           char(36)                   not null,
    user_id        bigint                     not null,
    transection_id varchar(80)                not null,
    amount         decimal(8, 2) default 0.00 not null,
    payment_method varchar(100)               null,
    note           mediumtext                 null,
    status         tinyint       default 0    not null comment '0=pending, 1=complete, 2=rejected',
    created_at     timestamp                  null,
    updated_at     timestamp                  null,
    constraint withdraws_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

