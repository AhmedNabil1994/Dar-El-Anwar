create table consultation_slots
(
    id              bigint unsigned auto_increment
        primary key,
    user_id         bigint unsigned not null,
    day             tinyint         not null comment '0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday',
    time            varchar(191)    not null,
    duration        varchar(191)    not null,
    hour_duration   varchar(191)    not null,
    minute_duration varchar(191)    not null,
    created_at      timestamp       null,
    updated_at      timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

