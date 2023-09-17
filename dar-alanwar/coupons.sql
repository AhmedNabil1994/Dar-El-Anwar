create table coupons
(
    id                bigint unsigned auto_increment
        primary key,
    uuid              char(36)                   not null,
    coupon_code_name  varchar(191)               not null,
    coupon_type       tinyint                    not null comment '1=Global,2=Instructor, 3=Course',
    status            tinyint       default 1    not null comment '1=activate, 0=deactivated',
    creator_id        bigint unsigned            null comment 'creator_id=user_id',
    percentage        decimal(8, 2) default 0.00 null,
    minimum_amount    int                        null,
    maximum_use_limit int                        null,
    start_date        date                       null,
    end_date          date                       null,
    created_at        timestamp                  null,
    updated_at        timestamp                  null,
    constraint coupons_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

