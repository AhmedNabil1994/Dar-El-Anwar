create table attendances_leaves
(
    id          bigint unsigned auto_increment
        primary key,
    employee_id varchar(191) null,
    start_date  varchar(191) null,
    end_date    varchar(191) null,
    date        varchar(191) null,
    status      varchar(191) null,
    reason      varchar(191) null,
    created_at  timestamp    null,
    updated_at  timestamp    null
)
    collate = utf8mb4_unicode_ci;

