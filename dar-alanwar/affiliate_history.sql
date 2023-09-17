create table affiliate_history
(
    id                    bigint unsigned auto_increment
        primary key,
    hash                  varchar(191)               not null,
    user_id               bigint                     not null,
    buyer_id              bigint                     not null,
    order_id              bigint                     not null,
    order_item_id         bigint                     not null,
    course_id             bigint                     null,
    bundle_id             bigint                     null,
    consultation_slot_id  bigint                     null,
    actual_price          decimal(8, 2) default 0.00 not null,
    discount              decimal(8, 2) default 0.00 not null,
    commission            decimal(8, 2) default 0.00 not null,
    commission_percentage decimal(8, 2) default 0.00 not null,
    status                tinyint       default 0    not null comment '0=due,1=paid',
    created_at            timestamp                  null,
    updated_at            timestamp                  null,
    constraint affiliate_history_hash_unique
        unique (hash)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

