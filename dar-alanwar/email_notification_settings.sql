create table email_notification_settings
(
    id                                  bigint unsigned auto_increment
        primary key,
    uuid                                char(36)                 not null,
    user_id                             bigint                   not null,
    updates_from_classes                varchar(10) default 'no' not null comment 'yes, no',
    updates_from_teacher_discussion     varchar(10) default 'no' not null comment 'yes, no',
    activity_on_your_project            varchar(10) default 'no' not null comment 'yes, no',
    activity_on_your_discussion_comment varchar(10) default 'no' not null comment 'yes, no',
    reply_comment                       varchar(10) default 'no' not null comment 'yes, no',
    new_follower                        varchar(10) default 'no' not null comment 'yes, no',
    new_class_by_someone_you_follow     varchar(10) default 'no' not null comment 'yes, no',
    new_live_session                    varchar(10) default 'no' not null comment 'yes, no',
    created_at                          timestamp                null,
    updated_at                          timestamp                null,
    constraint email_notification_settings_uuid_unique
        unique (uuid)
)
    engine = MyISAM
    collate = utf8mb4_unicode_ci;

