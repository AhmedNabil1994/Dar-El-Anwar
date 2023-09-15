create table financial_accounts
(
    id               bigint unsigned auto_increment
        primary key,
    date             date                       not null,
    trans_no         date                       not null,
    student_id       date                       not null,
    branch_id        date                       not null,
    name             date                       not null,
    description      varchar(191)               not null,
    amount           decimal(10, 2)             not null,
    transaction_type enum ('income', 'expense') not null,
    created_at       timestamp                  null,
    updated_at       timestamp                  null
)
    collate = utf8mb4_unicode_ci;

