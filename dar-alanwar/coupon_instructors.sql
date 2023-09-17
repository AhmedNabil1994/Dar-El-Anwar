create table coupon_instructors
(
    id         bigint unsigned auto_increment
        primary key,
    coupon_id  bigint unsigned null,
    user_id    bigint unsigned null,
    created_at timestamp       null,
    updated_at timestamp       null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

