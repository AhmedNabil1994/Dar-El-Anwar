create table zoom_settings
(
    id                bigint unsigned auto_increment
        primary key,
    user_id           bigint unsigned          not null,
    api_key           varchar(191)             not null,
    api_secret        varchar(191)             not null,
    timezone          varchar(191)             not null,
    host_video        varchar(191) default '0' not null comment 'true, false',
    participant_video varchar(191) default '0' not null comment 'true, false',
    waiting_room      varchar(191) default '0' not null comment 'true, false',
    status            tinyint      default 0   not null comment '0=disable, 1=active',
    created_at        timestamp                null,
    updated_at        timestamp                null
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

