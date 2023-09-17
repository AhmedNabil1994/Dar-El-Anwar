create table orders
(
    id                                 bigint unsigned auto_increment
        primary key,
    uuid                               char(36)                          not null,
    user_id                            bigint                            not null,
    order_number                       varchar(50)                       not null,
    sub_total                          decimal(8, 2)  default 0.00       not null,
    discount                           decimal(8, 2)  default 0.00       not null,
    shipping_cost                      decimal(8, 2)  default 0.00       not null,
    tax                                decimal(8, 2)  default 0.00       not null,
    platform_charge                    decimal(8, 2)  default 0.00       not null,
    current_currency                   varchar(191)                      null,
    grand_total                        decimal(8, 2)  default 0.00       not null,
    payment_currency                   varchar(191)                      null,
    conversion_rate                    decimal(28, 8) default 0.00000000 null,
    grand_total_with_conversation_rate decimal(28, 8) default 0.00000000 null,
    payment_method                     varchar(100)                      null,
    paystack_reference_number          varchar(191)                      null,
    deposit_by                         varchar(191)                      null,
    deposit_slip                       varchar(191)                      null,
    bank_id                            bigint unsigned                   null,
    customer_comment                   mediumtext                        null,
    payment_status                     varchar(15)    default 'due'      not null comment 'paid, due, free, pending, cancelled',
    delivery_status                    tinyint        default 0          not null comment '0=pending, 1=complete',
    created_by_type                    tinyint        default 1          null comment '1=student, 2=admin',
    created_by                         bigint unsigned                   null,
    created_at                         timestamp                         null,
    updated_at                         timestamp                         null,
    error_msg                          varchar(191)                      null,
    payment_id                         varchar(191)                      null,
    constraint orders_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

