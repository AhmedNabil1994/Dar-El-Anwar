create table instructor_consultation_day_statuses
(
    id         bigint unsigned auto_increment
        primary key,
    user_id    bigint unsigned not null,
    day        tinyint         not null comment '0=sunday,1=monday,2=tuesday,3=wednesday,4=thursday,5=friday,6=saturday',
    created_at timestamp       null,
    updated_at timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

